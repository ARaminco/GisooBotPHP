<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 12:38 PM
 */

    $gs_projectPart_view = $_GET['W'];

    if ($gs_projectPart_view == 'base' || !isset($gs_projectPart_view))
    {
        if (isset($gs_user_online_type)){
            include ("$gs_admin_directory/base.php");
        }else{
            include ("$gs_admin_directory/pages/login.php");
        }
    }

    if ($gs_projectPart_view == 'admin' &&  $gs_user_online_type == "ADMIN")
    {
        include ("$gs_admin_directory/base.php");
    }
    if ($gs_projectPart_view == 'logout')
    {
        include ('classes/mod/logout.php');
        include ("$gs_admin_directory/pages/login.php");
    }
