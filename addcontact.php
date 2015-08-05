<?php
$nom = filter_input(INPUT_POST, 'nom');
$cognoms = filter_input(INPUT_POST, 'cognoms');
$correu = filter_input(INPUT_POST, 'correu');
$g = filter_input(INPUT_POST, 'g-recaptcha-response');

$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfcYgoTAAAAAFbmB7_XbispuYUU6_-ivRyIC5Yq&response=".$g."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
if($response['success'] == false)
{
  echo '<h2>You are spammer ! Get the @$%K out</h2>';
}
else
{
    require_once 'classes/newsletter.php';
    $u = new newsletter();
    if ($u->afegir(utf8_decode($nom), utf8_decode($cognoms), $correu, $_SERVER['REMOTE_ADDR'])!=0){
        header('Location: felicitats.php');
    } else {
        echo "Fallo";
    }
    
}
