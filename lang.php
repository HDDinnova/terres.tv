<?php
session_start();
ob_start();
header('Cache-control: private'); // IE 6 FIX
 
if(isSet($_SESSION['lang'])) {
    switch ($_SESSION['lang']) {
      case 'ca':
        $lang_file = 'lang.cat.php';
        break;

      case 'es':
        $lang_file = 'lang.es.php';
        break;

      case 'fr':
        $lang_file = 'lang.fr.php';
        break;

      case 'en':
        $lang_file = 'lang.en.php';
        break;
    }
} else {
  $idioma=substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
  $_SESSION['lang']=$idioma;
    switch ($idioma){
      case 'ca':
        $lang_file = 'lang.cat.php';
        break;

      case 'es':
        $lang_file = 'lang.es.php';
        break;

      case 'fr':
        $lang_file = 'lang.fr.php';
        break;

      case 'en':
        $lang_file = 'lang.en.php';
        break;
    }
}

$_SESSION['lang']='ca'; 
include_once $_SERVER['DOCUMENT_ROOT'].'/lang/lang.cat.php'; //include_once $_SERVER['DOCUMENT_ROOT'].'/terrestv/lang/'.$lang_file;