<?php
    $id = $_REQUEST['id'];
    $cat = $_REQUEST['cat'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET categoria='".utf8_decode($cat)."' WHERE id=$id");
    
    $bd->close();