<?php include ("config.php"); ?>
<?php
//دستور های مدیر
if ($cid == "$adminUID"){
	
	include ("admin.php");
	
}

$gs_botin = $proptions->find_by_name('botin')->int ;
$gs_botin++;
$gs_update_db = $proptions->find_by_name('botin');
$gs_update_db -> int = $gs_botin ;
$gs_update_db-> save();



//دستور های کاربران معمولی

if ($chattype == "private"){

//چک و قرار دادن یوزر در لیست اعضا
    $sum=0;
    $cheker=0;
    $result2 = mysql_query("SELECT * FROM gs_tbot_users WHERE ID > 0 AND ChatID = '$uid' ")or die(mysql_error());// انتخاب از جدول
    while ($row = mysql_fetch_array($result2)){
        $u_t_id = $row['id'];
        $u_t_phone = $row['phone'];
        $cheker = $sum+1 ;
    }
    if($cheker==0){
        $regDate = date("Y-m-d");
        mysql_query("INSERT INTO gs_tbot_users (UName,UID,FName,LName,ChatID,phone,rdate) VALUES('$uname','$uid','$fname','$lname','$cid','','$regDate')")
        or die(mysql_error());
    }

    if ($checkrphone == '1'){
        if (empty($u_t_phone)){
            if (isset($userPhoneNumber)){
                $update = mysql_query("UPDATE gs_tbot_users SET phone='$userPhoneNumber' WHERE UID='$uid' ");
                $text = $gs_tbot_commands->find_by_id(2)->text;
                $encodedMarkup = $gs_tbot_commands->find_by_id(2)->keyboard;
                $sendM = sendMessage($cid, $text, $botapi, $encodedMarkup);
                $inText = "";
            }else{
                $text = $gs_tbot_commands->find_by_id(1)->text;
                $encodedMarkup = $gs_tbot_commands->find_by_id(1)->keyboard;
                $sendM = sendMessage($cid, $text, $botapi, $encodedMarkup);
                $inText = "";
            }
        }
    }

    $commandOk = urlencode($inText);
    $result2 = mysql_query("SELECT * FROM gs_tbot_commands WHERE command='$commandOk' AND type='1'") or die(mysql_error());
    while ($row = mysql_fetch_array($result2)) {
        $text = $row['text'];
        $keyboard = $row['keyboard'];
        $photo = $row['photo'];
        $video = $row['video'];
        $encodedMarkup = $keyboard;
        if (!empty($video)){
            $sendV = sendVideo($cid, $video, $botapi ,$text ,$encodedMarkup);
        }elseif (!empty($photo)){
            $sendP = sendPhoto($cid, $photo, $botapi ,$text ,$encodedMarkup);
        }else{
            $sendM = sendMessage($cid, $text, $botapi, $encodedMarkup);
        }
    }
}


if (!empty($sendM)||!empty($sendP)){
    $gs_botout = $proptions->find_by_name('botout')->int ;
    $gs_botout++;
    $gs_update_db = $proptions->find_by_name('botout');
    $gs_update_db -> int = $gs_botout ;
    $gs_update_db-> save();
}




if ($botdebug == 1){
    $text = $sendV;
    $sendM = sendMessage($cid, $text, $botapi, $encodedMarkup);
}
mysql_close;
?>

