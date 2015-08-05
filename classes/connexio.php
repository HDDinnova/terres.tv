<?php
class connexio extends mysqli {
    public function __construct() {
	parent::__construct("localhost","nr1c2syb_terres","haO{v3A4M5dE","nr1c2syb_terrestv");
	if (mysqli_connect_error()) {
		die('Error connexió (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
    }
}