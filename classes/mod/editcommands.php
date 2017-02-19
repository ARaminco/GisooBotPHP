<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    $gs_mod_cm_id = $_POST['cmid'];
    $gs_mod_cm_cm = urlencode($_POST['cm']);
    $gs_mod_cm_text = urlencode($_POST['cmtext']);
    $gs_mod_cm_keyb = urlencode($_POST['cmkeyb']);
    $gs_mod_cm_type = $_POST['cmtype'];
    $gs_mod_cm_video = $_POST['cmvideo'];
    $gs_mod_cm_photo = $_POST['cmphoto'];

    if (isset($_POST['cmid'])){
        $gs_update_db = $proTbotCommands->find_by_id("$gs_mod_cm_id");
        $gs_update_db -> command = $gs_mod_cm_cm ;
        $gs_update_db -> text = $gs_mod_cm_text ;
        $gs_update_db -> keyboard = $gs_mod_cm_keyb ;
        $gs_update_db -> type = $gs_mod_cm_type ;
        $gs_update_db -> photo = $gs_mod_cm_photo ;
        $gs_update_db -> video = $gs_mod_cm_video ;
        $gs_update_db-> save();

        //echo "$result_set_token";
        $gs_projectPart_view = "admin";
        $gs_page_type = "commands";
        $gs_out = 1;
        $gs_out_title = "درخواست انجام شد ،";
        $gs_out_text = "اطلاعات با موفقیت به روز شد . <br/> برای مشاهده لطفا صفحه را رفرش کنید ...";
        //$gs_out_text = $gs_mod_cm_keyb;
    }

    