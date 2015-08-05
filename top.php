<!-- Static navbar -->
<?php $bde = new connexio();
$dades=$bde->query("SELECT nom FROM empresa LIMIT 1");
$empresa=$dades->fetch_array(MYSQLI_ASSOC);
$bde->close();
?>
<div class="navbar navbar-default navbar-static-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://terres.tv"><strong><?=$empresa['nom']?></strong></a>
    </div>
  <div class="collapse navbar-collapse" id="collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="socialicon"><a href="https://www.facebook.com/terrestv" target="_blank"><img src="media/facebook.png" alt="logo facebook"/></a></li>
      <li class="socialicon"><a href="https://twitter.com/terrestv" target="_blank"><img src="media/twitter.png" alt="logo twitter"/></a></li>
      <li><a href="newsletter.php">newsletter</a></li>
    </ul>
      
  </div>
</div>