<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 08/01/2017
 * Time: 03:11 AM
 */
include ("config.php");
$pass = $webapi;
$inpass = $_POST['pass'];
$phone = (int) $_POST['phone'];
$text = $_POST['text'];
$photo = $_POST['photo'];
$caption = $_POST['caption'];
$doc = $_POST['doc'];

if ($pass == $inpass){
    $result2 = mysql_query("SELECT * FROM gs_tbot_users WHERE phone LIKE '%$phone'")or die(mysql_error());// انتخاب از جدول
    while ($row = mysql_fetch_array($result2)){
        $cid = $row['UID'];
        //echo $cid ;
    }
    if (isset($text)){
        $sendM = sendMessage($cid, $text, $botapi, $encodedMarkup);
    }
    if (isset($photo)){
        $sendP = sendPhoto($cid, $photo, $botapi ,$caption ,$encodedMarkup);
    }
    if (isset($doc)){
        $sendD = sendDocument($cid, $doc, $botapi ,$caption);
    }


}