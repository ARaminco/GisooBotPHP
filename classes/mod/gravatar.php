<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 25/09/2016
 * Time: 01:51 AM
 */

function gravatarURL ($email){
    $hash_email = md5($email);
    $grav_url = "https://www.gravatar.com/avatar/". $hash_email ;
    return $grav_url;
}