<?php
require_once __DIR__.'/../../../../Model/Review.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user_id = $_POST["user_id"];
	$film_id = $_POST["film_id"];
	$review = $_POST["review"];
	http_response_code(200); //Set HTTP Response Code
} else {
    $response["message"] = "Method not Allowed";
    $response["status"] = 405;
    http_response_code(405);
}
header('Content-Type: application/json'); 
echo(json_encode($response));
?>