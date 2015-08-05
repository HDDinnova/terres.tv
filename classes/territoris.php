<?php

class territoris {
    private $id;
    private $territori;
    
    function __construct() {
        
    }
    
    function getCategoria(){
        return $this->territori;
    }
    
    function setCategoria($ter){
        $this->territori = $ter;
    }
    
    function llistar(){
        require_once 'connexio.php';
        include_once '../lang.php';
        global $lang;
        $bd = new connexio();
        $territori = $bd->query("SELECT * FROM territori");
        while ($ter = $territori->fetch_array(MYSQLI_ASSOC)) {
            echo '<tr><td>'.$ter['id'].'</td><td>'.utf8_encode($ter['territori']).'</td><td><button type="button" class="btn btn-warning btn-xs" onclick="window.location.href=\'editcategory.php?id='.$ter['id'].'\'"><span class="glyphicon glyphicon-pencil"></span> '.$lang['EDIT'].'</button></td><td><button type="button" class="btn btn-danger btn-xs" onclick="if (confirm(\''.$lang['CONFIRM_DELETE_USER'].'\')){window.location.href=\'deletecategory.php?id='.$ter['id'].'\'}"><span class="glyphicon glyphicon-trash"></span> '.$lang['DELETE'].'</button></td></tr>';
        }
        $bd->close();
    }
}

class nouterritori extends territoris {
    function __construct($ter) {
        parent::__construct();
        require_once 'connexio.php';
        $bd = new connexio();
        $bd->query("INSERT INTO territori (territori) VALUES ('".utf8_decode($ter)."')");        
        
        $bd->close();
    }
}