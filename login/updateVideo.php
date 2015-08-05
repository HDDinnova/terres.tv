<?php
    $id = $_REQUEST['id'];
    $url = $_REQUEST['url'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET url=$url WHERE id=$id");
    
    $bd->close();