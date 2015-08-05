<?php
    ob_start();
    session_start();
    require_once '../classes/connexio.php';
    $bde = new connexio();
    $dades=$bde->query("SELECT nom FROM empresa LIMIT 1");
    $empresa=$dades->fetch_array(MYSQLI_ASSOC);
    $bde->close();
    require_once '../lang.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title><?=$empresa['nom']?> - login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="jumbotron">
    <div class="container">
      <h1><?=$empresa['nom']?></h1>
      <h2><?=$lang['LOGIN'] ?></h2>
      <?php
        if (isset($_SESSION['loginerror'])){?>
      <p style="color: red;"><?=$lang['LOGIN_ERROR']?></p>
      <?php }
      ?>
      <div class="box">
        <form method="post" action="login.php">
          <input type="text" name="correu" placeholder="Correu" required>
          <input type="password" name="pass" placeholder="Contrasenya" required>
          <button class="btn btn-default full-width" type="submit"><span class="glyphicon glyphicon-ok"></span></button>          
        </form>
      </div>
    </div>
  </div>
</body>
</html>