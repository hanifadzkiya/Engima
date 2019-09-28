<?php
    //initialize var
    $db_user = "root";
    $db_pass = "sam";
    $db_name = "engima";
    $db_host = "localhost";

    //connect to the database
    $db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$db){
        die('Could not connect: ' . mysqli_error($db));
    }

    $today = date("Y-m-d")."%";
    $date = date_create(date("Y-m-d"));

    $yesterday = date_sub($date,date_interval_create_from_date_string("1 days"));
    $date2 = $yesterday->format('Y-m-d') . "%";
    $yesterday2 = date_sub($date,date_interval_create_from_date_string("2 days"));
    $date3 = $yesterday2->format('Y-m-d') . "%";

    $sql = "SELECT * FROM film WHERE tanggal_rilis LIKE '$today' OR tanggal_rilis LIKE '$date2' OR tanggal_rilis LIKE '$date3' ";
    $resultFilm = mysqli_query($db,$sql);
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