<?php
    $id = $_REQUEST['id'];
    $d = $_REQUEST['d'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    $novadata = new DateTime($d);
    
    $bd->query("UPDATE videos SET data='".$novadata->format("Y-m-d")."' WHERE id=$id");
    
    $bd->close();
