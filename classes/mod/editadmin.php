<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    $gs_mod_st_adminuser = $_POST['adminuser'];
    $gs_mod_st_adminname = $_POST['adminname'];
    $gs_mod_st_adminemail = $_POST['adminemail'];


    if (isset($_POST['adminuser'])){
        $gs_update_db = $prousers->find_by_id("1");
        $gs_update_db -> user = $gs_mod_st_adminuser ;
        $gs_update_db -> email = $gs_mod_st_adminemail ;
        $gs_update_db -> name = $gs_mod_st_adminname ;
        $gs_update_db -> save();


        //echo "$result_set_token";
        $gs_projectPart_view = "admin";
        $_POST['T'] = "setting";
        $gs_out = 1;
        $gs_out_title = "درخواست انجام شد";
        $gs_out_text = "صفحه را مجدد رفرش کنید .";
    }

    