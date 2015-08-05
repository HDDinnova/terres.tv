<?php
    ob_start();
    session_start();
    include_once 'classes/connexio.php';
    $bd = new connexio();
    $dades=$bd->query("SELECT nom FROM empresa LIMIT 1");
    $empresa=$dades->fetch_array(MYSQLI_ASSOC);
    require_once './lang.php';
    $url=$_REQUEST['u'];
?>
<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
  <title><?=$empresa['nom']?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <META NAME="Description" CONTENT="terres és una finestra curiosa i discreta, oberta permanentment al goig de viure">
  <meta name="keywords" content="terres,ebre,delta,natura,gastronomia,riu,vida,video,imatge,fotos,gaudir,catalunya,sud,cat,reserva,biosfera,turisme">
  <meta property="og:url" content="http://terres.tv" />
  <meta property="og:title" content="terres.tv" />
  <meta property="og:description" content="terres és una finestra curiosa i discreta, oberta permanentment al goig de viure" />
  <META NAME="Language" CONTENT="ca">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
  <META NAME="Copyright" CONTENT="terres.tv">
  <META NAME="Designer" CONTENT="terres.tv">
  <META NAME="Publisher" CONTENT="terres.tv">
  <META NAME="distribution" CONTENT="Global">
  <META NAME="Robots" CONTENT="INDEX,FOLLOW">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="/mstile-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA"></script>
  <script src="js/scripts.js" type="text/javascript"></script>
  <!-- Google Analytics -->
            <!--  <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-29007063-1', 'terresmagazine.com');
                ga('send', 'pageview');
              </script>-->
  <!-- End Google Analytics -->
</head>
<body>
  <div id="fb-root"></div>
  <script>
//      (function(d, s, id) {
//        var js, fjs = d.getElementsByTagName(s)[0];
//        if (d.getElementById(id)) return;
//        js = d.createElement(s); js.id = id;
//        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
//        fjs.parentNode.insertBefore(js, fjs);
//      }(document, 'script', 'facebook-jssdk'));
        window.fbAsyncInit = function() {
            FB.init({
                appId: '372348169602703',
                status: true,
                cookie: true,
                xfbml: true
            });
        };

        (function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];if   (d.getElementById(id)) {return;}js = d.createElement('script'); js.id = id; js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));

        function postToFeed(title, desc, url, image) {
            var obj = {method: 'feed',link: url, picture: image,name: title,description: desc};
            function callback(response) {}
            FB.ui(obj, callback);
        }

        
  </script>
  <?php  include 'top.php';?>
  <div class="container-fluid" id="cos">
  <?php include 'elements.php'; include 'buclevideo.php'; ?>
  </div>
  <div id="footer"></div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      redimensionaFotos();
    });
    $(window).scroll(function() {
     if($(window).scrollTop() + $(window).height() === $(document).height()) {
        if (window.XMLHttpRequest) {
          mesvideos=new XMLHttpRequest();
        } else {
          mesvideos=new ActiveXObject("Microsoft.XMLHTTP");
        }
        mesvideos.onreadystatechange=function() {
          if (mesvideos.readyState===4 && mesvideos.status===200){
            $(".container-fluid").append(mesvideos.responseText);
            redimensionaFotos();
          }
        };
        mesvideos.open("GET","addvideos.php",true);
        mesvideos.send();
     }
    });
    window.onresize=function(){
        redimensionaVideo();
        redimensionaFotos();
    };
  </script>
</body>
<?php
if ($url!=""){
    $var = explode('-', $url);
    $id = $var[count($var)-1];
    if (!is_numeric($id)) {
        $id = substr($id,0,strpos($id,';'));
    }?>
<script>
    mostrar(0,<?=$id?>);
    redimensionaVideo();
</script>
<?php } ?>
</html>
<?php $bd->close();


