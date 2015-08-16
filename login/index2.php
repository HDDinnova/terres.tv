<?php
    ob_start();
    session_start();
    require_once '../classes/connexio.php';
    $bde = new connexio();
    $dades=$bde->query("SELECT nom FROM empresa LIMIT 1");
    $empresa=$dades->fetch_array(MYSQLI_ASSOC);
    $bde->close();
  if (isset($_SESSION['id'])){
      require_once '../lang.php';
      $p=$_REQUEST['p'];
?>
<!DOCTYPE html>
<html>
<head>
  <title><?=$empresa['nom']?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){ 
        $("#pe a").click(function(e){
            e.preventDefault();
            $(this).tab('show');
        });
        $("ul li:nth-child(<?=$p?>)").addClass(" active");
        $("#contingut div:nth-child(<?=$p?>)").addClass(" active");
    });
    
    //Previsulització imatge
    $(document).on('click', '#close-preview', function(){ 
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
               $('.image-preview').popover('show');
            }, 
             function () {
               $('.image-preview').popover('hide');
            }
        );    
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;'
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger:'manual',
            html:true,
            title: "<strong><?=$lang['PREVIEW']?></strong>"+$(closebtn)[0].outerHTML,
            content: "<?=$lang['NO_IMAGE']?>",
            placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function(){
            $('.image-preview').attr("data-content","").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("<?=$lang['BROWSE']?>"); 
        }); 
        // Create the preview image
        $(".image-preview-input input:file").change(function (){     
            var img = $('<img/>', {
                id: 'dynamic',
                width:250,
                height:200
            });      
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("<?=$lang['CHANGE']?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);            
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            };        
            reader.readAsDataURL(file);
        });  
    });
    
    function substituir() {
        var text = document.getElementById("descripcio").value;
        text = text.replace(/(?:\r\n|\r|\n)/g, '<br />');
        document.getElementById("descripcio").value = text;
    }
  </script>
