<?php
    //initialize var
    $configs = include "../../../Config.php";
    //connect to the database
    $db = mysqli_connect($configs["servername"], $configs["username"], $configs["password"], "engima");
if(!$db) {
    die('Could not connect: ' . mysqli_error($db));
}
    date_default_timezone_set("Asia/Jakarta");
    $today = date("Y-m-d h:m:s");
    $today2 = date("Y-m-d")."%";

    //$yesterday = date_sub($date,date_interval_create_from_date_string("1 days"));
    //$date2 = $yesterday->format('Y-m-d') . "%";
    //$yesterday2 = date_sub($date,date_interval_create_from_date_string("2 days"));
    //$date3 = $yesterday2->format('Y-m-d') . "%";

    $sql = "SELECT * FROM jadwal JOIN film ON jadwal.film_id = film.id WHERE jadwal.jam_tayang >= '$today' AND jadwal.jam_tayang LIKE '$today2'";
    $resultFilm = mysqli_query($db, $sql);
    $arrFilm = Array();
    $response = Array();
if(mysqli_num_rows($resultFilm) > 0) {
    while($film = $resultFilm->fetch_assoc()){
        $arrFilm[] = $film;
    }
    $response["message"] = "Success get film by date";
    $response["data"] = $arrFilm;
    $response["status"] = 200;
} else {
    $response["message"] = "Film not found";
    $response["status"] = 200;
}
    http_response_code(200); //Set HTTP Response Code

    header('Content-Type: application/json'); 
    echo(json_encode($response));
?>