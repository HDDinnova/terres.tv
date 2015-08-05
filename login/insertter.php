<?php
    include_once '../classes/territoris.php';
    require_once '../lang.php';
    $ter = $_REQUEST['t'];
    $territori = new nouterritori($ter);
    $territori->llistar();
    echo '<tr><td></td><td><input type="text" class="form-control" name="territori" id="territori" placeholder="'.$lang['NEW_TERRITORY'].'"></td><td><button type="button" class="btn btn-success btn-xs" onclick="insertter()"><span class="glyphicon glyphicon-plus"></span> '.$lang['INSERT'].'</button></td><td></td></tr>';
    