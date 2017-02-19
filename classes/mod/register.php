<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:19 PM
 */
    $gs_mod_register_user = $_POST['user'];
    $gs_mod_register_pass = $_POST['pass'];
    $gs_mod_register_email = $_POST['email'];
    $gs_mod_register_name = $_POST['name'];
    $gs_mod_register_date = date("Y-m-d");
    $gs_mod_register_type = "USER";
    $gs_mod_register_passhashed = $pwdHasher->HashPassword( "$gs_mod_register_pass");
    $gs_mod_register_chek_user = $prousers->find_by_user("$gs_mod_register_user")->email ;
    $gs_mod_register_chek_email = $prousers->find_by_user("$gs_mod_register_email")->user ;

    if ($gs_mod_register_chek_email == "")
    {
        if ($gs_mod_register_chek_user == "")
        {
            $is_valid = GUMP::is_valid($_POST, array(
                'user' => 'required',
                'pass' => 'required|min_len,6',
                'email' => 'required|valid_email',
                'name' => 'required'
            ));

            if($is_valid === true) {
                $insert_to_users = array(
                    'user'=>"$gs_mod_register_user",
                    'pass'=>"$gs_mod_register_passhashed",
                    'email'=>"$gs_mod_register_email",
                    'name'=>"$gs_mod_register_name",
                    'rdate'=>"$gs_mod_register_date",
                    'type'=>"$gs_mod_register_type"
                );
                $gs_insert_users = $prousers->create($insert_to_users);
                var_dump($gs_insert_users);
                if ($gs_insert_users)
                {
                    $gs_out_title ="ثبت نام با موفقیت انجام شد !";
                    $gs_out_text = "شما می توانید بعد از تایید ایمیل خود وارد سایت شوید !";
                    $_GET['T'] = "out";
                } else {
                    $gs_out_title ="خطایی در فرم ثبت نام رخ داد !!!";
                    $gs_out_text = "لطفا مجدد امتحان کنید !!";
                    //var_dump($is_valid);
                    $_GET['T'] = "out";
                }
            } else {
                $gs_out_title ="خطایی در فرم ثبت نام رخ داد !!!";
                $gs_out_text = "لطفا مجدد امتحان کنید !!";
                //var_dump($is_valid);
                $_GET['T'] = "out";
            }
        } else {
            $gs_out_title ="خطایی در فرم ثبت نام رخ داد !!!";
            $gs_out_text = "نام کاربری شما تکراری است !";
            $_GET['T'] = "out";
        }
    } else {
        $gs_out_title ="خطایی در فرم ثبت نام رخ داد !!!";
        $gs_out_text = "ایمیل وارد شده تکراری است !";
        $_GET['T'] = "out";
    }



