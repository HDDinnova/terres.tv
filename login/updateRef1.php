<?php
    $id = $_REQUEST['id'];
    $r = $_REQUEST['r'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET referit1='".utf8_decode($r)."' WHERE id=$id");
    
    $bd->close();