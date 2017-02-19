<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 01/08/2016
 * Time: 10:27 PM
 */
// DB - simple database wrapper
// The idea behind this database wrapper is to have a simple to use database wrapper that includes some useful
// commands to do some every day tasks.
//

class DB {
    // options
    public $enableMoreSearch = true; // disable this if any of your field names end with
    // _like, _before, _less_than, _after or _greater_than as this may cause problems
    // enables __call()s like find_by_name_like('dom') to match Dom, dom or DOM

    // variables
    public $c = null;
    public $db = null;
    public $table = null;
    public $id = 'id';

    private $engine = "mysql";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $q = "";
    // private $db = "test";
    private $fields = array();

    // __construct
    // sets up the connection to the mysql server and selects the database
    public function __construct($a = null) {
        if (is_array($a)) {
            $this->host = (isset($a['host'])) ? $a['host'] : $this->host;
            $this->user = (isset($a['user'])) ? $a['user'] : $this->host;
            $this->pass = (isset($a['pass']) && is_string($a['pass'])) ? $a['pass'] : $this->pass;
            $this->database = (isset($a['database'])) ? $a['database'] : $this->database;
            $this->table = (isset($a['table'])) ? $a['table'] : $this->table;

        } elseif (is_string($a)) {
            if (preg_match("/^(mysql):\/\/([^:]+):(.*)@([a-z0-9\-\.]+):?(\d+)?\/([a-z0-9_\-]+)(\/([a-z0-9_\-]+))?\/?$/i", $a, $m)) {
                $this->engine = $m[1];
                $this->host   = $m[4];
                $this->user   = $m[2];
                $this->pass   = $m[3];
                $this->db     = $m[6];
                $this->table  = isset($m[8]) ? $m[8] : null;

            } else {
                throw new Exception("DB Error! (Invalid connection details)");
            }
        }

        if (!is_resource($this->c)) {
            if ($this->c = $this->_connect()) {
                if ($this->_select_db()) {
                    return $this->c;

                } else {
                    throw new Exception("DB Error! (Could not select database)");
                }

            } else {
                throw new Exception("DB Error! (Cound not connect to server)");
            }
        }
    }

    // __destruct
    // closes the connection
    public function __destruct() {
        return @$this->_close();
        // the @ is used because PHP shares mysql connections and if more than one
        // 'DB' instance is finished with at the same time, the second, third, etc
        // will produce errors, as the connection is already closed, the @ hides
        // any errors
    }

