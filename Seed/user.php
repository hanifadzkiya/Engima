<?php
require_once __DIR__ .'/../Model/User.php';

$user = new User();

for($i = 0;$i<100;$i++){
	$user->add("Hanif Adzkiya ".$i,"hanifadzkiya".$i."@gmail.com","0896499938".$i,"hanifadzkiya".$i,"hanifadzkiya".$i.".png");
}

for($i = 0;$i<100;$i++){
	$user->add("Samantha ".$i,"samantha".$i."@gmail.com","0812214405".$i,"samantha".$i,"samantha".$i.".png");
}

for($i = 0;$i<100;$i++){
	$user->add("Ginting ".$i,"ginting".$i."@gmail.com","081215505".$i,"ginting".$i,"ginting".$i.".png");
}