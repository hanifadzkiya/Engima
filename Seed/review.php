<?php
require_once __DIR__ .'/../Model/Review.php';
require_once __DIR__ .'/../Model/Kursi.php';
require_once __DIR__ .'/../Model/Jadwal.php';

$review = new Review();
$kursi = new Kursi();
$jadwal = new Jadwal();

$result_kursi = $kursi->getAll();
while($row = $result_kursi->fetch_assoc()) {
	if($row["user_id"] != null){
		$jadwal_id = $row["jadwal_id"];
		$user_id = $row["user_id"];
		$isGiveRating = rand(1,2);
		if($isGiveRating == 1){
			$result_jadwal = $jadwal->getById($jadwal_id);
			echo "number of rows: " . $result_jadwal->num_rows;
			while($row2 = $result_jadwal->fetch_assoc()){
				$film_id = $row2["film_id"];
				$review_content = "Sangat Menarik";
				$rating = rand(1,5);
				$review->add($user_id,$film_id,$review_content,$rating);
			}
		}
	}
}