<?php
$_SESSION['j']=0; 
$elements = array();
$vp = $bd->query("SELECT video FROM promocionats");
while ($videospromocionats = $vp->fetch_array(MYSQLI_ASSOC)){
    $elements[]=$videospromocionats['video'];
}
$v = $bd->query("SELECT id,imatge FROM videos WHERE ID NOT IN (SELECT video FROM promocionats) ORDER BY imatge DESC");
while ($video = $v->fetch_array(MYSQLI_ASSOC)){
    $elements[]=$video['id'];
}