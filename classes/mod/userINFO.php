<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 25/09/2016
 * Time: 12:30 AM
 */
    $gs_user_online = $_SESSION['usernameOnline'];
    $gs_user_online_email = $prousers->find_by_user("$gs_user_online")->email;
    $gs_user_online_name = $prousers->find_by_user("$gs_user_online")->name;
    $gs_user_online_type = $prousers->find_by_user("$gs_user_online")->type;
    $gs_user_online_id = $prousers->find_by_user("$gs_user_online")->id;
    $gs_user_online_avatar = gravatarURL($gs_user_online_email);
    $gs_user_online_rdate = $prousers->find_by_user("$gs_user_online")->rdate;
?>