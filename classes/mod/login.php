<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    @$gs_mod_login_user=  mysql_real_escape_string ($_POST['user']);
    @$gs_mod_login_pass= $_POST['pass'];
    @$gs_mod_login_checked = $_POST['check'];
    $gs_mod_login_pass_db_users = $prousers->find_by_user("$gs_mod_login_user")->pass ;
    $gs_mod_login_db_email = $prousers->find_by_user("$gs_mod_login_user")->email ;
    if ($gs_mod_login_db_email!="")
    {
        $checked = $pwdHasher->CheckPassword($gs_mod_login_pass, $gs_mod_login_pass_db_users);
        if ($checked){
            $is_valid = GUMP::is_valid($_POST, array(
                'user' => 'required',
                'pass' => 'required'
            ));
            if($is_valid === true)
            {
                $_SESSION['usernameOnline'] = $gs_mod_login_user;
                $_SESSION['passwordOnline'] = $gs_mod_login_pass;
                $_SESSION['rememberChecked'] = $gs_mod_login_checked;
                $_SESSION['checkUSERonline'] = "yes";
                if (isset($_SESSION['rememberChecked']) && $_SESSION['rememberChecked'] == '1'){
                    $login_time=2592000;
                    setcookie(session_name(),session_id(),time()+$login_time,("/"));
                }
                // اطلاعات کاربر صحیح است، انتقال به صفحه اعضاء
                header("location:index.php?W=admin");
            } else {
                $gs_out_title ="خطایی در هنگام ورود به سایت رخ داد !!";
                $gs_out_text = "لطفا مجدد امتحان کنید !!";
                $_GET['T'] = "out";
            }
        } else {
            $gs_out_title ="خطایی در هنگام ورود به سایت رخ داد !!";
            $gs_out_text = "رمز عبور اشتباه است !";
            $_GET['T'] = "out";
        }
    } else {
        $gs_out_title ="خطایی در هنگام ورود به سایت رخ داد !!";
        $gs_out_text = "نام کاربری شما یافت نشد !";
        $_GET['T'] = "out";
    }

    