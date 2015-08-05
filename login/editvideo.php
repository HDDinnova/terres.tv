<?php
ob_start();
  session_start();
  require_once '../classes/connexio.php';
  require_once '../classes/videos.php';
  if (isset($_SESSION['id'])){
    $id = $_REQUEST['id'];
    $bd = new connexio();
    $dades=$bd->query("SELECT nom FROM empresa LIMIT 1");
    $empresa=$dades->fetch_array(MYSQLI_ASSOC);
    $v = new video();
    $v->seleccionar($id);
    require_once '../lang.php';
    ?>
<!DOCTYPE html>
<html>
<head>
  <title><?=$empresa['nom']?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="js/scripts.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      $('input[name="url"]').val("<?php echo utf8_encode($v->getUrl())?>");
      $('input[name="titol"]').val("<?php echo htmlspecialchars(utf8_encode($v->getTitol()));?>");
      $('textarea#descripcio').html("<?php echo htmlspecialchars(utf8_encode($v->getDescripcio()));?>");
      $('input[name="data"]').val("<?php echo utf8_encode($v->getData());?>");
      $('input[name="tags"]').val("<?php echo utf8_encode($v->getTags());?>");
      $('input[name="autor"]').val("<?php echo utf8_encode($v->getAutor());?>");
      $('input[name="autorvideo"]').val("<?php echo utf8_encode($v->getAutorVideo());?>");
      $('select[name="ref1"]').val("<?php echo utf8_encode($v->referit1());?>");
      $('input[name="lat"]').val("<?php echo $v->getLatitud();?>");
      $('input[name="lon"]').val("<?php echo $v->getLongitud();?>");
      $('input[name="ln"]').attr('checked', <?php if($v->getLletraNegra()==0){echo 'false';}else{echo 'true';}?>);
      <?php
      if ($v->getPastillaBlanca()==1) { ?>
        $('#Radio2').attr("checked",true);
      <?php } elseif ($v->getPastillaNegra()==1) { ?>
        $('#Radio3').attr("checked",true);
      <?php } else { ?>
        $('#Radio1').attr("checked",true);
      <?php } ?>
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
  </script>
  </head>
<body>
  <div class="container-fluid">
    <div class="col-md-8 col-md-offset-2" id="insertar">
      <form id="fnouvideo" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="updateThumb.php?id=<?=$id?>">
            <div class="form-group">
                <label for="url" class="col-md-2 control-label"><?=$lang['URL']?></label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="url" name="url" placeholder="<?=$lang['URL']?>" disabled>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateUrl();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="burl" onclick="updateUrl(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="titol" class="col-md-2 control-label"><?=$lang['TITLE']?></label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="titol" name="titol" placeholder="<?=$lang['TITLE']?>" disabled>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateTitle();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="btitle" onclick="updateTitle(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
             <div class="form-group">
                <label for="categoria" class="col-md-2 control-label"><?=$lang['CATEGORY']?></label>
                <div class="col-md-9">
                  <select class="form-control" id="categoria" name="categoria" placeholder="<?=$lang['CATEGORY']?>" disabled>
                    <?php
                    $categories = $bd->query("SELECT * FROM categoria");
                    while ($cat = $categories->fetch_array(MYSQLI_ASSOC)){ ?>
                    <option value="<?=$cat['id']?>"><?=$cat['categoria']?></option> <?php } ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateCategory();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="bcat" onclick="updateCategory(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="territori" class="col-md-2 control-label"><?=$lang['TERRITORY']?></label>
                <div class="col-md-9">
                  <select class="form-control" id="territori" name="territori" placeholder="<?=$lang['TERRITORY']?>" disabled>
                    <?php
                    $territoris = $bd->query("SELECT * FROM territori");
                    while ($ter = $territoris->fetch_array(MYSQLI_ASSOC)){ ?>
                    <option value="<?=$ter['id']?>"><?=$ter['territori']?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateTerritory();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="bter" onclick="updateTerritory(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="descripcio" class="col-md-2 control-label"><?=$lang['DESCRIPTION']?></label>
                <div class="col-md-9">
                    <textarea class="form-control" rows="4" id="descripcio" name="descripcio" form="fnouvideo" disabled placeholder="<?=$lang['DESCRIPTION']?>"></textarea>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateDescription();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="bdesc" onclick="updateDescription(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="autor" class="col-md-2 control-label"><?=$lang['AUTHOR']?></label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="autor" name="autor" placeholder="<?=$lang['AUTHOR']?>" disabled>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateAuthor();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="bauthor" onclick="updateAuthor(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="autorvideo" class="col-md-2 control-label"><?=$lang['VIDEO_AUTHOR']?></label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="autorvideo" name="autorvideo" placeholder="<?=$lang['VIDEO_AUTHOR']?>" disabled>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateAuthorVideo();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="bauthorvideo" onclick="updateAuthorVideo(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="data" class="col-md-2 control-label"><?=$lang['DATE']?></label>
                <div class="col-md-9">
                    <div class="date input-group" id="datetimepicker5" data-date-format="DD-MM-YYYY">
                      <input name="data" id="data" type="text" class="form-control" disabled>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker5').datetimepicker({
                                pickTime: false,
                                language: '<?=$_COOKIE['idioma']?>'
                            });
                        });
                      </script>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateDate();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="bdate" onclick="updateDate(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-md-2 control-label"><?=$lang['TAGS']?></label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="tags" name="tags" placeholder="<?=$lang['TAGS']?>" disabled>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateTags();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="btags" onclick="updateTags(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="thumbnail" class="col-md-2 control-label"><?=$lang['THUMBNAIL']?></label>
                <div class="col-md-9">
                    <div class="input-group image-preview">
                      <input id="thumb" type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                      <span class="input-group-btn">
                          <!-- image-preview-clear button -->
                          <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                              <span class="glyphicon glyphicon-remove"></span> <?=$lang['DELETE']?>
                          </button>
                          <!-- image-preview-input -->
                          <div class="btn btn-default image-preview-input">
                              <span class="glyphicon glyphicon-folder-open"></span>
                              <span class="image-preview-input-title"><?=$lang['SEARCH']?></span>
                              <input type="file" accept="image/png, image/jpeg, image/gif" name="imatge" onclick="activateThumb();"/>
                          </div>
                      </span>
                    </div>
                </div>
                <div class="col-md-1">
                  <button class="btn btn-sm btn-info disabled" id="bthumb" type="submit"><span class="glyphicon glyphicon-check"></span></button>
                </div>
            </div>
            <div class="form-group">
                <label for="ref1" class="col-md-2 control-label"><?=$lang['REF1']?></label>
                <div class="col-md-9">
                    <select class="form-control" id="ref1" name="ref1" placeholder="<?=$lang['REF1']?>" disabled="">
                    <?php
                    $refterres = $bd->query("SELECT id,titol FROM videos ORDER BY titol ASC");
                    while ($rtv = $refterres->fetch_array(MYSQLI_ASSOC)){ ?>
                      <option value="<?=$rtv['id']?>"><?=utf8_encode($rtv['titol'])?></option>
                    <?php } ?>    
                    </select>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateRef1();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="bref1" onclick="updateRef1(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="lat" class="col-md-2 control-label"><?=$lang['LAT']?></label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="lat" name="lat" placeholder="<?=$lang['LAT']?>" disabled>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateLat();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="blat" onclick="updateLat(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label for="lon" class="col-md-2 control-label"><?=$lang['LON']?></label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="lon" name="lon" placeholder="<?=$lang['LON']?>" disabled>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateLon();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="blon" onclick="updateLon(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><?=$lang['DESIGN_OPTIONS']?></label>
                <div class="col-md-9">
                  <div class="checkbox disabled" id="checkbox">
                      <label>
                        <input type="checkbox" id="ln" name="ln" value="1" disabled>
                        <?=$lang['BLACK_TEXT']?>
                      </label>
                    </div>
                  <div class="radio disabled" id="radio1">
                      <label>
                        <input type="radio" name="pastilla" id="Radio1" value="0" checked disabled>
                        <?=$lang['NO_PILL']?>
                      </label>
                    </div>
                    <div class="radio disabled" id="radio2">
                      <label>
                        <input type="radio" name="pastilla" id="Radio2" value="1" disabled>
                        <?=$lang['WHITE_PILL']?>
                      </label>
                    </div>
                    <div class="radio disabled" id="radio3">
                      <label>
                        <input type="radio" name="pastilla" id="Radio3" value="2" disabled>
                        <?=$lang['BLACK_PILL']?>
                      </label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-success" onclick="activateOptions();"><span class="glyphicon glyphicon-pencil"></span></div>
                    <div class="btn btn-sm btn-info disabled" id="boptions" onclick="updateOptions(<?=$id?>);"><span class="glyphicon glyphicon-check"></span></div>
                </div>
            </div>
        </form>
        <button type="button" class="btn btn-info center-block" onclick="javascript: window.location.assign('./index2.php?p=3')">Tornar</button><br/>
      </div>
  </div>
  <?php $bd->close() ?>
  <script src="js/moment.js" type="text/javascript"></script>
  <script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <script src="js/bootstrap-datetimepicker.ca.js" type="text/javascript"></script>
</body>
</html>
<?php } else {
   echo '<h1 style="color:red;">'.$lang['NO_LOGIN'].'</h1>';
}
