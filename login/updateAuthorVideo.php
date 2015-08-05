<?php
    $id = $_REQUEST['id'];
    $a = $_REQUEST['a'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET autorvideo='".utf8_decode($a)."' WHERE id=$id");
    
    $bd->close();