<?php
require_once __DIR__.'/../../../../Model/Jadwal.php';

$respons = Array();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$film_id = $_GET["film_id"];
	$jadwal = new Jadwal();
	$result_jadwal = $jadwal->getByFilmId($film_id);
	if(mysqli_num_rows($result_jadwal) > 0) { 
		$response["message"] = "Success get jadwal data";
		$array_jadwal = Array();
		while($jadwal = $result_jadwal->fetch_assoc()){
	        $array_jadwal[] = $jadwal;
	    }
	    $response["data"] = $array_jadwal;
	    $response["status"] = 200;
   } else {
   		$response["message"] = "Jadwal not found";
   		$response["status"] = 200;
   }
   http_response_code(200);
} else {
    $response["message"] = "Method not Allowed";
    $response["status"] = 405;
    http_response_code(405);
}
header('Content-Type: application/json'); 
echo(json_encode($response));
?>