<?php

class categories {
    private $id;
    private $categoria;
    
    function __construct() {
        
    }
    
    function getCategoria(){
        return $this->categoria;
    }
    
    function setCategoria($cat){
        $this->categoria = $cat;
    }
    
    function llistar(){
        require_once 'connexio.php';
        include_once '../lang.php';
        global $lang;
        $bd = new connexio();
        $categories = $bd->query("SELECT * FROM categoria");
        while ($cat = $categories->fetch_array(MYSQLI_ASSOC)) {
            echo '<tr><td>'.$cat['id'].'</td><td>'.utf8_encode($cat['categoria']).'</td><td><button type="button" class="btn btn-warning btn-xs" onclick="window.location.href=\'editcategory.php?id='.$cat['id'].'\'"><span class="glyphicon glyphicon-pencil"></span> '.$lang['EDIT'].'</button></td><td><button type="button" class="btn btn-danger btn-xs" onclick="if (confirm(\''.$lang['CONFIRM_DELETE_USER'].'\')){window.location.href=\'deletecategory.php?id='.$cat['id'].'\'}"><span class="glyphicon glyphicon-trash"></span> '.$lang['DELETE'].'</button></td></tr>';
        }
        $bd->close();
    }
}

class novaCategoria extends categories {
    function __construct($cat) {
        parent::__construct();
        require_once 'connexio.php';
        $bd = new connexio();
        $bd->query("INSERT INTO categoria (categoria) VALUES ('".utf8_decode($cat)."')");        
        
        $bd->close();
    }
}