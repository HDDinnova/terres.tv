<?php
    ob_start();
    session_start();
    include_once 'classes/connexio.php';
    $bd = new connexio();
    $dades=$bd->query("SELECT nom FROM empresa LIMIT 1");
    $empresa=$dades->fetch_array(MYSQLI_ASSOC);
    require_once './lang.php';
?>
<!DOCTYPE html>
<head>
  <title><?=$empresa['nom']?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <META NAME="Description" CONTENT="Portal de vídeos de natura, gastronomia, paisatge, festes, tradició, cuina...">
  <META NAME="Language" CONTENT="ca">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
  <META NAME="Copyright" CONTENT="terres.tv">
  <META NAME="Designer" CONTENT="terres.tv">
  <META NAME="Publisher" CONTENT="terres.tv">
  <META NAME="distribution" CONTENT="Global">
  <META NAME="Robots" CONTENT="INDEX,FOLLOW">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="css/newsletter.css" rel="stylesheet" type="text/css"/>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <?php  include 'top.php';?>
  <div class="container-fluid" id="newsletter">
      <div class="reg-text">
          <h3>Registra't a la nostra <strong>newsletter</strong></h3>
          <p>per estar informat de totes les novetats de <strong><i>terres.tv</i></strong></p>
      </div>
      <div class="divider"></div>
      <form class="form" role="form" method="post"  action="addcontact.php">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input name="nom" class="form-control" type="text" placeholder="Introdueix el teu nom" required>
          </div>
          <div class="form-group">
            <label for="cognoms">Cognoms</label>
            <input name="cognoms" class="form-control" type="text" placeholder="Introdueix els teus cognoms" required>
          </div>
          <div class="form-group">
            <label for="correu">E-mail</label>
            <input name="correu" class="form-control" type="email" placeholder="Introdueix el correu" required>
          </div>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="6LfcYgoTAAAAAPoYfF22tgWriGE_tsgqF6Mqt6l1"></div>
          </div>
          <input type="submit" class="btn btn-default">
      </form>
  </div>
  <div id="footer"></div>
  <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
</body>
</html>
<?php $bd->close();


