<?php
    $id = $_REQUEST['id'];
    $desc = $_REQUEST['desc'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $bd->query("UPDATE videos SET descripcio='".utf8_decode(addslashes($desc))."' WHERE id=$id");
    
    $bd->close();