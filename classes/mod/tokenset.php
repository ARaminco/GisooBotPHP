<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    $gs_mod_telegram_token=  $_POST['token'];

    if (isset($_POST['token'])){
        $result_set_token = file_get_contents("https://api.telegram.org/bot$gs_mod_telegram_token/setWebhook?url=$botlocation");

        $gs_update_db = $proptions->find_by_name('TelegramBotAPI');
        $gs_update_db -> text = $gs_mod_telegram_token ;
        $gs_update_db-> save();

        //echo "$result_set_token";
        $gs_page_type = "admin";
        $gs_out = 1;
        $gs_out_title = "درخواست انجام شد ، نتیجه :";
        $gs_out_text = prettyPrint( $result_set_token );
    }

    