<?php
include ('../config.php');
mysql_connect("$mysql_host", "$mysql_user", "$mysql_pass")//اطلاعات اتصال
or die(mysql_error()); 
//echo "ارتباط برقرار شد!<br />";
mysql_select_db("$mysql_db")//نام دیتابیس
or die(mysql_error()); 
//echo "ارتباط با پایگاه داده برقرار شد!<br />";
mysql_query('SET NAMES \'utf8\''); 
mysql_set_charset('utf8'); 
?>