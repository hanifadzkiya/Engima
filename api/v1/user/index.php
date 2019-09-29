<?php
require_once __DIR__.'/../../../Model/User.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user = new User();
    $user_id = $_GET["id"];
    $result_user = $user->getById($user_id);
    if(mysqli_num_rows($result_user) > 0) {
        while($row = $result_user->fetch_assoc()){
            $user = $row;
        }
        $response["message"] = "Success get User";
        $response["data"] = $user;
        $response["status"] = 200;
    } else {
        $response["message"] = "User not found";
        $response["status"] = 200;
    }
} else {
    $response["message"] = "Method not allowed";
    $response["status"] = 405;
    http_response_code(405); 
}

header('Content-Type: application/json'); 
print(json_encode($response));