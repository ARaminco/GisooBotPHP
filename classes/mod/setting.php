<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    $gs_mod_st_opsiename = $_POST['opsiename'];
    $gs_mod_st_opbotn = $_POST['opbotn'];
    $gs_mod_st_opbotid = $_POST['opbotid'];
    $gs_mod_st_opadmintid = $_POST['opadmintid'];
    $gs_mod_st_opadminuid = $_POST['opadminuid'];
    $gs_mod_st_opdebug = $_POST['opdebug'];
    $gs_mod_st_botchannel = $_POST['opbotchannel'];
    $gs_mod_st_opwebapi = $_POST['opwebapi'];
    $gs_mod_st_rphone = $_POST['oprphone'];

    if (isset($_POST['opsiename'])){
        $gs_update_db = $proptions->find_by_name("sitename");
        $gs_update_db -> text = $gs_mod_st_opsiename ;
        $gs_update_db-> save();
        $gs_update_db = $proptions->find_by_name("BotName");
        $gs_update_db -> text = $gs_mod_st_opbotn ;
        $gs_update_db-> save();
        $gs_update_db = $proptions->find_by_name("BotID");
        $gs_update_db -> text = $gs_mod_st_opbotid ;
        $gs_update_db-> save();
        $gs_update_db = $proptions->find_by_name("TelegramAdminID");
        $gs_update_db -> text = $gs_mod_st_opadmintid ;
        $gs_update_db-> save();
        $gs_update_db = $proptions->find_by_name("TelegramAdminUID");
        $gs_update_db -> text = $gs_mod_st_opadminuid ;
        $gs_update_db-> save();
        $gs_update_db = $proptions->find_by_name("BotDebug");
        $gs_update_db -> int = $gs_mod_st_opdebug ;
        $gs_update_db-> save();
        $gs_update_db = $proptions->find_by_name("botchannel");
        $gs_update_db -> text = $gs_mod_st_botchannel ;
        $gs_update_db-> save();
        $gs_update_db = $proptions->find_by_name("webapi");
        $gs_update_db -> text = $gs_mod_st_opwebapi ;
        $gs_update_db-> save();
        $gs_update_db = $proptions->find_by_name("rphone");
        $gs_update_db -> int = $gs_mod_st_rphone ;
        $gs_update_db-> save();

        //echo "$result_set_token";
        $gs_projectPart_view = "admin";
        $_POST['T'] = "setting";
        $gs_out = 1;
        $gs_out_title = "درخواست انجام شد";
        $gs_out_text = "صفحه را مجدد رفرش کنید .";
    }

    