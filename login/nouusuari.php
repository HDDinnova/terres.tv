<?php
  ob_start();
  session_start();
  
  include_once '../classes/usuaris.php';
  require_once '../lang.php';

  $nom = $_POST['nom'];
  $cognoms = $_POST['cognoms'];
  $correu = $_POST['correu'];
  $pass = $_POST['contrasenya'];
  $pas2 = $_POST['pas2'];
  
  if ($pass == $pas2){
    $user = new nouUsuari(utf8_decode($nom), utf8_decode($cognoms), $correu, $pass);
    $id = $user->crear();
    if ($id>0){
      $_SESSION['terresid'] = $id;
      header("Location: //$_SERVER[HTTP_HOST]/login/index2.php#usuaris");
    } else {
      echo $lang['USER_CREATE_ERROR'];
    }    
  } else {
      echo $lang['PASSWORD_MISMATCH'];
  }
  