<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    $gs_mod_cm_command = urlencode($_POST['command']);
    $gs_mod_cm_text = urlencode($_POST['cmtext']);
    $gs_mod_cm_keyb = urlencode($_POST['cmkeyb']);
    $gs_mod_cm_photo = $_POST['photo'];
    $gs_mod_cm_video = $_POST['video'];
    $gs_mod_cm_type = $_POST['cmtype'];

    if (isset($_POST['command'])){
        $insert_to_commands = array(
            'command'=>"$gs_mod_cm_command",
            'photo'=>"$gs_mod_cm_photo",
            'video'=>"$gs_mod_cm_video",
            'text'=>"$gs_mod_cm_text",
            'keyboard'=>"$gs_mod_cm_keyb",
            'type'=>"$gs_mod_cm_type",
        );
        $gs_insert_command = $proTbotCommands->create($insert_to_commands);

        //echo "$result_set_token";
        $gs_projectPart_view = "admin";
        $gs_page_type = "commands";
        $gs_out = 1;
        $gs_out_title = "درخواست انجام شد ،";
        $gs_out_text = "دستور مورد نظر افزوده شد . <br/> برای مشاهده لطفا صفحه را رفرش کنید ...";
        //$gs_out_text = $gs_mod_cm_keyb;
    }

    