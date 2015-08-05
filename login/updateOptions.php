<?php
    $id = $_REQUEST['id'];
    $ln = $_REQUEST['ln'];
    $p = $_REQUEST['p'];
    require_once '../classes/connexio.php';
    $bd=new connexio();
    
    switch($p) {
      case "0":
        $bd->query("UPDATE videos SET lletranegra='$ln',pastillablanca='0',pastillanegra='0' WHERE id=$id");
        break;
      case "1":
        $bd->query("UPDATE videos SET lletranegra='$ln',pastillablanca='1',pastillanegra='0' WHERE id=$id");
        break;
      case "2":
        $bd->query("UPDATE videos SET lletranegra='$ln',pastillablanca='0',pastillanegra='1' WHERE id=$id");
        break;
    }
    $bd->query("UPDATE videos SET referit1='".utf8_decode($r)."' WHERE id=$id");
    
    $bd->close();