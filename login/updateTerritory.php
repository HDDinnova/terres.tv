<?php
    $id = $_REQUEST['id'];
    $ter = $_REQUEST['ter'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET territori='".utf8_decode($ter)."' WHERE id=$id");
    
    $bd->close();