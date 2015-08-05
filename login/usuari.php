<html>
<head>
  <title>terres.tv</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <form method="post" action="nouusuari.php">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required autofocus>
    <label for="cognoms">Cognoms</label>
    <input type="text" name="cognoms" id="cognoms" required>
    <label for="correu">Correu electrònic</label>
    <input type="text" name="correu" id="correu" required>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" required>
    <input type="submit" value="enviar">
  </form>
</body>
</html>