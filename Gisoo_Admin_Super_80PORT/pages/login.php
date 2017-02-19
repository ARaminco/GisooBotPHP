<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 24/10/2016
 * Time: 05:03 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $siteName ; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="<?php echo $gs_admin_directory ;?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $gs_admin_directory ;?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $gs_admin_directory ;?>/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="<?php echo $gs_admin_directory ;?>/dist/css/bootstrap-rtl.min.css">

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
        <a class="fa fa-paper-plane " href="<?php echo $gs_url_base ; ?>"> <?php echo $siteName ; ?> </a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">ورود به سیستم</p>
        <div>
            <p class="login-box-msg" ><?php echo  $gs_out_title ; ?></p>
        </div>
        <form action="index.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="USERNAME" name="user">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="PASSWORD" name="pass">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <input name="M" value="login" hidden>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block ">ورود</button>
                </div><!-- /.col -->
            </div>
        </form>

    </div><!-- /.login-box-body -->
    <div class="center-block" style=" ">
        <br>
        <?php
        $ad = ads(1);
        $ad_photo = $ad->photo;
        $ad_link = $ad->link;
        $ad_title = $ad->title;
        echo "<a href='$ad_link' target='_blank'><img src='$ad_photo' alt='$ad_title' class='img-responsive center-block'></a>";
        ?>


        <br>
    </div>
    <div class="center-block" style="width: 150px">
        <br>
        <img src="../../logo.gif?" alt="گیسو" class="img-responsive center-block">
    </div>
</div><!-- /.login-box -->


<!-- jQuery 2.1.4 -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.4 -->
<script src="<?php echo $gs_admin_directory ;?>/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/iCheck/icheck.min.js"></script>
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
