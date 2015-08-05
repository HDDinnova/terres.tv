<?php
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET titol='".utf8_decode(addslashes($title))."' WHERE id=$id");
    
    $bd->close();