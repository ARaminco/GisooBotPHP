<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    $gs_mod_st_adminpass = $_POST['adminpass'];
    $gs_mod_st_adminpass = $pwdHasher->HashPassword( "$gs_mod_st_adminpass");



    if (isset($_POST['adminpass'])){
        $gs_update_db = $prousers->find_by_id("1");
        $gs_update_db -> pass = $gs_mod_st_adminpass ;
        $gs_update_db -> save();


        //echo "$result_set_token";
        $gs_projectPart_view = "admin";
        $_POST['T'] = "setting";
        $gs_out = 1;
        $gs_out_title = "درخواست انجام شد";
        $gs_out_text = "صفحه را مجدد رفرش کنید .";
    }

    