    // __call
    // magic method to map unbound functions
    //   used for db->find_all_by_username("dom") etc
    public function __call($f, $a) {
        if (preg_match("/^find_(all_by|by)_([_a-zA-Z]\w*)$/", $f, $m)) {
            if ($m[1] == "by") {
                $array = false;

            } elseif ($m[1] == "all_by") {
                $array = true;
            }

            if (isset($a[1]) && is_array($a[1]) && isset($a[1]['table'])) {
                $t = $a[1]['table'];
            } else {
                $t = null;
            }

            $fields = explode("_or_", $m[2]);

            if (count($fields) == 1) {
                $fields = explode("_and_", $m[2]);
                $mode = "AND";
            } else {
                $mode = "OR";
            }

            $find = array();

            if (count($fields) == count($a[0]) || (!is_array($a[0]) && count($fields) == 1)) {
                foreach ($fields as $i => $key) {
                    if (is_array($a[0])) {
                        $value = $a[0][$i];

                    } else {
                        $value = $a[0];
                    }

                    if ($this->enableMoreSearch) {
                        if (substr(strtolower($key), -5) == '_like') {
                            $key = substr($key, 0, -5);
                            $find[$key] = array('mode' => 'LIKE', 'value' => $value);
                        } elseif (substr(strtolower($key), -13) == '_greater_than') {
                            $key = substr($key, 0, -13);
                            $find[$key] = array('mode' => '>', 'value' => $value);
                        } elseif (substr(strtolower($key), -6) == '_after') {
                            $key = substr($key, 0, -6);
                            $find[$key] = array('mode' => '>', 'value' => $value);
                        } elseif (substr(strtolower($key), -10) == '_less_than') {
                            $key = substr($key, 0, -10);
                            $find[$key] = array('mode' => '<', 'value' => $value);
                        } elseif (substr(strtolower($key), -7) == '_before') {
                            $key = substr($key, 0, -7);
                            $find[$key] = array('mode' => '<', 'value' => $value);
                        } else {
                            $find[$key] = $value;
                        }
                    } else {
                        $find[$key] = $value;
                    }
                }
            } elseif (count($a) == count($fields)) {
                foreach ($fields as $i => $key) {
                    $value = $a[$i];
                    if ($this->enableMoreSearch) {
                        if (substr(strtolower($key), -5) == '_like') {
                            $key = substr($key, 0, -5);
                            $find[$key] = array('mode' => 'LIKE', 'value' => $value);
                        } elseif (substr(strtolower($key), -13) == '_greater_than') {
                            $key = substr($key, 0, -13);
                            $find[$key] = array('mode' => '>', 'value' => $value);
                        } elseif (substr(strtolower($key), -6) == '_after') {
                            $key = substr($key, 0, -6);
                            $find[$key] = array('mode' => '>', 'value' => $value);
                        } elseif (substr(strtolower($key), -10) == '_less_than') {
                            $key = substr($key, 0, -10);
                            $find[$key] = array('mode' => '<', 'value' => $value);
                        } elseif (substr(strtolower($key), -7) == '_before') {
                            $key = substr($key, 0, -7);
                            $find[$key] = array('mode' => '<', 'value' => $value);
                        } else {
                            $find[$key] = $value;
                        }
                    } else {
                        $find[$key] = $value;
                    }
                }
            } else {
                throw new Exception('Number of fields and parameters don\'t match');
            }

            return $this->find($find, array('table' => $t, 'mode' => $mode, 'array' => $array));

        } elseif (preg_match("/^find_or_(initialize|create)_by_([_a-zA-Z]\w*)$/", $f, $m)) {

            $fields = explode("_and_", $m[2]);

            $find = array();

            if (count($fields) > 1 && is_array($a[0]) && count($fields) == count($a[0])) {
                foreach ($fields as $i => $key) {
                    $value = $a[0][$i];
                    $find[$key] = $value;
                }

            } else {
                $find[$m[2]] = $a[0];
            }

            $check = $this->find($find, array('mode' => 'AND'));

            if (!empty($check)) {
                return $check;

            } else {
                if ($m[1] == "create") {
                    $this->create($find);

                    return $this->find($this->lastId());

                } elseif ($m[1] == "initialize") {
                    $row = $this->_new();

                    foreach ($find as $key => $value) {
                        $row->$key = $value;
                    }

                    return $row;
                }
            }
        }

        return false;
    }

    // _connect
    // simple function, maybe enable use of other database engines?
    private function _connect() {
        if ($this->engine == 'mysql') {
            return mysql_connect($this->host, $this->user, $this->pass);
        }
    }

    // _query
    // pretty simple again
    private function _query($q) {
        $this->q = $q;  // store the last query
        if ($this->engine == 'mysql') {
            return mysql_query($q, $this->c);
        }
    }

    // _num_rows
    // pretty simple again
    private function _num_rows($r) {
        if ($this->engine == 'mysql') {
            return mysql_num_rows($r);
        }
    }

    // _select_db
    // pretty simple again
    private function _select_db() {
        if ($this->engine == 'mysql') {
            return mysql_select_db($this->db, $this->c);
        }
    }

    // _close
    // pretty simple again
    private function _close() {
        if ($this->engine == 'mysql') {
            return mysql_close($this->c);
        }
    }

    // _close
    // pretty simple again
    private function _auto_increment_id() {
        if ($this->engine == 'mysql') {
            return mysql_insert_id($this->c);
        }
    }

