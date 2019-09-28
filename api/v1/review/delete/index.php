<?php
require_once __DIR__.'/../../../../Model/Review.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

	parse_str(file_get_contents('php://input'));

 //    $reviewTable = new Review();

	// if(isUserWatch($user_id,$film_id)){
	// 	if(isUserHaveReview($user_id,$film_id)){
	// 		if($reviewTable->update($user_id,$film_id,$review,$rating)){
	// 			$response["message"] = "Update review successfull";
	// 			$response["status"] = 200;
	// 			http_response_code(200);
	// 		} else {
	// 			$response["message"] = "Internal Server Error";
	// 			$response["status"] = 500;
	// 			http_response_code(200);
	// 		}
	// 	} else {
	// 		$response["message"] = "User have'nt review";
	// 		$response["status"] = 200;
	// 		http_response_code(200);
	// 	}
	// } else {
	// 	$response["message"] = "Forbidden";
	// 	$response["status"] = 403;
	// 	http_response_code(403);
	// }
	// http_response_code(200); //Set HTTP Response Code
} else {
    $response["message"] = "Method not Allowed";
    $response["status"] = 405;
    http_response_code(405);
}
header('Content-Type: application/json'); 
echo(json_encode($response));
?>
