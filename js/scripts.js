function mostrar(id,video) {
    $(".descexistent").remove();
    var iddiv="#desc"+id;

    if ($(".desc").is(':visible')){
      //Primer ocultem si hi ha algun div obert
      $(".desc").hide("slow",function(){
          $(".desc").remove();
          var noudiv = document.createElement("div");
          noudiv.className = "desc";
          noudiv.id = "desc"+id;
          if (id==0){
            noudiv.className = "descexistent";
            var divafegir = document.getElementById("row1");
            divafegir.parentNode.insertBefore(noudiv,divafegir);
          } else {
            var divafegir = document.getElementById("row"+id);
            divafegir.parentNode.insertBefore(noudiv,divafegir.nextSibling);
          }
          //Codi AJAX per modificar el contingut del DIV d'exhibició del video
          if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
          } else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState===4 && xmlhttp.status===200){
              $(iddiv).html(xmlhttp.responseText);
              redimensionaVideo();
              var nom = document.getElementById("nom").innerHTML.replace(/\s/gi,"-");
              var url='index.php?u='+nom+'-'+video;
              history.pushState({}, '', 'index.php?u='+nom+'-'+video);
              $("#twitter_btn").attr( "data-url" , url);
              document.title = document.getElementById("nom").innerHTML+" - terres.tv";
              reloadSocial();
              $(iddiv).show("slow",function(){
                $("body").animate({
                  scrollTop: $(iddiv).position().top
                },1000);
                dibuixaMapa();
              });
            }
          };
          if ($(".container-fluid").width()>992){
            xmlhttp.open("GET","video.php?i="+video+"&d="+id,false);
          }else{
            xmlhttp.open("GET","videom.php?i="+video+"&d="+id,false);
          }
          xmlhttp.send();
      });
    } else {
      var noudiv = document.createElement("div");
      noudiv.className = "desc";
      noudiv.id = "desc"+id;
      if (id==0){
        noudiv.className = "descexistent";
        var divafegir = document.getElementById("row1");
        divafegir.parentNode.insertBefore(noudiv,divafegir);
      } else {
        var divafegir = document.getElementById("row"+id);
        divafegir.parentNode.insertBefore(noudiv,divafegir.nextSibling);
      }
      //Codi AJAX per modificar el contingut del DIV d'exhibició del video
      if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
      } else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState===4 && xmlhttp.status===200){
          $(iddiv).html(xmlhttp.responseText);
          redimensionaVideo();
          var nom = document.getElementById("nom").innerHTML.replace(/\s/gi,"-");
          var url='index.php?u='+nom+'-'+video;
          history.pushState({}, '', 'index.php?u='+nom+'-'+video);
          $("#twitter_btn").attr( "data-url" , url);
          document.title = document.getElementById("nom").innerHTML+" - terres.tv";
          reloadSocial();
          $(iddiv).show("slow",function(){
            $("body").animate({
              scrollTop: $(iddiv).position().top
            },1000);
            dibuixaMapa();
          });
        }
      };
      if ($(".container-fluid").width()>992){
        xmlhttp.open("GET","video.php?i="+video+"&d="+id,true);
      }else{
        xmlhttp.open("GET","videom.php?i="+video+"&d="+id,true);
      }
      xmlhttp.send();
    }
}
function redimensionaVideo(){
    var div = document.getElementsByClassName("desc");
    var amplefinestra=$(div).width();
    if (amplefinestra===null) {
        var div = document.getElementsByClassName("descexistent");
        var amplefinestra=$(div).width();
    }
    if(amplefinestra!==null){
        var amplevideo=$(".framevideo").css("width");
        if (amplevideo.search("%")!==-1){
            amplevideo = amplevideo.replace("%","");
            amplevideo = ((amplefinestra*amplevideo)/100);
        }else {
            amplevideo = amplevideo.replace("px","");
        }
        $(".ivideo").css("width",amplevideo);
        if(amplefinestra<992){
            $(".ivideo").css("height",amplevideo/2.3);
        } else {
            $(".ivideo").css("height",(amplevideo/2.3)-15);
        }
    }
}
function redimensionaFotos(){
    var big = $(".col-md-8").css("width");
    big = big.replace("px","");
    big = big*0.5625;
    $(".informacio .col-md-8").css("height","auto");
    $(".informacio .col-md-4").css("height","auto");
    $(".containervideo .framevideo").css("height","auto");
    if ($(window).width()>=992){
        var petit = Math.round(big/2);
        var gran = petit*2;
        $(".gran").css("height",gran); //big
        $(".petit").css("height",petit); //big
    }
    if ($(window).width()<992 && $(window).width()>=769){
        $(".mobilgran").css("height",Math.round(big));
        $(".mobilpetit").css("height",Math.round(big)/2);
    }
    if ($(window).width()<769){
        $(".mobilgran").css("height",Math.round(big));
        $(".mobilpetit").css("height",Math.round(big)/2);
    }
}
function reloadSocial(){
    $('.facebook').each(function(){
        FB.XFBML.parse($(this).get(0));
    });
}

function dibuixaMapa() {
  var mapElement = document.getElementById('mapa');
  var coords = mapElement.innerHTML;
  var coord = coords.split("-");
  var lati = parseFloat(coord[0]);
  var long = parseFloat(coord[1]);
  var mapOptions = {
    zoom: 13,
    center: { lat: lati, lng: long}
  };
  
  var map = new google.maps.Map(mapElement, mapOptions);
  var myLatLng = new google.maps.LatLng(lati, long);
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map
  });
  google.maps.event.trigger(mapElement,'resize');
}