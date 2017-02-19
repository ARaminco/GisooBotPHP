<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 21/09/2016
 * Time: 06:39 PM
 */
    $gs_page_lang = $_GET['L'];
    
    //Site lang
    //Farsi/Persian
    if ($gs_page_lang == 'fa' || !isset($gs_page_lang))
    {
        include ('lang/fa.php');
    }
   