    // _get
    // accepts a query string, or mysql resource and returns either and array
    // or an array of arrays depending on how many rows there are or if the
    // $array variable is true
    // private function _get($q, $array = false) {
    private function _get($q, $options = array()) {
        if (is_string($q)) {
            $q = $this->_query($q);
        }

        if (!is_resource($q)) {
            return false;
        }

        $r = $this->_num_rows($q);

        $options['array'] = !empty($options['array']) ? $options['array'] : false;
        $options['raw'] = isset($options['raw']) ? $options['raw'] : false;

        if ($r) {
            // if we have a result...
            if ($r === 1 && !$options['array']) {
                // if there is only 1 row and array is not forced
                if ($this->engine == 'mysql') {
                    // if we're using mysql...
                    if ($options['raw']) {
                        // if $options row == true, return the raw array, not a DB record object
                        return mysql_fetch_assoc($q);

                    } else {
                        return new DB_record($this, mysql_fetch_assoc($q));
                    }
                }
            } else {
                // $options array == true or we have more than one row
                $a = array();

                if ($this->engine == 'mysql') {
                    // if we're using mysql
                    while (($row = mysql_fetch_assoc($q)) != false) {
                        // create a $row variable with the contetnts of the row
                        if ($options['raw']) {
                            $a[] = $row;

                        } else {
                            $a[] = new DB_record($this, $row);
                        }
                    }
                }

                return $a;
            }

        } else {
            return false;
        }
    }

    public function query($q) {
        return $this->_query($q);
    }

    // find
    // builds a query to pass to get based on the variables passed
    // if $id is null it will use the current data->id, if $id is an array it
    // will match based on the array settings (correctly matching nulls), or
    // $id can just be a specified id
    // to match all users with a name like bob you could do:
    //   db->find(array('name' => array('mode' => 'LIKE', 'value' => '%bob%')), array('table' => 'users'));
    // to retrieve all rows from the current table you could do:
    //   db->find();
    // to retrieve a specific id you could do:
    //   db->find(123)
    public function find($id = null, $options = array()) {
        if (empty($options['table'])) {
            if (!empty($this->table)) {
                $options['table'] = $this->table;

            } else {
                return false;
            }
        }

        if ($id === null) {
            $options['array'] = isset($options['array']) ? $options['array'] : true;  // default behaviour to return an array

            $q = "SELECT * FROM `{$options['table']}`";

            if (!empty($options['order']) && is_array($options['order'])) {
                $q .= ' ORDER BY ';
                $order = array();

                foreach ($options['order'] as $field => $direction) {
                    $direction = strtoupper($direction);

                    if ($direction !== 'ASC' && $direction !== 'DESC') {
                        if ($field === 'RAND()') {
                            $order[] = 'RAND()';

                        } else {
                            $order[] .= "`{$field}`";
                        }

                    } else {
                        $order[] .= "`{$field}` {$direction}";
                    }
                }
                $q .= implode(", ", $order);

            } elseif (!empty($options['order']) && is_string($options['order'])) {
                $q .= " ORDER BY {$options['order']}";
            }

            if (empty($options['offset']) && !empty($options['limit'])) {
                $q .= " LIMIT {$options['limit']}";

            } elseif (!empty($options['offset']) && !empty($options['limit'])) {
                $q .= " LIMIT {$options['offset']},{$options['limit']}";
            }

            $q .= ";";
            return $this->_get($q, $options);

        } else {
            $options['array'] = isset($options['array']) ? $options['array'] : null;

            $where = array();

            if (is_array($id)) {
                foreach ($id as $k => $v) {
                    if (is_array($v)) {
                        $where[] = "`{$k}` {$v['mode']} '{$v['value']}'";

                    } elseif ($v === null) {
                        $where[] = "ISNULL(`{$k}`)";

                    } else {
                        $where[] = "`{$k}` = '{$v}'";
                    }
                }
            } else {
                $where[] = "`{$this->id}` = '{$id}'";
            }

            if (isset($options['mode']) || ($options['mode'] != "OR" && $options['mode'] != "AND")) {
                $options['mode'] = 'OR';
            }

            $q = "SELECT * FROM `{$options['table']}` WHERE ".implode(" {$options['mode']} ", $where);

            /** @var TYPE_NAME $optinos */
            if (isset($options['order']) && !empty($options['order']) && is_array($optinos['order'])) {
                $q .= ' ORDER BY ';
                $order = array();

                foreach ($options['order'] as $field => $direction) {
                    $direction = strtoupper($direction);

                    if ($direction !== 'ASC' || $direction !== 'DESC') {
                        if ($field === 'RAND()') {
                            $order[] = 'RAND()';

                        } else {
                            $order[] .= "`{$field}`";
                        }

                    } else {
                        $order[] .= "`{$field}` {$direction}";
                    }
                }
                $q .= implode(", ", $order);
            } elseif (isset($options['order']) && !empty($options['order']) && is_string($options['order'])) {
                $q .= " ORDER BY {$options['order']}";
            }

            if (empty($options['offset']) && !empty($options['limit'])) {
                $q .= " LIMIT {$options['limit']}";

            } elseif (!empty($options['offset']) && !empty($options['limit'])) {
                $q .= " LIMIT {$options['offset']},{$options['limit']}";
            }

            $q .= ';';

            return $this->_get($q, $options);
        }
    }

