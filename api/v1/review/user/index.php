<?php
require_once __DIR__.'/../../../../Model/Review.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$user_id = $_GET["user_id"];
	$film_id = $_GET["film_id"];
	$review = new Review();
	$result_review = $review->getByFilmAndUser($user_id,$film_id);
	$arr_review = Array();
	$response = Array();
	if(mysqli_num_rows($result_review) > 0) {
	    while($review = $result_review->fetch_assoc()){
	        $arr_review[] = $review;
	    }
	    $response["message"] = "Success get review by film and user";
	    $response["data"] = $arr_review;
	    $response["status"] = 200;
	} else {
	    $response["message"] = "Review not found";
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