
<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 09/01/2017
 * Time: 10:50 PM
 */


$gs_admin_directory = "Gisoo_Admin_Super_80PORT";

include ("../config.php");
// Name of the file
include ("../classes/PasswordHash.php");
include ("../classes/db.php");
$pwdHasher = new PasswordHash(8 ,false );

$gs_mod_st_adminuser = $_POST['adminuser'];
$gs_mod_st_adminemail = $_POST['email'];
$gs_mod_st_adminname = $_POST['adminname'];
$gs_mod_st_adminpass = $_POST['adminpass'];
$gs_mod_st_adminpass = $pwdHasher->HashPassword( "$gs_mod_st_adminpass");



$db = new DB("mysql://$mysql_user:$mysql_pass@$mysql_host/$mysql_db");
mysql_query('SET NAMES \'utf8\'');
mysql_set_charset('utf8');

$prousers = $db->table('gs_users');
$gs_update_db = $prousers->find_by_id("1");
$gs_update_db -> user = $gs_mod_st_adminuser ;
$gs_update_db -> email = $gs_mod_st_adminemail ;
$gs_update_db -> name = $gs_mod_st_adminname ;
$gs_update_db -> pass = $gs_mod_st_adminpass ;
$gs_update_db -> save();


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>نصب کننده گیسو</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../<?php echo $gs_admin_directory ;?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../<?php echo $gs_admin_directory ;?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../<?php echo $gs_admin_directory ;?>/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="../<?php echo $gs_admin_directory ;?>/dist/css/bootstrap-rtl.min.css">
    <style>
        body{
            font-family: 'WYekan', 'Helvetica Neue', Helvetica, Atahoma;
        }
        .persian{
            font-family: 'WYekan', 'Helvetica Neue', Helvetica, Atahoma;
        }
        .rtl{
            direction: rtl;
        }
        .ltr{
            direction: ltr;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a class=" " href="#"><li class="fa fa-cogs"></li> اطلاعات با موفقیت به ذخیره شد <li class="fa fa-check-square-o "></li></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

        <h4 class="login-box-msg persian">نصب تمام شد !!!</h4>
        <p class="login-box-msg" >از گیسو لذت ببرید !!!</p>
        <h4 class="login-box-msg persian">حتما پوشه install را حذف کنید !</h4>
            <div class="row">
                <div class="col-xs-12">
                    <a href="../index.php" class="btn btn-primary btn-block  "><li class="fa fa-check-square-o"></li> ورود به سایت </a>
                </div><!-- /.col -->
            </div>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


<!-- jQuery 2.1.4 -->
<script src="../<?php echo $gs_admin_directory ;?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.4 -->
<script src="../<?php echo $gs_admin_directory ;?>/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../<?php echo $gs_admin_directory ;?>/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>

