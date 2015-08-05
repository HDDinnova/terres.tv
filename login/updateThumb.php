<?php
  $thumb= $_FILES['imatge']['name'];
  $thumbtemp=$_FILES['imatge']['tmp_name'];  
  $arxiu = $_SERVER['DOCUMENT_ROOT'].'/media/'.$thumb;
  $id = $_REQUEST['id'];
  
  if (move_uploaded_file($thumbtemp, $arxiu)) {
    require_once '../classes/connexio.php';
    $bd=new connexio();
    $bd->query("UPDATE videos SET imatge='$thumb' WHERE id=$id");
    $bd->close();
    echo 'OK';
    header("Location: //$_SERVER[HTTP_HOST]/login/editvideo.php?id=$id");
  } else {
      echo 'Error';
  }