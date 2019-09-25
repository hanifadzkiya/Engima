<?php
require_once __DIR__.'/../../../Model/Film.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$judul_film = $_GET["judul"];
	$page = $_GET["page"];
	if($page == NULL) $page = 1;
	$film = new Film();
	$arr_film = Array();
	$response = Array();
    $data = Array();
    $sql = "SELECT COUNT(*) FROM film WHERE judul LIKE '%".$judul_film."%'";
    $count_query = $film->runQuery($sql);
    while($count = $count_query->fetch_assoc()){
        $data["jumlah_film"] = $count["COUNT(*)"];
    }
    $start_row = ($page-1)*5;
    $total_index = 5;
    $result_film = $film->getByJudul($judul_film,$start_row,$total_index);
	if(mysqli_num_rows($result_film) > 0) {
	    while($film = $result_film->fetch_assoc()){
	        $arr_film[] = $film;
	    }
	    $data["film"] = $arr_film;
	    $response["message"] = "Success get film by title";
	    $response["data"] = $data;
	    $response["status"] = 200;
	} else {
	    $response["message"] = "Film not found";
    	$response["data"] = $data;
	    $response["status"] = 200;
	}
	http_response_code(200); //Set HTTP Response Code
} else {
    $response["message"] = "Method not Allowed";
    $response["status"] = 405;
    http_response_code(405);
}
header('Content-Type: application/json'); 
echo(json_encode($response));
?>