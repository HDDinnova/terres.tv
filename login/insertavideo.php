<?php
  session_start();
  ob_start();
  
  require_once '../classes/videos.php';
  
  $url = $_POST['url'];
  $titol = $_POST['titol'];
  $cat = $_POST['categoria'];
  $ter = $_POST['territori'];
  $des = $_POST['descripcio'];
  $autor = $_POST['autor'];
  $autorvideo = $_POST['autorvideo'];
  $data = $_POST['data'];
  $tags = $_POST['tags'];
  $ref1 = $_POST['ref1'];
  $ref2 = $_POST['ref2'];
  $ref3 = $_POST['ref3'];
  $lat = $_POST['latitut'];
  $lon = $_POST['longitut']; 
  $ln = $_POST['ln'];
  $pastilla = $_POST['pastilla'];
  $thumb= $_FILES['imatge']['name'];
  $thumbtemp=$_FILES['imatge']['tmp_name'];
  $arxiu = $_SERVER['DOCUMENT_ROOT'].'/media/'.$thumb;
  
  //$novadata = new DateTime($data);
  
  if (move_uploaded_file($thumbtemp, $arxiu)) {
	$video = new nouVideo($url, utf8_decode(addslashes($titol)), $cat, $ter, utf8_decode(addslashes($des)), utf8_decode($autor), utf8_decode($autorvideo),$data, $thumb, utf8_decode(addslashes($tags)), $ref1, $ref2, $ref3, $lat, $lon);
    if ($ln==1){
      $video->setLletraNegra();
    }
    if ($pastilla==1){
      $video->setPastillaBlanca();
    } elseif ($pastilla==2) {
      $video->setPastillaNegra();
    }
    $video->insertar();
  } else {
    echo 'error amb la foto, potser es massa gran';
  }