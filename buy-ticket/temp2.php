<?php
require_once __DIR__ .'/../Model/Kursi.php';

$kursi = new Kursi();

$response = Array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $jadwal_id = $_GET["jadwal_id"];
    $result_kursi = $kursi->getByJadwalId($jadwal_id);
    $arr_kursi = Array();

    while($kursi = $result_kursi->fetch_assoc()){
        $arr_kursi[] = $kursi;
    }
    
    $response["message"] = "Success get kursi";
    $response["data"] = $arr_kursi;
    $response["status"] = "200";
    http_response_code(200);
} else {
    $response["message"] = "Method not allowed";
    $response["status"] = "405";
    http_response_code(405);
}
header('Content-Type: application/json');
print(json_encode($response));
