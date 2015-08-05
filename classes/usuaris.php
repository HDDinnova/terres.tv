<?php

class usuari {
    private $id;
    private $nom;
    private $cognom;
    private $correu;
    private $password;
    
    function __construct() {
		
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function getCognom() {
        return $this->cognom;
    }
    
    public function getCorreu() {
        return $this->correu;
    }
    
    public function getPassword() {
        return md5($this->password);
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function setCognom($cognom) {
        $this->cognom = $cognom;
    }
    
    public function setCorreu($correu) {
        $this->correu = $correu;
    }
    
    public function setPassword($pass) {
        $this->password = md5($pass);
    }
    
    public function crear() {
        require_once 'connexio.php';
        
        $bd = new connexio();
        $sql = "INSERT INTO usuaris (nom,cognoms,correu,contrasenya) VALUES ('$this->nom','$this->cognom','$this->correu','$this->password')";
        if ($bd->query($sql)) {
            return $bd->insert_id;
        } else {
            return 0;
        }
            
        $bd->close();
    }
    
    public function login($correu,$pass){
        require_once 'connexio.php';
        
        $bd = new connexio();
        $password = md5($pass);
        $sql = "SELECT id,correu,contrasenya FROM usuaris WHERE correu='$correu' AND contrasenya='$password' LIMIT 1";
        $check = $bd->query($sql);
        $resultat = $check->num_rows;
        if ($resultat == 1) {
            $id = $check->fetch_array(MYSQLI_ASSOC);
            return $id['id'];
        } else {
            return 0;
        }
            
        $bd->close();
    }
    
    public function llistar(){
      require_once 'connexio.php';
      include_once '../lang.php';
      global $lang;
      $bd = new connexio();
      $usuaris = $bd->query("SELECT id,nom,cognoms,correu FROM usuaris ORDER BY id");
      while ($usuari = $usuaris->fetch_array(MYSQLI_ASSOC)){
        echo '<tr><td>'.$usuari['id'].'</td><td>'.utf8_encode($usuari['nom']).' '.utf8_encode($usuari['cognoms']).'</td><td>'.$usuari['correu'].'</td><td><button type="button" class="btn btn-warning btn-xs" onclick="window.location.href=\'edituser.php?id='.$usuari['id'].'\'"><span class="glyphicon glyphicon-pencil"></span> '.$lang['EDIT'].'</button></td><td><button type="button" class="btn btn-danger btn-xs" onclick="if (confirm(\''.$lang['CONFIRM_DELETE_USER'].'\')){window.location.href=\'deleteuser.php?id='.$usuari['id'].'\'}"><span class="glyphicon glyphicon-trash"></span> '.$lang['DELETE'].'</button></td></tr>';
      }
      $bd->close();
    }
}

class nouUsuari extends usuari {
    function __construct($nom,$cognoms,$correu,$pass) {
        parent::__construct();
        $this->setNom($nom);
        $this->setCognom($cognoms);
        $this->setCorreu($correu);
        $this->setPassword($pass);
    }
}