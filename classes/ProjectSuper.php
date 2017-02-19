<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 23/09/2016
 * Time: 01:14 PM
 */
    
   
    
    

    $gs_super_class = $_POST['M'];
    if (isset($_GET['M']))
    {
        $gs_super_class = $_GET['M'];
    }
    //--------------------------------


if ($gs_super_class == 'login')
    {
        include ('classes/mod/login.php');
    }

if ($gs_super_class == 'register')
    {
        include ('classes/mod/register.php');
    }

if ($gs_super_class == 'logout')
    {
        include ('classes/mod/logout.php');
    }

if ($gs_super_class == 'tokenset')
    {
        include ('classes/mod/tokenset.php');
    }

if ($gs_super_class == 'editcommands')
    {
        include ('classes/mod/editcommands.php');
    }
if ($gs_super_class == 'addcommands')
    {
        include ('classes/mod/addcommands.php');
    }

if ($gs_super_class == 'editsetting')
    {
       include ('classes/mod/setting.php');
    }
if ($gs_super_class == 'editadmin')
    {
       include ('classes/mod/editadmin.php');
    }
if ($gs_super_class == 'editadminpass')
    {
       include ('classes/mod/editadminpass.php');
    }

if ($gs_super_class == 'deletecommands')
    {
        include ('classes/mod/deletecommands.php');
    }

if ($gs_super_class == 'sendtochannel')
    {
        include ('classes/mod/sendtochannel.php');
    }