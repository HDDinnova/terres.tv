<?php
    $id = $_REQUEST['id'];
    $t = $_REQUEST['t'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET tags='".utf8_decode(addslashes($t))."' WHERE id=$id");
    
    $bd->close();