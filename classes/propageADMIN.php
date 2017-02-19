<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 21/09/2016
 * Time: 06:39 PM
 */

    $gs_page_type = $_GET['T'];
    if (isset($_POST['T'])){
        $gs_page_type = $_POST['T'];
    }

    //$gs_page_type = $_POST['T'];
    //Theme Pagse
    //Home page
    if ($gs_page_type == 'home'||!isset($gs_page_type))
    {
       include ("$gs_admin_directory/home.php");
    }

    if ($gs_page_type == 'users')
    {
        include ("$gs_admin_directory/pages/users.php");
        $gs_hf_mod = "tabel";
    }

    if ($gs_page_type == 'setting')
    {
         include ("$gs_admin_directory/pages/setting.php");
         $gs_hf_mod = "tabel";
    }
    if ($gs_page_type == 'commands')
    {
        include ("$gs_admin_directory/pages/commands.php");
        $gs_hf_mod = "tabel";
    }