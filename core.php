<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 02/09/2016
 * Time: 01:25 AM
 */



session_start();
//کانفیگ های دیتابیس
include_once ('config.php');
include_once ('classes/functions.php');
require_once ('classes/db.php');
require_once ('classes/mod/gravatar.php');
$db = new DB("mysql://$mysql_user:$mysql_pass@$mysql_host/$mysql_db");
mysql_set_charset('utf8');
$app="GisooBot";
//جداول دیتابیس
//نمونه
//$proptions = $db->table('pr_options');
$proptions = $db->table('gs_options');
$prousers = $db->table('gs_users');
$proposts = $db->table('gs_posts');
$proTbotUsers = $db->table('gs_tbot_users'); //Telegram Bot users : gs_tbot_users
$proTbotCommands = $db->table('gs_tbot_commands');

//تاریخ شمسی
require_once ('classes/jdf.php');
$shamsidate = jdate('l, j F Y');

//سازنده پسورد
require_once ('classes/PasswordHash.php');
$pwdHasher = new PasswordHash(8 ,false );


//تغییر پس زمینه
$imagelinks = $db->table('gs_bgimage');
$bglink = $imagelinks->random()->Link;

//برسی کننده فرم
//inpute validator class
//gump url : https://github.com/Wixel/GUMP
require "classes/gump.class.php";
$gump = new GUMP();

//اطلاعات سایت
$siteName = $proptions->find_by_name('sitename')->text ;
$siteName2 = $proptions->find_by_name('sitename2')->text ;
$siteFooter = $proptions->find_by_name('sitefooter')->text ;
$siteLogo =  $proptions->find_by_name('logo')->text ;
$gs_telegram_bot_api = $proptions->find_by_name('TelegramBotAPI')->text ;
$botapi = $proptions->find_by_name('TelegramBotAPI')->text ;
$adminUID = $proptions->find_by_name('TelegramAdminUID')->text ;
$adminID = $proptions->find_by_name('TelegramAdminID')->text ;
$botname = $proptions->find_by_name('BotName')->text ;
$botid = $proptions->find_by_name('BotID')->text ;
$botdebug = $proptions->find_by_name('BotDebug')->int ;
$botchannel = $proptions->find_by_name('botchannel')->text ;

$oldviews = $proptions->find_by_name('views')->int ;
$oldviews ++ ;
$newviews = $proptions->find_by_name('views');
$newviews -> int = $oldviews ;
$newviews-> save();

// USER INFO
if (isset($_SESSION['usernameOnline']) && isset($_SESSION['checkUSERonline'])){
    include ("classes/mod/userINFO.php");
}
//Telegram Bot SET
include ('Bot/db.php');
$BotUserCunt=0;
$sum = 0;
$result = mysql_query("SELECT * FROM gs_tbot_users WHERE ID > 0  ")or die(mysql_error());// انتخاب از جدول
while ($row = mysql_fetch_array($result)){
    $BotUserCunt = $BotUserCunt+1 ;
}
$BotCommandCunt=0;
$result = mysql_query("SELECT * FROM gs_tbot_commands WHERE ID > 0  ")or die(mysql_error());// انتخاب از جدول
while ($row = mysql_fetch_array($result)){
    $BotCommandCunt++ ;
}





