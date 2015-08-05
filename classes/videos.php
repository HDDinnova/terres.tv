<?php

class video {
    private $id;
    private $url;
    private $titol;
    private $categoria;
    private $territori;
    private $descripcio;
    private $autor;
    private $autorvideo;
    private $data;
    private $imatge;
    private $lletranegra=0;
    private $pastillablanca=0;
    private $pastillanegra=0;
    private $tags;
    private $referit1;
    private $referit2;
    private $referit3;
    private $latitud;
    private $longitud;
            
    function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getUrl(){
        return $this->url;
    }
    
    public function getTitol(){
        return $this->titol;
    }
    
    public function getCategoria(){
        include_once 'connexio.php';
        
        $bd = new connexio();
        $sql = "SELECT * FROM categoria WHERE id='$this->categoria'";
        $resultat = $bd->query($sql);
        $categoria = $resultat->fetch_array(MYSQLI_ASSOC);
        $bd->close();
        
        return $categoria['categoria'];
    }
    
    public function getTerritori(){
        include_once 'connexio.php';
        
        $bd = new connexio();
        $sql = "SELECT * FROM territori WHERE id='$this->territori'";
        $resultat = $bd->query($sql);
        $territori = $resultat->fetch_array(MYSQLI_ASSOC);
        $bd->close();
        
        return $territori['territori'];
    }
    
    public function getDescripcio(){
        return $this->descripcio;
    }
    
    public function getAutor(){
        return $this->autor;
    }
    
