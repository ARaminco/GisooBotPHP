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
        include ('theme/home.php');
    }

    //Blog page
    if ($gs_page_type == 'blog')
    {
        include ('theme/blog.php');
    }

    //singelpages
    if ($gs_page_type == 'page')
    {
        if (isset($_GET['P']))
        {
            $gs_page_singelid = $_GET['P'];
        }
        elseif (isset($_GET['N']))
        {
            $gs_page_singelid = $_GET['N'];
        }
        else
        {
            $gs_page_singelid = '1';
        }
        if (isset($gs_page_singelid))
        {
            $gs_singel_title = $proposts -> find_by_id("$gs_page_singelid")->title;
            $gs_singel_text = $proposts -> find_by_id("$gs_page_singelid")->text;
            $gs_singel_shdate = $proposts -> find_by_id("$gs_page_singelid")->shdate;
            $gs_singel_tags = $proposts -> find_by_id("$gs_page_singelid")->tags;
            include ('theme/page.php');
        }
    }

    if ($gs_page_type == 'out')
    {
        include ('theme/out.php');
    }

    if ($gs_page_type == 'login' && !isset($_SESSION['checkUSERonline']))
    {
        include ('theme/login.php');
    }

    if ($gs_page_type == 'logout')
    {
        include ('classes/mod/logout.php');
    }
    