    // create
    // builds an INSERT query based on the variables passed
    // $data must be an associative array with indexes matching the field names
    // $table can be omitted and the current table will be used
    // to insert a new row to the current table you could do:
    //   db->create(array("name" => "bob", "password" => md5(md5("mytest")), "email" => "bob@email.com"));
    public function create($data = null, $options = array()) {
        if (empty($options['table'])) {
            if (!empty($this->table)) {
                $options['table'] = $this->table;

            } else {
                return false;
            }
        }

        if ($data !== null && is_array($data)) {
            $set = array();

            foreach ($data as $k => $v) {
                if ($v === null) {
                    $set[] = "`{$k}` = NULL";

                } else {
                    $set[] = "`{$k}` = '{$v}'";
                }
            }

            $q = "INSERT INTO `{$options['table']}` SET ".implode(", ", $set).";";

            $r = $this->_query($q);

            if ($r) {
                // if the query is successful return the create row
                return $this->find($this->lastId());
            } else {
                // else return false
                return false;
            }

        } else {
            // data was null or not an array
            return false;
        }
    }

    // update
    // builds an UPDATE query based on the variables passed
    // $data must be an associative array with indexes matching the field names
    // $table and $id can be omitted for the current id/table to be used
    // to update the current record you could use:
    //   db->update(array("title" => "Cheese", "price" => 9.99));
    public function update($data, $id = null, $options = array()) {
        if (empty($options['table'])) {
            if (!empty($this->table)) {
                $options['table'] = $this->table;

            } else {
                return false;
            }
        }

        if (is_array($data) && !empty($id)) {
            $set = array();

            foreach ($data as $k => $v) {
                if ($v === null) {
                    $set[] = "`{$k}` = NULL";

                } else {
                    $set[] = "`{$k}` = '{$v}'";
                }
            }

            $q = "UPDATE `{$options['table']}` SET ".implode(", ", $set)." WHERE `{$this->id}` = '{$id}';";

            return $this->_query($q);

        } else {
            return false;
        }
    }

    // delete
    // builds a DELETE query based on the variables passed
    // all varibles are optional and will default to the current table/id
    // $id can be an associative array of fields/values to match before deleting
    // to delete all news posts by bob you could do:
    //   db->delete(array("user" => "bob"), "news");
    // to delete all news posts by bob with car in the title you could do:
    //   db->delete(array("user" => "bob", "title" => array("mode" => "LIKE", "value" => "%car%")), "news", "OR");
    public function delete($id = null, $options = array()) {
        if (empty($options['table'])) {
            if (!empty($this->table)) {
                $options['table'] = $this->table;
            } else {
                return false;
            }
        }

        $where = array();

        if (is_array($id)) {
            foreach ($id as $k => $v) {
                if (is_array($v) && isset($v['mode'], $v['value'])) {
                    $where[] = "`{$k}` {$v['mode']} '{$v['value']}'";

                } elseif ($v === null) {
                    $where[] = "ISNULL(`{$k}`)";

                } elseif (!is_array($v) && !empty($v)) {
                    $where[] = "`{$k}` = '{$v}'";
                }
            }
        } elseif (is_string($id) || is_numeric($id)) {
            $where[] = "`{$this->id}` = {$id}";
        }

        /** @var TYPE_NAME $mode */
        if ($mode !== "AND" || $mode !== "OR") {
            $mode = "AND";
        }

        $q = "DELETE FROM `{$options['table']}` WHERE ".implode(" {$mode} ", $where);

        if (isset($options['limit']) && !empty($options['limit'])) {
            $q .= " LIMIT {$options['limit']}";
        }
        $q .= ";";

        return $this->_query($q);
    }