    public function getAutorVideo(){
        return $this->autorvideo;
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function getImatge(){
        return $this->imatge;
//      $link='https://vimeo.com/api/oembed.json?url=https://vimeo.com/'.$this->getUrl();
//      $ret=$this->curl_get($link);
//      $pic=json_decode($ret,true);
//      return $pic['thumbnail_url'];
    }
    
    public function getTags(){
        return $this->tags;
    }
    
    public function getLletraNegra(){
        if ($this->lletranegra == 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function getPastillaBlanca(){
        if ($this->pastillablanca == 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function getPastillaNegra(){
        if ($this->pastillanegra == 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function referit1() {
        return $this->referit1;
    }
    
    public function referit2() {
        return $this->referit2;
    }
    
    public function referit3() {
        return $this->referit3;
    }
    
    public function getLatitud(){
        return $this->latitud;
    }
    
    public function getLongitud(){
        return $this->longitud;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setUrl($url){
        $this->url = $url;
    }
    
    public function setTitol($titol){
        $this->titol = $titol;
    }
    
    public function setCategoria($cat){
        $this->categoria = $cat;
    }
    
    public function setTerritori($ter){
        $this->territori = $ter;
    }
    
    public function setDescripcio($des){
        $this->descripcio = $des;
    }
    
    public function setAutor($autor){
        $this->autor = $autor;
    }
    
    public function setAutorVideo($autorvideo){
        $this->autorvideo = $autorvideo;
    }
    
    public function setData($data){
      $this->data = $data;
    }
    
    public function setImatge($img){
        $this->imatge = $img;
    }
    
    public function setTags($tags){
        $this->tags = $tags;
    }
    
    public function setLletraNegra($i){
        $this->lletranegra = $i;
    }
    
    public function setPastillaBlanca($i){
        $this->pastillablanca = $i;
    }
    
    public function setPastillaNegra($i){
        $this->pastillanegra = $i;
    }
    
    public function setReferit1($ref) {
        $this->referit1 = $ref;
    }
    
    public function setReferit2($ref) {
        $this->referit2 = $ref;
    }
    
    public function setReferit3($ref) {
        $this->referit3 = $ref;
    }
    
    public function setLatitud($lat) {
        $this->latitud = $lat;
    }
    
    public function setLongitud($lon) {
        $this->longitud = $lon;
    }
    
    public function insertar() {
      require_once 'connexio.php';
      $bd = new connexio();
      $sql="INSERT INTO videos(url, titol, categoria, territori, descripcio, autor, autorvideo, data, imatge, lletranegra, pastillablanca, pastillanegra, tags, referit1, referit2, referit3, latitud, longitud) VALUES ('$this->url','$this->titol','$this->categoria','$this->territori','$this->descripcio','$this->autor','$this->autorvideo','$this->data','$this->imatge','$this->lletranegra','$this->pastillablanca','$this->pastillanegra','$this->tags','$this->referit1','$this->referit2','$this->referit3','$this->latitud','$this->longitud')";
      echo $sql;
      if ($bd->query($sql)){
        echo utf8_decode('inserció correcta');
        header('Location: ../login/index2.php?p=2');
      } else {
        echo 'error';
      }
    }
    
    public function llistar(){
      require_once 'connexio.php';
      include_once '../lang.php';
      global $lang;
      $bd = new connexio();
      $videos = $bd->query("SELECT id,titol,imatge FROM videos ORDER BY id DESC");
      while ($video = $videos->fetch_array(MYSQLI_ASSOC)){
        echo '<tr><td>'.$video['id'].'</td><td>'.  utf8_encode($video['titol']).'</td><td><img class="img-circle" src="../media/'.$video['imatge'].'"/></td><td><button type="button" class="btn btn-warning btn-xs" onclick="window.location.href=\'editvideo.php?id='.$video['id'].'\'"><span class="glyphicon glyphicon-pencil"></span> '.$lang['EDIT'].'</button></td><td><button type="button" class="btn btn-danger btn-xs" onclick="if (confirm(\''.$lang['CONFIRM_DELETE_VIDEO'].'\')){window.location.href=\'deletevideo.php?id='.$video['id'].'\'}"><span class="glyphicon glyphicon-trash"></span> '.$lang['DELETE'].'</button></td></tr>';
      }
      $bd->close();
    }
    
    public function retornaRefTv($r) {
        require_once 'connexio.php';
        $bd = new connexio();
        $videos = $bd->query("SELECT id,titol,imatge FROM videos WHERE id=$r LIMIT 1");
        $video = $videos->fetch_array(MYSQLI_ASSOC);
        $url="index.php?u=".htmlspecialchars($video['titol'])."-".$video['id'];
        echo '<a href="'.$url.'"><img class="img-thumbnail" src="media/'.$video['imatge'].'"><h3 class="txtref"><strong>'.utf8_encode($video['titol']).'</strong></h3></a>';
        $bd->close();
    }

	public function retornaRefTerres($r) {
        require_once 'connexio.php';
        $bd = new connexio();
        $consulta="SELECT id,title_".$_SESSION['lang']." AS titol,number,page FROM reportajes WHERE id=$r LIMIT 1";
        $videos = $bd->query($consulta);
        $video = $videos->fetch_array(MYSQLI_ASSOC);
        $ruta="../imagenes/rel/".$video['id'].".jpg";
        $url="../revista/".$video['number']."/".$video['page']."/".$video['titol']."/".$_SESSION['lang'];
        echo '<a href="'.$url.'"><img class="img-thumbnail" src="'.$ruta.'"><h3 class="txtref"><strong>'.utf8_encode($video['titol']).'</strong></h3></a>';
        $bd->close();
    }
	
	public function retornaRefGuia($r) {
        require_once 'connexio.php';
        $bd = new connexio();
        $videos = $bd->query("SELECT id,nombre,video_url FROM guia WHERE id=$r LIMIT 1");
        $video = $videos->fetch_array(MYSQLI_ASSOC);
        $ruta="../imagenes/guia/".$video['id']."/mini.jpg";
        $url="../guia/".$video['id']."/".utf8_encode($video['nombre'])."/".$_SESSION['lang'];
        echo '<a href="'.$url.'"><img class="img-thumbnail" src="'.$ruta.'"><h3 class="txtref"><strong>'.utf8_encode($video['nombre']).'</strong></h3></a>';
        $bd->close();
    }
    
    public function promocionar($pro1,$pro2,$pro3,$pro4,$pro5,$pro6) {
        require_once 'connexio.php';
        $bd = new connexio();
        $bd->query("TRUNCATE table promocionats");
        if($pro1!=""){
            $bd->query("INSERT INTO promocionats(video) VALUES ('$pro1')");
        if($pro2!=""){
            $bd->query("INSERT INTO promocionats(video) VALUES ('$pro2')");
        if($pro3!=""){
            $bd->query("INSERT INTO promocionats(video) VALUES ('$pro3')");
        if($pro4!=""){
            $bd->query("INSERT INTO promocionats(video) VALUES ('$pro4')");
        if($pro5!=""){
            $bd->query("INSERT INTO promocionats(video) VALUES ('$pro5')");
        if($pro6!=""){
            $bd->query("INSERT INTO promocionats(video) VALUES ('$pro6')");
        }}}}}
        }
    }
    
    public function seleccionar($id) {
        require_once 'connexio.php';
        $bd = new connexio();
        $sql = "SELECT * FROM videos WHERE id = $id LIMIT 1";
        $consulta = $bd->query($sql);
        $video = $consulta->fetch_array(MYSQLI_ASSOC);
        $this->setId($video['id']);
        $this->setUrl($video['url']);
        $this->setTitol($video['titol']);
        $this->setCategoria($video['categoria']);
        $this->setTerritori($video['territori']);
        $this->setDescripcio($video['descripcio']);
        $this->setAutor($video['autor']);
        $this->setAutorVideo($video['autorvideo']);
        $this->setData($video['data']);
        $this->setImatge($video['imatge']);
        if ($video['lletranegra']!=0) {$this->setLletraNegra(1);} else {$this->setLletraNegra(0);}
        if ($video['pastillablanca']!=0) {$this->setPastillaBlanca(1);} else {$this->setPastillaBlanca(0);}
        if ($video['pastillanegra']!=0) {$this->setPastillaNegra(1);} else {$this->setPastillaNegra(0);}
        $this->setTags($video['tags']);
        $this->setReferit1($video['referit1']);
        $this->setLatitud($video['latitud']);
        $this->setLongitud($video['longitud']);
        $bd->close();
    }
    
    public function curl_get($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $return = curl_exec($curl);
        curl_close($curl);
        return $return;
    }
}

class nouVideo extends video {
    function __construct($url,$titol,$cat,$ter,$des,$autor,$autorvideo,$data,$img,$tags,$r1,$r2,$r3,$lat,$lon) {
        parent::__construct();
        $this->setUrl($url);
        $this->setTitol($titol);
        $this->setCategoria($cat);
        $this->setTerritori($ter);
        $this->setDescripcio($des);
        $this->setAutor($autor);
        $this->setAutorVideo($autorvideo);
        $this->setData($data);
        $this->setImatge($img);
        $this->setTags($tags);
        $this->setReferit1($r1);
        $this->setReferit2($r2);
        $this->setReferit3($r3);
        $this->setLatitud($lat);
        $this->setLongitud($lon);
    }
}