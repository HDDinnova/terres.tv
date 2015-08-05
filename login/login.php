<?php
  ob_start();
  session_start();
  
  include_once '../classes/usuaris.php';

  $usuari = $_POST['correu'];
  $pass = $_POST['pass'];
  
  $user = new usuari();
  $id = $user->login($usuari, $pass);
  if ($id>0) {
    $_SESSION['id'] = $id;
    header('Location: index2.php?p=1');
  } else {
    $_SESSION['loginerror']=1;
    header('Location: index.php');
  }