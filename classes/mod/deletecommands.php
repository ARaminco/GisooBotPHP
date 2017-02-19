<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:17 PM
 */
    $gs_mod_cm_id = $_POST['cmid'];


    if (isset($_POST['cmid'])){;
        $delete = mysql_query("DELETE FROM gs_tbot_commands WHERE id='$gs_mod_cm_id' ") or die(mysql_error());
        //echo "$result_set_token";
        $gs_projectPart_view = "admin";
        $gs_page_type = "commands";
        $gs_out = 1;
        $gs_out_title = "درخواست انجام شد ،";
        $gs_out_text = "این گزینه حذف شد <br/> برای مشاهده لطفا صفحه را رفرش کنید ...";
        //$gs_out_text = $gs_mod_cm_keyb;
    }

    