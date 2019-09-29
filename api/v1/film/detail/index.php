<?php
require_once __DIR__.'/../../../../Model/Film.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_film = $_GET["id"];
    $film = new Film();
    $result_film = $film->getById($id_film);
    $arr_film = Array();
    $response = Array();
    if(mysqli_num_rows($result_film) > 0) {
        while($film = $result_film->fetch_assoc()){
            $arr_film["id"] = $film["id"];
            $arr_film["judul"] = $film["judul"];
            $arr_film["poster"] = $film["poster"];
            $arr_film["rating"] = $film["rating"];
            $arr_film["tanggal_rilis"] = $film["tanggal_rilis"];
            $arr_film["durasi_tayang"] = $film["durasi_tayang"];
            $arr_film["sinopsis"] = $film["sinopsis"];
        }
        $response["message"] = "Success get film by the ID";
        $response["data"] = $arr_film;
        $response["status"] = 200;
    } else {
        $response["message"] = "Film not found";
        $response["status"] = 200;
    }
    http_response_code(200); //Set HTTP Response Code
} else {
    $response["message"] = "Method not Allowed";
    $response["status"] = 405;
    http_response_code(405);
}
header('Content-Type: application/json'); 
print(json_encode($response));