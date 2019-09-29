<?php
require_once __DIR__.'/../../../../Model/Review.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

	parse_str(file_get_contents('php://input'));

    $reviewTable = new Review();

    $response = Array();
    if($reviewTable->delete($user_id,$film_id)){
    	$response["message"] = "Delete successfull";
    	$response["status"] = 200;
    	http_response_code(200);
    } else {
    	$response["message"] = "Not found";
    	$response["status"] = 200;
    	http_response_code(200);
    }
} else {
    $response["message"] = "Method not Allowed";
    $response["status"] = 405;
    http_response_code(405);
}
header('Content-Type: application/json'); 
echo(json_encode($response));
?>
