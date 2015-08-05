<?php
  session_start();
  ob_start();
  
  require_once '../classes/videos.php';
  
  $pro1 = $_POST['pro1'];
  $pro2 = $_POST['pro2'];
  $pro3 = $_POST['pro3'];
  $pro4 = $_POST['pro4'];
  $pro5 = $_POST['pro5'];
  $pro6 = $_POST['pro6'];
  
  $promocionar = new video();
  $promocionar->promocionar($pro1, $pro2, $pro3, $pro4, $pro5, $pro6);
  header('Location: ../login/index2.php?p=4');