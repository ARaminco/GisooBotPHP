
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
$filename = 'Gisoo.sql';
// MySQL host
$mysql_host = $mysql_host;
// MySQL username
$mysql_username = $mysql_user;
// MySQL password
$mysql_password = $mysql_pass;
// Database name
$mysql_database = $mysql_db;

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

// Add this line to the current segment
    $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        // Perform the query
        mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
 //echo "Tables imported successfully";

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
        <a class=" " href="#"><li class="fa fa-cogs"></li> دیتابیس با موفقیت ذخیره شد <li class="fa fa-check-square-o "></li></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg" ><?php  echo "Tables imported successfully"; ?></p>
        <h4 class="login-box-msg persian">مرحله دوم : اطلاعات مدیریت</h4>
        <form action="finish.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control ltr" placeholder="Admin Username" name="adminuser" >
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control ltr" placeholder="Admin Password" name="adminpass">
                <span class="fa fa-key form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control ltr" placeholder="Admin E-Mail" name="email">
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label class="persian">نام و نام خانوادگی : </label>
                <input type="text" class="form-control rtl" placeholder="آرامین" name="adminname">
                <span class="fa fa-user-circle form-control-feedback"></span>
            </div>
            <input name="M" value="login" hidden>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block  ">ثبت و ادامه <li class="fa fa-arrow-circle-left"></li></button>
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