</head>
<body>
  <div class="container-fluid">
    <ul class="nav nav-tabs" id="pe">
      <li><a href="#home" data-toggle="tab"><?=$lang['HOME']?></a></li>
      <li><a href="#insertar" data-toggle="tab"><?=$lang['INSERT_VIDEO']?></a></li>
      <li><a href="#modificar" data-toggle="tab"><?=$lang['EDIT_VIDEO']?></a></li>
      <li><a href="#promocionar" data-toggle="tab"><?=$lang['PROMOTE']?></a></li>
      <li><a href="#usuaris" data-toggle="tab"><?=$lang['MANAGE_USERS']?></a></li>
      <li><a href="#categories" data-toggle="tab"><?=$lang['MANAGE_CATEGORY']?></a></li>
      <li><a href="#territoris" data-toggle="tab"><?=$lang['MANAGE_TERRITORY']?></a></li>
      <li><a href="#newsletter" data-toggle="tab">Newsletter</a></li>
    </ul>
    <div id="contingut" class="tab-content">
        <div id="home" class="tab-pane col-md-12">
          <?php
          include_once '../classes/connexio.php';
          $bd = new connexio();
          $dades = $bd->query("SELECT * FROM empresa WHERE id=1");
          $empresa = $dades->fetch_array(MYSQLI_ASSOC);?>
          <img class="img-responsive imgprincipal center-block" src="../media/<?=$empresa['logo']?>" alt="Logo empresa"/>
      </div>
      <div class="tab-pane col-md-6 col-md-offset-3" id="insertar">
          <form id="fnouvideo" class="form" method="post" enctype="multipart/form-data" accept-charset="UTF-8" action="insertavideo.php">
          <input type="text" class="form-control" name="url" placeholder="<?=$lang['URL']?>">
          <input type="text" class="form-control" name="titol" placeholder="<?=$lang['TITLE']?>">
          <select class="form-control" name="categoria" placeholder="<?=$lang['CATEGORY']?>">
          <?php
          $categories = $bd->query("SELECT * FROM categoria");
          while ($cat = $categories->fetch_array(MYSQLI_ASSOC)){ ?>
          <option value="<?=$cat['id']?>"><?=utf8_encode($cat['categoria'])?></option>
          <?php } ?>
          </select>
          <select class="form-control" name="territori" placeholder="<?=$lang['TERRITORY']?>">
          <?php
          $territoris = $bd->query("SELECT * FROM territori");
          while ($ter = $territoris->fetch_array(MYSQLI_ASSOC)){ ?>
          <option value="<?=$ter['id']?>"><?=utf8_encode($ter['territori'])?></option>
          <?php } ?>
          </select>
          <textarea class="form-control" name="descripcio" id="descripcio" form="fnouvideo" onblur="substituir()" placeholder="<?=$lang['DESCRIPTION']?>"></textarea>
          <input type="text" class="form-control" name="autor" placeholder="<?=$lang['AUTHOR']?>">
          <input type="text" class="form-control" name="autorvideo" placeholder="<?=$lang['VIDEO_AUTHOR']?>">
          <div class="date input-group" id="datetimepicker" data-date-format="DD-MM-YYYY">
            <input name="data" id="data" type="text" class="form-control" disabled>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
          <script type="text/javascript">
              $(function () {
                  $('#datetimepicker').datetimepicker({
                      pickTime: false,
                      language: '<?=$_COOKIE['idioma']?>'
                  });
              });
            </script>
          <input type="text" class="form-control" name="tags" placeholder="<?=$lang['TAGS']?>">
          <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
            <span class="input-group-btn">
                <!-- image-preview-clear button -->
                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                    <span class="glyphicon glyphicon-remove"></span> <?=$lang['DELETE']?>
                </button>
                <!-- image-preview-input -->
                <div class="btn btn-default image-preview-input">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <span class="image-preview-input-title"><?=$lang['SEARCH']?></span>
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="imatge"/> <!-- rename it -->
                </div>
            </span>
          </div>
          <select class="form-control" name="ref1" placeholder="<?=$lang['REF1']?>">
          <?php
          $refterres = $bd->query("SELECT id,titol FROM videos ORDER BY titol ASC");
          while ($rtv = $refterres->fetch_array(MYSQLI_ASSOC)){ ?>
            <option value="<?=$rtv['id']?>"><?=utf8_encode($rtv['titol'])?></option>
          <?php } ?>    
          </select>
          <input type="text" class="form-control" name="latitut" placeholder="<?=$lang['LAT']?>">
          <input type="text" class="form-control" name="longitut" placeholder="<?=$lang['LON']?>">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="ln" value="1">
              <?=$lang['BLACK_TEXT']?>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="pastilla" id="Radio1" value="0" checked>
              <?=$lang['NO_PILL']?>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="pastilla" id="Radio2" value="1">
              <?=$lang['WHITE_PILL']?>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="pastilla" id="Radio3" value="2">
              <?=$lang['BLACK_PILL']?>
            </label>
          </div>
          <button type="submit" class="btn btn-info center-block"><?=$lang['INSERT_VIDEO']?></button>
        </form>
      </div>
      <div class="tab-pane col-md-8 col-md-offset-2" id="modificar">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th><?=$lang['TITLE']?></th>
              <th><?=$lang['IMAGE']?></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once '../classes/videos.php';
            $videos = new video();
            $videos->llistar();
            ?>
          </tbody>
        </table>
      </div>
        <div class="tab-pane col-md-8 col-md-offset-2" id="promocionar">
            <form class="form-horizontal" method="post" action="promocionar.php">
                <div class="form-group">
                    <label for="pro1" class="col-md-2 control-label col-md-offset-3"><?=$lang['PRO1']?></label>
                    <div class="col-md-3">
                        <select class="form-control" id="pro1" name="pro1">
                            <option value=""></option>
                        <?php
                        $prom = $bd->query("SELECT id,titol FROM videos ORDER BY id DESC");
                        while ($p = $prom->fetch_array(MYSQLI_ASSOC)){ ?>
                            <option value="<?=$p['id']?>"><?=utf8_encode($p['titol'])?></option>
                        <?php } ?>    
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pro2" class="col-md-2 control-label col-md-offset-3"><?=$lang['PRO2']?></label>
                    <div class="col-md-3">
                        <select class="form-control" id="pro2" name="pro2">
                            <option value=""></option>
                        <?php
                        $prom = $bd->query("SELECT id,titol FROM videos ORDER BY id DESC");
                        while ($p = $prom->fetch_array(MYSQLI_ASSOC)){ ?>
                            <option value="<?=$p['id']?>"><?=utf8_encode($p['titol'])?></option>
                        <?php } ?>    
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pro3" class="col-md-2 control-label col-md-offset-3"><?=$lang['PRO3']?></label>
                    <div class="col-md-3">
                        <select class="form-control" id="pro3" name="pro3">
                            <option value=""></option>
                        <?php
                        $prom = $bd->query("SELECT id,titol FROM videos ORDER BY id DESC");
                        while ($p = $prom->fetch_array(MYSQLI_ASSOC)){ ?>
                            <option value="<?=$p['id']?>"><?=utf8_encode($p['titol'])?></option>
                        <?php } ?>    
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pro4" class="col-md-2 control-label col-md-offset-3"><?=$lang['PRO4']?></label>
                    <div class="col-md-3">
                        <select class="form-control" id="pro4" name="pro4">
                            <option value=""></option>
                        <?php
                        $prom = $bd->query("SELECT id,titol FROM videos ORDER BY id DESC");
                        while ($p = $prom->fetch_array(MYSQLI_ASSOC)){ ?>
                            <option value="<?=$p['id']?>"><?=utf8_encode($p['titol'])?></option>
                        <?php } ?>    
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pro5" class="col-md-2 control-label col-md-offset-3"><?=$lang['PRO5']?></label>
                    <div class="col-md-3">
                        <select class="form-control" id="pro5" name="pro5">
                            <option value=""></option>
                        <?php
                        $prom = $bd->query("SELECT id,titol FROM videos ORDER BY id DESC");
                        while ($p = $prom->fetch_array(MYSQLI_ASSOC)){ ?>
                            <option value="<?=$p['id']?>"><?=utf8_encode($p['titol'])?></option>
                        <?php } ?>    
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pro6" class="col-md-2 control-label col-md-offset-3"><?=$lang['PRO6']?></label>
                    <div class="col-md-3">
                        <select class="form-control" id="pro6" name="pro6">
                            <option value=""></option>
                        <?php
                        $prom = $bd->query("SELECT id,titol FROM videos ORDER BY id DESC");
                        while ($p = $prom->fetch_array(MYSQLI_ASSOC)){ ?>
                            <option value="<?=$p['id']?>"><?=utf8_encode($p['titol'])?></option>
                        <?php } ?>    
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info center-block"><?=$lang['SAVE']?></button>
            </form>
        </div>
      <div class="tab-pane col-md-8 col-md-offset-2" id="usuaris">
          <br>
          <div class="col-md-8" id="newuser">
              <form class="form-horizontal" method="post" action="nouusuari.php">
                <div class="form-group">
                    <label for="nom" class="col-md-2 control-label col-md-offset-2"><?=$lang['NAME']?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cognoms" class="col-md-2 control-label col-md-offset-2"><?=$lang['SURNAME']?></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="cognoms" name="cognoms" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="correu" class="col-md-2 control-label col-md-offset-2"><?=$lang['EMAIL']?></label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" id="correu" name="correu" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contrasenya" class="col-md-2 control-label col-md-offset-2"><?=$lang['PASSWORD']?></label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" id="correu" name="contrasenya" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pas2" class="col-md-2 control-label col-md-offset-2"><?=$lang['PASSWORD_CONFIRM']?></label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" id="correu" name="pas2" required>
                    </div>
                </div>
                  <button type="submit" class="btn btn-success"><?=$lang['CREATE_USER']?></button>
              </form>
          </div>
          <br>
          <hr class="divider">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th><?=$lang['NAME']?></th>
              <th><?=$lang['EMAIL']?></th>
              <th></th><th></th>
            </tr>
          </thead>
          <tbody>
            <?php include_once '../classes/usuaris.php';
            $usuari = new usuari();
            $usuari->llistar();
            ?>
          </tbody>
        </table>
      </div>
        <?php $bd->close() ?>
        <div class="tab-pane col-md-6 col-md-offset-3" id="categories">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th><?=$lang['CATEGORY']?></th>
                    <th></th><th></th>
                  </tr>
                </thead>
                <tbody id="llistatcat">
                    <?php include_once '../classes/categories.php';
                    $categoria = new categories();
                    $categoria->llistar();
                    ?>
                    <tr>
                        <td></td>
                        <td><input type="text" class="form-control" name="categoria" id="categoria" placeholder="<?=$lang['NEW_CATEGORY']?>"></td>
                        <td><button type="button" class="btn btn-success btn-xs" onclick="insertcat();"><span class="glyphicon glyphicon-plus"></span> <?=$lang['INSERT']?></button></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <script>
                function insertcat() {
                    var newcat = document.getElementById("categoria").value;
                    if (newcat != ""){
                        if (window.XMLHttpRequest) {
                            xmlhttpcat=new XMLHttpRequest();
                        } else {
                            xmlhttpcat=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttpcat.onreadystatechange=function() {
                            if (xmlhttpcat.readyState===4 && xmlhttpcat.status===200){
                                document.getElementById("llistatcat").innerHTML = xmlhttpcat.responseText;
                            }
                        };
                        xmlhttpcat.open("GET","insertcat.php?c="+newcat,true);
                        xmlhttpcat.send();
                        
                    }
                }
            </script>
        </div>
        <div class="tab-pane col-md-6 col-md-offset-3" id="territoris">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th><?=$lang['TERRITORY']?></th>
                    <th></th><th></th>
                  </tr>
                </thead>
                <tbody id="llistatter">
                    <?php include_once '../classes/territoris.php';
                    $territoris = new territoris();
                    $territoris->llistar();
                    ?>
                    <tr>
                        <td></td>
                        <td><input type="text" class="form-control" name="territori" id="territori" placeholder="<?=$lang['NEW_TERRITORY']?>"></td>
                        <td><button type="button" class="btn btn-success btn-xs" onclick="insertter();"><span class="glyphicon glyphicon-plus"></span> <?=$lang['INSERT']?></button></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <script>
                function insertter() {
                    var newter = document.getElementById("territori").value;
                    if (newter != ""){
                        if (window.XMLHttpRequest) {
                            xmlhttpter=new XMLHttpRequest();
                        } else {
                            xmlhttpter=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttpter.onreadystatechange=function() {
                            if (xmlhttpter.readyState===4 && xmlhttpter.status===200){
                                document.getElementById("llistatter").innerHTML = xmlhttpter.responseText;
                            }
                        };
                        xmlhttpter.open("GET","insertter.php?t="+newter,true);
                        xmlhttpter.send();
                        
                    }
                }
            </script>
        </div>
        <div class="tab-pane col-md-6 col-md-offset-3" id="newsletter">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Cognoms</th>
                        <th>Correu</th>
                    </tr>
                </thead>
                <tbody>
                  <?php include_once '../classes/newsletter.php';
                  $news = new newsletter();
                  $news->llistar();
                  ?>
                </tbody>
            </table>
        </div>
    </div>  
  </div>
  <script src="js/moment.js" type="text/javascript"></script>
  <script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <script src="js/bootstrap-datetimepicker.ca.js" type="text/javascript"></script>
</body>
</html>
<?php } else {
   echo '<h1 style="color:red;">'.$lang['NO_LOGIN'].'</h1>';
}