<?php
require_once __DIR__ .'/../Model/Film.php';
require_once __DIR__ .'/../Model/Genre.php';
require_once __DIR__ .'/../Model/FilmGenre.php';

$arr_genre = Array();
$genre = new Genre();
$result_genre = $genre->getAll();
while($row = $result_genre->fetch_assoc()){
	$arr_genre[] = $row["id"];
}

$film_genre = new FilmGenre();
$film = new Film();
$result_film = $film->getAll();
while($row = $result_film->fetch_assoc()) {
	$jumlah_genre = rand(1,5);
	$id_film = $row["id"];
	$start = rand(0,9);
	for($i=0;$i<$jumlah_genre;$i++){
		$id_genre = $arr_genre[($start+$i)%10];
		$film_genre->add($id_film,$id_genre); 
	}
}

// for($i = 0;$i<100;$i++){
// 	$user->add("Hanif Adzkiya ".$i,"hanifadzkiya".$i."@gmail.com","0896499938".$i,"hanifadzkiya".$i,"hanifadzkiya".$i.".png");
// }

// for($i = 0;$i<100;$i++){
// 	$user->add("Samantha ".$i,"samantha".$i."@gmail.com","0812214405".$i,"samantha".$i,"samantha".$i.".png");
// }

// for($i = 0;$i<100;$i++){
// 	$user->add("Ginting ".$i,"ginting".$i."@gmail.com","081215505".$i,"ginting".$i,"ginting".$i.".png");
// }