    // random
    // returns $n, random rows from $table
    public function random($n = 1, $options = array()) {
        if (empty($options['table'])) {
            if (!empty($this->table)) {
                $options['table'] = $this->table;

            } else {
                return false;
            }
        }

        if (!is_numeric($n)) {
            $n = 1;
        }

        return $this->_get("SELECT * FROM `{$options['table']}` ORDER BY RAND() LIMIT {$n};");
    }

    public function lastTableId($n , $options = array()) {
        if (empty($options['table'])) {
            if (!empty($this->table)) {
                $options['table'] = $this->table;

            } else {
                return false;
            }
        }



        return $this->_get("SELECT * FROM `{$options['table']}` ORDER BY `{$n}` DESC LIMIT 1;");
    }

    
    // numRows
    // returns the number of rows in $table
    // $table can be omitted and the number of rows in the current table will be returned
    public function numRows($options = array()) {
        if (empty($options['table'])) {
            if (!empty($this->table)) {
                $options['table'] = $this->table;

            } else {
                return false;
            }
        }

        $r = $this->_query("SELECT `{$this->id}` FROM `{$options['table']}`;");

        return $this->_num_rows($r);
    }
    
    

    // lastId
    // return the id of the last inserted row
    public function lastId() {
        return $this->_auto_increment_id();
    }

    // table
    // creates a clone of the current db object using $options as the default table
    // (or $options['table'] if $options is an array)
    public function table($options = null) {
        if ($options === null && !empty($this->table)) {
            return clone $this;

        } elseif (is_string($options) && !empty($options)) {
            $r = clone $this;
            $r->table = $options;

            return $r;

        } elseif (is_array($options) && isset($options['table']) && !empty($options['table'])) {
            $r = clone $this;
            $r->table = $options['table'];

            return $r;

        } else {
            return false;
        }
    }

    public function getFields($options = array()) {
        if (!empty($this->fields)) {
            return $this->fields;
        } else {
            if (empty($options['table'])) {
                $options['table'] = $this->table;

            } else {
                return false;
            }

            $q = "SHOW FIELDS FROM `{$options['table']}`;";
            $fields = $this->_get($q, array('raw' => true));

            foreach ($fields as $field) {
                if (isset($field['Field'])) {
                    $this->fields[] = $field['Field'];
                } elseif (isset($field['field'])) {
                    $this->fields[] = $field['Field'];
                } elseif (isset($field[0])) {
                    $this->fields[] = $field[0];
                }
            }
        }
        return $this->fields;
    }

    public function _new() {
        return new DB_record($this);
    }

}

class DB_record {
    private $_data = array();
    private $_db = null;
    private $_new = false;

    function __construct($db = null, $data = null) {
        if (!empty($db)) {
            $this->_db = $db;
        }

        if (is_array($data)) {
            $this->_data = $data;

            foreach ($this->_data as $key => $value) {
                if (is_array($value)) {
                    $this->_data = null;
                    break;

                } else {
                    $this->$key = $value;
                }
            }
        } else {
            $this->_new = true;

            if (!empty($this->_db)) {
                foreach ($this->_db->getFields() as $field) {
                    if ($field != $this->_db->id) {
                        $this->$field = null;
                    }
                }
            } else {
                return false;
            }
        }

        if (empty($this->_data) || empty($this->_db)) {
            return false;

        } else {
            return $this;
        }
    }

    function save() {
        $save = array();

        foreach ($this->_db->getFields() as $field) {
            if (isset($this->$field) && $field != $this->_db->id) {
                $this->_data[$field] = $this->$field;
                $save[$field] = $this->$field;
            }
        }

        $id = $this->_db->id;

        if ($this->_new) {
            $r = $this->_db->create($save);
            $this->$id = $this->_db->lastId();
            $this->_new = false;
            return $r;

        } else {
            return $this->_db->update($save, $this->$id);
        }
    }

    function isNew() {
        return $this->_new;
    }

}
?>