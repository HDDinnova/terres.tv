<?php
include_once 'classes/videos.php';
$v = new video();
$i=1;
if (count($elements)>9){
    $limit=9;
} else {
    $limit = count($elements);
}
for ($r=0;$r<$limit;$r++){
  $v->seleccionar($elements[$r]);
  if ($i==1||$i==4||$i==7){$_SESSION['j']++; ?> <div id="row<?=$_SESSION['j']?>"><?php }
  if ($i==7){?><div class="col-md-4 "><?php } ?>

    <div class="video <?php
    if($i==7 || $i==8){
        echo'col-md-12 petit';
    } if ($i==1 || $i==9){
        echo'col-md-8 gran';
    }if ($i==2 || $i==3 || $i==4 || $i==5 || $i==6){
        echo'col-md-4 petit';
    } if ($i==1 || $i==4 || $i==7){
        echo ' col-xs-12 col-sm-12 mobilgran';
    }else{
        echo ' col-xs-6 col-sm-6 mobilpetit';
    }?>">
      <a href="javascript: mostrar(<?=$_SESSION['j']?>,<?=$v->getId()?>)">
        <img src="media/<?=$v->getImatge()?>"/>
        <div class="pastilla<?php
            if($v->getPastillaBlanca()){
                echo ' pastillablanca';
            }elseif($v->getPastillaNegra()){
                echo ' pastillanegra';
            }if($v->getLletraNegra()){
                echo ' textnegre';
            }?>">
            <script>console.log(<?=$v->getLletraNegra()?>);</script>
        <h2><strong><?=$v->getCategoria()?></strong></h2>
        <h1 class="ultralight"><?=utf8_encode($v->getTitol())?></h1><br>
      </div>
      <span class="glyphicon glyphicon-play"></span>
    </a>
    <?php
    if ($i==8){?></div><?php } ?>
  </div>
<?php if ($i==3||$i==6||$i==9){?> </div><?php }
$i++; if ($i==10){$i=1;}}
for($r=0;$r<9 && count($elements)>0;$r++){
    $a=array_shift($elements);
}
$_SESSION['videos']=$elements;