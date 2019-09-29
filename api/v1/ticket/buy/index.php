<?php
require_once __DIR__.'/../../../../Model/Kursi.php';

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    
    parse_str(file_get_contents('php://input'));
    
    $kursi = new Kursi();

    if($kursi->buy($jadwal_id, $nomor, $user_id)) {
        print("sukses");
    } else {
        print("gagal");
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
