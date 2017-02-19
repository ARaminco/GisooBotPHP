<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 09/01/2017
 * Time: 10:50 PM
 */


$gs_admin_directory = "Gisoo_Admin_Super_80PORT";

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
        <a class=" " href="#"><li class="fa fa-cogs"></li> نصب کننده گیسو <li class="fa fa-cogs"></li></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <h4 class="login-box-msg persian">فرم ثبت اطلاعات</h4>
        <div>
            <p class="login-box-msg persian" >به سیستم نصاب گیسو خوش آمدید. <br> برای شروع مراحل نصب اطلاعات هاست خود را در فرم زیر وارد کنید .</p>
        </div>
        <form action="step1.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control ltr" placeholder="localhost" name="host" value="localhost">
                <span class="fa fa-server form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control ltr" placeholder="DB-name" name="dbName">
                <span class="fa fa-database form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control ltr" placeholder="DB-user" name="dbUser">
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control ltr" placeholder="DB-pass" name="dbPass">
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label class="persian">آدرس سایت : </label>
                <input type="text" class="form-control ltr" placeholder="https://yourdomain.com" name="URL">
                <span class="fa fa-globe form-control-feedback"></span>
                <p class="persian">حتما باید همراه با HTTPS باشد !</p>
            </div>
            <div class="form-group has-feedback">
                <label class="persian">لایسنس گیسو : </label>
                <input type="text" class="form-control ltr" placeholder="Your License" name="license">
                <span class="fa fa-asterisk form-control-feedback"></span>
                <p class="persian">در صورت نداشتن لایسنس می توانید از سایت ما خرید کنید . <br> <a href="https://panel.aramin.co">aramin.co</a></p>

            </div>
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

