<div id="footer" class="footer">
	<div class="container">
        <div class="row">
        	<div class="col-md-4"><a href="../terresdelebre.php"><?php echo $lang_array["terres"]; ?></a><br><br></div>
        	<div class="col-md-2 col-md-offset-6"><p><a href="https://www.facebook.com/terresmagazine?ref=hl" target="_blank"><img src="/imagenes/f.jpg" alt="terres" width="22" height="24" border="0"/></a>
<a href="https://twitter.com/terresmagazine" target="_blank"><img src="../imagenes/t.jpg" alt="terres" width="22" height="24" border="0"/></a>
<a href="https://plus.google.com/u/0/b/106393786280871442505/106393786280871442505/posts" target="_blank"><img src="../imagenes/g.jpg" alt="terres" width="22" height="24" border="0"/></a>
<a href="https://vimeo.com/terresmagazine/videos" target="_blank"><img src="../imagenes/v.jpg" alt="terres" width="21" height="24" border="0"/></a>
<a href="http://www.flickr.com/photos/terresmagazine/" target="_blank"><img src="../imagenes/flickr.jpg" alt="terres" width="22" height="24" border="0"/></a>
<a href="http://pinterest.com/terresmagazine/pins/" target="_blank"><img src="../imagenes/p.jpg" alt="terres" width="22" height="24" border="0"/></a>
<a href="http://www.youtube.com/channel/UCwe92Gm8lhcqqHlyd09m1Rg/feed" target="_blank"><img src="../imagenes/y.jpg" alt="terres" width="21" height="24" border="0"/></a>
</p></div> 
      	</div>
     </div>
</div>
<div class="legal">
	<div class="container">
      <div class="row">
        <div class="col-md-6"><small>@terres 2014&nbsp;&nbsp;&nbsp;&nbsp;<a href="../equip.php"><?php echo $lang_array["equip"]; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/equip.php"><?php echo $lang_array["contact"]; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/equip.php"><?php echo $lang_array["publicitat"]; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/condicions.php"><?php echo $lang_array["condicions"]; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/privacitat.php"><?php echo $lang_array["politica"]; ?></a></small></div>
        <div class="col-md-2 col-md-offset-4">
        <li class="dropdown dropup">
              <a href="" class="dropdown" data-toggle="dropdown">català<b class="caret"></b></a>
              <ul class="dropdown-menu">
              <?php 
			  $url1=$_SERVER['REQUEST_URI'];
			  if ($url1 =="/"){
				$string=$url1."index/"; 
			  }else{
				$string=substr($url1, 0, -2);  
			  }
			   ?>
                <li><a href="<?php echo $string."ca";  ?>">català</a></li>
                <li><a href="<?php echo $string."es";  ?>">español</a></li>
                <li><a href="<?php echo $string."en";  ?>">english</a></li>
                <li><a href="<?php echo $string."fr";  ?>">français</a></li>
                <li><a href="<?php echo $string."de";  ?>">deutsch</a></li>
              </ul>
		</div>
      </div> 
   </div>     
</div>