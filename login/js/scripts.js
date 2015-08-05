function activateUrl() {
    $('input[name="url"]').removeAttr('disabled');
    $("#burl").removeClass("disabled");
}

function updateUrl(id) {
    var url = document.getElementById("url").value;
    if (window.XMLHttpRequest) {
        xmlhttpUrl=new XMLHttpRequest();
    } else {
        xmlhttpUrl=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpUrl.onreadystatechange=function() {
        if (xmlhttpUrl.readyState===4 && xmlhttpUrl.status===200){
                $('input[name="url"]').attr('disabled',true);
                $("#burl").addClass("disabled");
            }
    };
    xmlhttpUrl.open("GET","updateVideo.php?id="+id+"&url="+url,true);
    xmlhttpUrl.send();
}

function activateTitle() {
    $('input[name="titol"]').removeAttr('disabled');
    $("#btitle").removeClass("disabled");
}

function updateTitle(id) {
    var title = document.getElementById("titol").value;
    if (window.XMLHttpRequest) {
        xmlhttpTitle=new XMLHttpRequest();
    } else {
        xmlhttpTitle=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpTitle.onreadystatechange=function() {
        if (xmlhttpTitle.readyState===4 && xmlhttpTitle.status===200){
                $('input[name="titol"]').attr('disabled',true);
                $("#btitle").addClass("disabled");
            }
    };
    xmlhttpTitle.open("GET","updateTitle.php?id="+id+"&title="+title,true);
    xmlhttpTitle.send();
}

function activateCategory() {
    $('select[name="categoria"]').removeAttr('disabled');
    $("#bcat").removeClass("disabled");
}

function updateCategory(id) {
    var cat = document.getElementById("categoria").value;
    if (window.XMLHttpRequest) {
        xmlhttpCat=new XMLHttpRequest();
    } else {
        xmlhttpCat=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpCat.onreadystatechange=function() {
        if (xmlhttpCat.readyState===4 && xmlhttpCat.status===200){
                $('select[name="categoria"]').attr('disabled',true);
                $("#bcat").addClass("disabled");
            }
    };
    xmlhttpCat.open("GET","updateCategory.php?id="+id+"&cat="+cat,true);
    xmlhttpCat.send();
}

function activateTerritory() {
    $('select[name="territori"]').removeAttr('disabled');
    $("#bter").removeClass("disabled");
}

function updateTerritory(id) {
    var ter = document.getElementById("territori").value;
    if (window.XMLHttpRequest) {
        xmlhttpTer=new XMLHttpRequest();
    } else {
        xmlhttpTert=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpTer.onreadystatechange=function() {
        if (xmlhttpTer.readyState===4 && xmlhttpTer.status===200){
                $('select[name="territori"]').attr('disabled',true);
                $("#bter").addClass("disabled");
            }
    };
    xmlhttpTer.open("GET","updateTerritory.php?id="+id+"&ter="+ter,true);
    xmlhttpTer.send();
}

function activateDescription() {
    $('textarea#descripcio').removeAttr('disabled');
    $("#bdesc").removeClass("disabled");
}

function updateDescription(id) {
    var desc = document.getElementById("descripcio").value;
    console.log(desc);
    if (window.XMLHttpRequest) {
        xmlhttpDesc=new XMLHttpRequest();
    } else {
        xmlhttpDesc=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpDesc.onreadystatechange=function() {
        if (xmlhttpDesc.readyState===4 && xmlhttpDesc.status===200){
                $('textarea#descripcio').attr('disabled',true);
                $("#bdesc").addClass("disabled");
            }
    };
    xmlhttpDesc.open("GET","updateDescription.php?id="+id+"&desc="+desc,true);
    xmlhttpDesc.send();
}

function activateAuthor() {
    $('input[name="autor"]').removeAttr('disabled');
    $("#bauthor").removeClass("disabled");
}

function updateAuthor(id) {
    var author = document.getElementById("autor").value;
    if (window.XMLHttpRequest) {
        xmlhttpAuthor=new XMLHttpRequest();
    } else {
        xmlhttpAuthor=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpAuthor.onreadystatechange=function() {
        if (xmlhttpAuthor.readyState===4 && xmlhttpAuthor.status===200){
                $('input[name="autor"]').attr('disabled',true);
                $("#bauthor").addClass("disabled");
            }
    };
    xmlhttpAuthor.open("GET","updateAuthor.php?id="+id+"&a="+author,true);
    xmlhttpAuthor.send();
}

function activateAuthorVideo() {
    $('input[name="autorvideo"]').removeAttr('disabled');
    $("#bauthorvideo").removeClass("disabled");
}

function updateAuthorVideo(id) {
    var videoauthor = document.getElementById("autorvideo").value;
    if (window.XMLHttpRequest) {
        xmlhttpAuthorVideo=new XMLHttpRequest();
    } else {
        xmlhttpAuthorVideo=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpAuthorVideo.onreadystatechange=function() {
        if (xmlhttpAuthorVideo.readyState===4 && xmlhttpAuthorVideo.status===200){
                $('input[name="autorvideo"]').attr('disabled',true);
                $("#bauthorvideo").addClass("disabled");
            }
    };
    xmlhttpAuthorVideo.open("GET","updateAuthorVideo.php?id="+id+"&a="+videoauthor,true);
    xmlhttpAuthorVideo.send();
}

function activateDate() {
    $('input[name="data"]').removeAttr('disabled');
    $("#bdate").removeClass("disabled");
}

function updateDate(id) {
    var date = document.getElementById("data").value;
    if (window.XMLHttpRequest) {
        xmlhttpDate=new XMLHttpRequest();
    } else {
        xmlhttpDate=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpDate.onreadystatechange=function() {
        if (xmlhttpDate.readyState===4 && xmlhttpDate.status===200){
                $('input[name="data"]').attr('disabled',true);
                $("#bdate").addClass("disabled");
            }
    };
    xmlhttpDate.open("GET","updateDate.php?id="+id+"&d="+date,true);
    xmlhttpDate.send();
}

function activateThumb() {
    $("#bthumb").removeClass("disabled");
}

function activateTags() {
    $('input[name="tags"]').removeAttr('disabled');
    $("#btags").removeClass("disabled");
}

function updateTags(id) {
    var tags = document.getElementById("tags").value;
    if (window.XMLHttpRequest) {
        xmlhttpTags=new XMLHttpRequest();
    } else {
        xmlhttpTags=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpTags.onreadystatechange=function() {
        if (xmlhttpTags.readyState===4 && xmlhttpTags.status===200){
                $('input[name="tags"]').attr('disabled',true);
                $("#btags").addClass("disabled");
            }
    };
    xmlhttpTags.open("GET","updateTags.php?id="+id+"&t="+tags,true);
    xmlhttpTags.send();
}

function activateRef1() {
    $('select[name="ref1"]').removeAttr('disabled');
    $("#bref1").removeClass("disabled");
}

function updateRef1(id) {
    var ref1 = document.getElementById("ref1").value;
    if (window.XMLHttpRequest) {
        xmlhttpR1=new XMLHttpRequest();
    } else {
        xmlhttpR1=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpR1.onreadystatechange=function() {
        if (xmlhttpR1.readyState===4 && xmlhttpR1.status===200){
                $('select[name="ref1"]').attr('disabled',true);
                $("#bref1").addClass("disabled");
            }
    };
    xmlhttpR1.open("GET","updateRef1.php?id="+id+"&r="+ref1,true);
    xmlhttpR1.send();
}

function activateRef2() {
    $('select[name="ref2"]').removeAttr('disabled');
    $("#bref2").removeClass("disabled");
}

function updateRef2(id) {
    var ref2 = document.getElementById("ref2").value;
    if (window.XMLHttpRequest) {
        xmlhttpR2=new XMLHttpRequest();
    } else {
        xmlhttpR2=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpR2.onreadystatechange=function() {
        if (xmlhttpR2.readyState===4 && xmlhttpR2.status===200){
                $('select[name="ref2"]').attr('disabled',true);
                $("#bref2").addClass("disabled");
            }
    };
    xmlhttpR2.open("GET","updateRef2.php?id="+id+"&r="+ref2,true);
    xmlhttpR2.send();
}

function activateRef3() {
    $('select[name="ref3"]').removeAttr('disabled');
    $("#bref3").removeClass("disabled");
}

function updateRef3(id) {
    var ref3 = document.getElementById("ref3").value;
    if (window.XMLHttpRequest) {
        xmlhttpR3=new XMLHttpRequest();
    } else {
        xmlhttpR3=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpR3.onreadystatechange=function() {
        if (xmlhttpR3.readyState===4 && xmlhttpR3.status===200){
                $('select[name="ref3"]').attr('disabled',true);
                $("#bref3").addClass("disabled");
            }
    };
    xmlhttpR3.open("GET","updateRef3.php?id="+id+"&r="+ref3,true);
    xmlhttpR3.send();
}

function activateOptions() {
    $('input[name="ln"]').removeAttr('disabled');
    $('input[name="pastilla"]').removeAttr('disabled');
    $("#checkbox").removeClass("disabled");
    $("#radio1").removeClass("disabled");
    $("#radio2").removeClass("disabled");
    $("#radio3").removeClass("disabled");
    $("#boptions").removeClass("disabled");
}

function updateOptions(id) {
    var ln;
    if ($("#ln").is(':checked')) {
      ln = 1;
    } else {
      ln = 0;
    }
    var pastilla = $('input[name=pastilla]:checked', '#fnouvideo').val();
    
    if (window.XMLHttpRequest) {
      xmlhttpOptions=new XMLHttpRequest();
    } else {
      xmlhttpOptions=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpOptions.onreadystatechange=function() {
        if (xmlhttpOptions.readyState===4 && xmlhttpOptions.status===200){
          $('input[name="ln"]').attr('disabled');
          $('input[name="pastilla"]').attr('disabled');
          $("#checkbox").addClass("disabled");
          $("#radio1").addClass("disabled");
          $("#radio2").addClass("disabled");
          $("#radio3").addClass("disabled");
          $("#boptions").addClass("disabled");
        }
    };
    xmlhttpOptions.open("GET","updateOptions.php?id="+id+"&ln="+ln+"&p="+pastilla,true);
    xmlhttpOptions.send();
}

function activateLat() {
    $('input[name="lat"]').removeAttr('disabled');
    $("#blat").removeClass("disabled");
}

function updateLat(id) {
    var lat = document.getElementById("lat").value;
    if (window.XMLHttpRequest) {
        xmlhttpLat=new XMLHttpRequest();
    } else {
        xmlhttpLat=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpLat.onreadystatechange=function() {
        if (xmlhttpLat.readyState===4 && xmlhttpLat.status===200){
                $('input[name="lat"]').attr('disabled',true);
                $("#blat").addClass("disabled");
            }
    };
    xmlhttpLat.open("GET","updateLat.php?id="+id+"&l="+lat,true);
    xmlhttpLat.send();
}

function activateLon() {
    $('input[name="lon"]').removeAttr('disabled');
    $("#blon").removeClass("disabled");
}

function updateLon(id) {
    var lon = document.getElementById("lon").value;
    if (window.XMLHttpRequest) {
        xmlhttpLon=new XMLHttpRequest();
    } else {
        xmlhttpLon=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttpLon.onreadystatechange=function() {
        if (xmlhttpLon.readyState===4 && xmlhttpLon.status===200){
                $('input[name="lon"]').attr('disabled',true);
                $("#blon").addClass("disabled");
            }
    };
    xmlhttpLon.open("GET","updateLon.php?id="+id+"&l="+lon,true);
    xmlhttpLon.send();
}