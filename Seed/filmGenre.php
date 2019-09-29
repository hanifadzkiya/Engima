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