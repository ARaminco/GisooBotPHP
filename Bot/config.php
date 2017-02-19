<?php
include ("db.php");
include_once('../classes/jdf.php');
include ("../classes/db.php");
include ("../config.php");
include ("../classes/functions.php");


$db = new DB("mysql://$mysql_user:$mysql_pass@$mysql_host/$mysql_db");
mysql_set_charset('utf8');
$proptions = $db->table('gs_options');
$gs_tbot_commands = $db->table('gs_tbot_commands');
$botapi = $proptions->find_by_name('TelegramBotAPI')->text ;
$adminUID = $proptions->find_by_name('TelegramAdminUID')->text ;
$adminUser = $proptions->find_by_name('TelegramAdminID')->text ;
$BotName = $proptions->find_by_name('BotName')->text ;
$botid = $proptions->find_by_name('BotID')->text ;
$botdebug = $proptions->find_by_name('BotDebug')->int ;
$checkrphone = $proptions->find_by_name('rphone')->int ;
$webapi = $proptions->find_by_name('webapi')->text ;
$gs_botout = $proptions->find_by_name('botout')->int ;

$data 		= json_decode(file_get_contents("php://input"), true);
$dataset = file_get_contents("php://input");
$prttext = prettyPrint( $dataset );

//var_dump($data);
$cid = $data ["message"]["chat"]["id"];
$chattype = $data ["message"]["chat"]["type"];
$chattitle = $data ["message"]["chat"]["title"];
$uid = $data ["message"]["from"]["id"];
$inText = $data["message"]["text"];
$fname = $data["message"]["from"]["first_name"];
$photo = $data["message"]["photo"]["0"]["file_id"];
$video = $data["message"]["video"]["file_id"];
$sticker = $data["message"]["sticker"]["file_id"];
$doc = $data["message"]["document"]["file_id"];
$uname = $data["message"]["from"]["username"];
$fname = $data["message"]["from"]["first_name"];
$lname = $data["message"]["from"]["last_name"];
$reply = $data["message"]["reply_to_message"]["text"];
$userPhoneNumber = $data["message"]["contact"]["phone_number"];
$callback = $data ["callback_query"]["data"];

if($callback!=""){
    $cid = $data ["callback_query"]["from"]["id"];
    $uid = $cid;
}








?>


