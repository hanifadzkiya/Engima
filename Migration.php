<?php
	include("model/Engima.php");
	include("model/User.php");
	$database = new Engima();
	$database->connect();
	$database->create();
	$user = new User();
	$user->create();
?>