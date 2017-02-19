<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 09/01/2017
 * Time: 10:50 PM
 */


$gs_admin_directory = "Gisoo_Admin_Super_80PORT";

$step1_host = $_POST['host'];
$step1_dbName = $_POST['dbName'];
$step1_dbUser = $_POST['dbUser'];
$step1_dbPass = $_POST['dbPass'];
$step1_URL = $_POST['URL'];
$step1_license = $_POST['license'];

$data = '<?php 
$mysql_host ='." '$step1_host' ;".'
$mysql_user ='." '$step1_dbUser' ;".'
$mysql_pass ='." '$step1_dbPass' ;".'
$mysql_db ='." '$step1_dbName' ;".'
$gs_url_base ='." '$step1_URL' ;".'
$botlocation ='." '$step1_URL/Bot/bot.php';".'
$license ='." '$step1_license' ;".'
$gs_admin_directory ='." 'Gisoo_Admin_Super_80PORT';".'

$gisoo_version ='." '2.0';".'

?>
';

$myFile = '../config.php';
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $data);
fclose($fh);

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
        <a class=" " href="#"><li class="fa fa-cogs"></li> اطلاعات با موفقیت ثبت شد <li class="fa fa-check-square-o "></li></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <h4 class="login-box-msg persian">مرحله دوم : نصب دیتابیس</h4>
        <form action="step2.php" method="post">
            <input name="dbinstall" value="login" hidden>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block  ">نصب دیتابیس <li class="fa fa-arrow-circle-left"></li></button>
                </div><!-- /.col -->
            </div>
        </form>

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

