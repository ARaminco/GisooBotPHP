<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 29/10/2016
 * Time: 07:37 PM
 */
function sendMessage($cid, $text, $botapi ,$encodedMarkup) {
    global $botapi,$botdebug,$adminUID,$fname,$lname,$uname ;
    $text = urldecode($text);

    //$text=  urlencode($text);
    $text = str_replace("%name%","$fname",$text);
    $text = str_replace("%lname%","$lname",$text);
    $text = str_replace("%uname%","@$uname",$text);
    $curl = curl_init("https://api.telegram.org/bot$botapi/sendMessage");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&text=$text&reply_markup=$encodedMarkup&parse_mode=HTML");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($curl);

    curl_close($curl);

    if ($botdebug == 1){
        $result = prettyPrint( $result );
        $curl = curl_init("https://api.telegram.org/bot$botapi/sendMessage");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$adminUID&text=$result");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result2 = curl_exec($curl);
        curl_close($curl);
    }
    return $result;
}


function sendPhoto($cid, $photo, $botapi ,$caption ,$encodedMarkup) {
    global $botapi,$botdebug,$adminUID,$fname,$lname,$uname ;
    //$text=  urlencode($text);
    $text = $caption ;
    $text = str_replace("%name%","$fname",$text);
    $text = str_replace("%lname%","$lname",$text);
    $text = str_replace("%uname%","@$uname",$text);

    $curl = curl_init("https://api.telegram.org/bot$botapi/sendPhoto");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&photo=$photo&caption=$text&reply_markup=$encodedMarkup");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}


function sendVideo($cid, $video, $botapi ,$caption ,$encodedMarkup) {
    global $botapi,$botdebug,$adminUID,$fname,$lname,$uname ;
    //$text=  urlencode($text);
    $text = $caption ;
    $text = str_replace("%name%","$fname",$text);
    $text = str_replace("%lname%","$lname",$text);
    $text = str_replace("%uname%","@$uname",$text);

    $curl = curl_init("https://api.telegram.org/bot$botapi/sendVideo");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&video=$video&caption=$text&reply_markup=$encodedMarkup");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}


function sendDocument($cid, $doc, $botapi ,$caption) {
    $curl = curl_init("https://api.telegram.org/bot$botapi/sendDocument");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&document=$doc");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}


function prettyPrint( $json ){
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                $level--;
                $ends_line_level = NULL;
                $new_line_level = $level;
                break;

                case '{': case '[':
                $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                $char = "";
                $ends_line_level = $new_line_level;
                $new_line_level = NULL;
                break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}

function ads ($type){
    $curl = curl_init("https://aramin.co/Ads/adGo.php");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "type=$type");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result);
    return $result;
    //$test = "test";
}
?>

<?php ${"\x47\x4c\x4f\x42A\x4c\x53"}["\x66kxx\x63\x67ljg\x75"]="r\x65\x73\x75\x6ct";${"\x47\x4cO\x42ALS"}["\x6f\x68x\x7a\x62\x77p"]="\x63\x75\x72l";function LicenseCheck($license,$app){${"\x47L\x4f\x42\x41LS"}["i\x63\x6d\x6db\x6cyi\x71c\x7a"]="\x63\x75\x72\x6c";${"\x47\x4c\x4fB\x41\x4c\x53"}["u\x6co\x75\x63\x68\x79"]="\x75\x72\x6c";${"G\x4c\x4fB\x41L\x53"}["\x70\x6fljc\x65d\x6f\x6bu\x63"]="cur\x6c";${${"\x47\x4cOBA\x4c\x53"}["\x75l\x6fu\x63hy"]}=$_SERVER["H\x54\x54P_H\x4f\x53\x54"];${${"\x47\x4c\x4f\x42A\x4cS"}["\x6f\x68\x78\x7a\x62wp"]}=curl_init("\x68ttp://lic\x65n\x73e.arami\x6e.\x63\x6f/L\x69Ch\x41R\x43O.php");curl_setopt(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6f\x68x\x7a\x62\x77p"]},CURLOPT_POST,1);curl_setopt(${${"\x47LOB\x41\x4cS"}["ic\x6d\x6db\x6c\x79i\x71\x63\x7a"]},CURLOPT_POSTFIELDS,"\x75\x72l\x3d$url\x26\x61\x70\x70\x3d$app&\x6ci\x63e\x6e\x73\x65=$license");$ktvuxvsqbjoc="\x72e\x73u\x6ct";curl_setopt(${${"GLOB\x41\x4cS"}["\x6f\x68xzb\x77\x70"]},CURLOPT_RETURNTRANSFER,TRUE);${${"GL\x4f\x42\x41\x4c\x53"}["\x66kxxcg\x6cj\x67\x75"]}=curl_exec(${${"G\x4c\x4f\x42AL\x53"}["p\x6fl\x6a\x63ed\x6f\x6b\x75c"]});curl_close(${${"\x47\x4cO\x42\x41\x4c\x53"}["\x6f\x68x\x7abw\x70"]});return${$ktvuxvsqbjoc};}
?>