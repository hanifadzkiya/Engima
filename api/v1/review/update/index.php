<?php
require_once __DIR__.'/../../../../Model/Review.php';

function isUserWatch($user_id,$film_id){
	global $reviewTable;
	$sql = "SELECT temp_table.user_id as user_id, temp_table.jadwal_id as jadwal_id, jadwal.film_id as film_id from jadwal JOIN ( SELECT user.id AS user_id,kursi.jadwal_id AS jadwal_id FROM `user` JOIN `kursi` ON user.id = kursi.user_id ) AS temp_table ON jadwal.id = jadwal_id WHERE user_id = '00998708-2fe6-45b6-a3a9-788b2efac19d' AND film_id = '9eceeb9a-678c-403f-9e45-cde656b47cef'";
	$result_check = $reviewTable->runQuery($sql);
	return mysqli_num_rows($result_check) > 0;
}

function isUserHaveReview($user_id,$film_id){
	global $reviewTable;
	print($user_id);
	$result_check = $reviewTable->getByFilmAndUser($user_id,$film_id);
	return mysqli_num_rows($result_check) > 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
	$user_id = $_POST["user_id"];
	$film_id = $_POST["film_id"];
	$review = $_POST["review"];
	$rating = $_POST["rating"];

	$reviewTable = new Review();

	if(isUserWatch($user_id,$film_id)){
		if(isUserHaveReview($user_id,$film_id)){
			if($reviewTable->update($user_id,$film_id,$review,$rating)){
				$response["message"] = "Update review successfull";
				$response["status"] = 200;
				http_response_code(200);
			} else {
				$response["message"] = "Internal Server Error";
				$response["status"] = 500;
				http_response_code(200);
			}
		} else {
			$response["message"] = "User have'nt review";
			$response["status"] = 200;
			http_response_code(200);
		}
	} else {
		$response["message"] = "Forbidden";
		$response["status"] = 403;
		http_response_code(403);
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
