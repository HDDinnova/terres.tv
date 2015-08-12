<?php
$videoid = $_REQUEST['i'];
$d = $_REQUEST['d'];
require_once 'classes/connexio.php';
require_once 'classes/videos.php';
require_once './lang.php';
$v = new video();
$v->seleccionar($videoid);
$bd = new connexio;
$dades=$bd->query("SELECT nom FROM empresa LIMIT 1");
$empresa=$dades->fetch_array(MYSQLI_ASSOC);
$bd->close();
?>
<script>
    function tancar(){
        $(".desc").hide("slow",function(){
            $(".desc").remove();
        });
        $(".descexistent").hide("slow",function(){
            $(".descexistent").remove();
        });
        history.pushState('', document.title, window.location.pathname);
        document.title = "<?=$empresa['nom']?>";
    }
</script>
<div class="containervideo">
  <div class="col-md-12">
    <div class="row pull-right">
      <span class="glyphicon glyphicon-remove" onclick="tancar();"></span>
    </div><br/>
  </div>
  <div class="col-md-12 informacio">
    <div class="col-md-8 framevideo col-sm-12 col-xs-12 pull-right">
      <iframe id="video" class="ivideo" src="//player.vimeo.com/video/<?=$v->getUrl();?>?api=1&color=fff&amp;autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <div class="row">
        <div class="col-md-7 col-sm-6">
          <div class="col-md-4 col-sm-4 col-xs-4 referit"><?=$v->retornaRefTv($v->referit1());?></div>
<!--          <div class="col-md-4 col-sm-4 col-xs-4 referit"><?//=$v->retornaRefTerres($v->referit2());?></div>
          <div class="col-md-4 col-sm-4 col-xs-4 referit"><?//=$v->retornaRefGuia($v->referit3());?></div>-->
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 pull-left">
      <h2><a href="#"><strong><?=utf8_encode($v->getCategoria());?></strong></a></h2>
      <h1 class="ultralight" id="nom"><?=utf8_encode($v->getTitol())?></h1>
      <small><?=$lang['TEXT']?> <strong><a href="#"><?=utf8_encode($v->getAutor());?></a></strong></small><br/>
      <small><?=$lang['VIDEO']?> <strong><a href="#"><?=utf8_encode($v->getAutorVideo());?></a></strong></small>
      <p><?=utf8_encode($v->getDescripcio());?></p><br/>
      <div class="row blocsocial">
          <a id="fb" href="<?='http://terres.tv/index.php?u='.urlencode(str_replace(',', '',$v->getTitol())).'-'.$v->getId()?>" data-image="<?='http://'.$_SERVER['SERVER_NAME']?>/media/<?=$v->getImatge()?>" data-title="<?=$v->getTitol()?>" data-desc="<?= htmlspecialchars(substr(utf8_encode($v->getDescripcio())),0,250)?>..." class="fb_share">
            <img src="media/icon_facebook_compartir.png" alt="" width="20px" height="20px">
          </a>
        <a class="twitter-share-button social" id="twitter_btn"
           href="https://twitter.com/share"
           class="twitter-share-button"
           data-text="<?=utf8_encode($v->getTitol())?>"
           data-lang="<?=$_SESSION['lang']?>">Twittear
        </a>
        <script>
            twttr.widgets.load();
        </script>
        <!--<div class="g-plusone social" data-size="medium"></div>-->
      </div>
      <!--<script type="text/javascript">window.___gcfg = {lang: '<?=$_SESSION['lang']?>'};(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/platform.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>-->
      <h5><small>Tags</small>&nbsp;&nbsp;<?php
        $tags=explode(',',$v->getTags());
        for ($i=0;$i<count($tags);$i++) { ?>
          <a href="#" class="tag"><span class="label label-default"><?=utf8_encode($tags[$i])?></span></a>
        <?php } ?>
      </h5><hr>
      <div id="mapa" class="col-md-12 col-sm-6  pull-left"><?php echo $v->getLatitud().'-'.$v->getLongitud()?></div>
    </div>
  </div>
</div>
<script>
    var fbShareBtn = document.querySelector('.fb_share');
    fbShareBtn.addEventListener('click', function(e) {
        e.preventDefault();
        var title = fbShareBtn.getAttribute('data-title'),
            desc = fbShareBtn.getAttribute('data-desc'),
            url = fbShareBtn.getAttribute('href'),
            image = fbShareBtn.getAttribute('data-image');
        postToFeed(title, desc, url, image);

        return false;
    });
</script>