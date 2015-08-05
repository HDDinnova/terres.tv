<?php
    include_once '../classes/categories.php';
    require_once '../lang.php';
    $cat = $_REQUEST['c'];
    $categoria = new novaCategoria($cat);
    $categoria->llistar();
    echo '<tr><td></td><td><input type="text" class="form-control" name="categoria" id="categoria" placeholder="'.$lang['NEW_CATEGORY'].'"></td><td><button type="button" class="btn btn-success btn-xs" onclick="insertcat()"><span class="glyphicon glyphicon-plus"></span> '.$lang['INSERT'].'</button></td><td></td></tr>';