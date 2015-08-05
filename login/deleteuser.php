<?php
    $id = $_REQUEST['id'];
    
    require_once '../classes/connexio.php';
    $bd = new connexio();
    $bd->query("DELETE from usuaris WHERE id=$id");
    $bd->close();
     header('Location: index2.php');