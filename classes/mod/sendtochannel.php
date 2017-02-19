<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    $gs_mod_telegram_text =  urlencode($_POST['text']);
if (!empty($_POST['keyboard'])){
    $gs_mod_telegram_keyboard =  urlencode($_POST['keyboard']);
    echo $_POST['keyboard'];
}
    $gs_mod_telegram_photo =  $_POST['photo'];

    if (isset($_POST['text'])){
        if (!empty($gs_mod_telegram_photo)){
            $sendP = sendPhoto($botchannel, $gs_mod_telegram_photo, $botapi ,$gs_mod_telegram_text ,$gs_mod_telegram_keyboard);
        }else{
            $sendM = sendMessage($botchannel, $gs_mod_telegram_text, $botapi, $gs_mod_telegram_keyboard);
        }



        //echo "$result_set_token";
        $gs_page_type = "admin";
        $gs_out = 1;
        $gs_out_title = "درخواست انجام شد ، نتیجه :";
        $gs_out_text = "$sendM"." - "."$sendP"." - "."$gs_mod_telegram_keyboard";
    }

    