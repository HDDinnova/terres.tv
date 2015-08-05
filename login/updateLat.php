<?php
    $id = $_REQUEST['id'];
    $l = $_REQUEST['l'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET latitud='$l' WHERE id=$id");
    
    $bd->close();