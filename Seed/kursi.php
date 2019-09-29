<?php
require_once __DIR__ .'/../Model/User.php';
require_once __DIR__ .'/../Model/Jadwal.php';
require_once __DIR__ .'/../Model/Kursi.php';

$user = new User();
$jadwal = new Jadwal();
$kursi = new Kursi();

$arr_user = Array();

$result_user = $user->getAll();
while($row = $result_user->fetch_assoc()){
	$arr_user[] = $row["id"];
}

$result_jadwal = $jadwal->getAll();
while($row = $result_jadwal->fetch_assoc()) {
	$jadwal_id = $row["id"];
	for($nomor = 1;$nomor <= 30;$nomor++){
		$is_sold = rand(1,2);
		if($is_sold == 1){
			$user_id = $arr_user[array_rand($arr_user)];
			$kursi->add($jadwal_id,$nomor,$user_id);
		} else {
			$kursi->addWithoutUser($jadwal_id,$nomor);
		}
	}
}