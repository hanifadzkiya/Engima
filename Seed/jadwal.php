<?php
require_once __DIR__ .'/../Model/Film.php';
require_once __DIR__ .'/../Model/Jadwal.php';

$film = new Film();
$jadwal = new Jadwal();
$result_film = $film->getAll();
while($row = $result_film->fetch_assoc()) {
    $jumlah_genre = rand(1, 5);
    $id_film = $row["id"];
    $tanggal_rilis = $row["tanggal_rilis"];
    for($i = 0;$i < 42;$i += 6){
        $jam_tayang = date($tanggal_rilis, strtotime('+'.$i.' hours'));
        $jadwal->add($id_film, $jam_tayang);
    }
}