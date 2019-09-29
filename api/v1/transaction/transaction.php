<?php
    error_reporting(E_ALL);
    $val = $_REQUEST['uname'];
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

    $sql1 = "SELECT * FROM user WHERE name='$val' ";
    $temp1 = mysqli_query($db,$sql1);
    $result1 = mysqli_fetch_array($temp1);
    $uid = $result1['id']; //userid

    $sql2 = "SELECT film_id, judul, poster, jam_tayang FROM (kursi JOIN jadwal ON kursi.jadwal_id = jadwal.id) JOIN film ON film_id = film.id  WHERE user_id='$uid' ORDER BY jam_tayang DESC";
    $temp2 = mysqli_query($db,$sql2);
    $result2 = mysqli_fetch_array($temp2);

    $arrFilm = Array();
    $response = Array();
    $arrFilm2 = Array();
    $hasil1 = Array();
    $hasil2 = Array();
    $hasil3 = Array();

    $today = date("Y-m-d h:m:s");
    if(mysqli_num_rows($temp2) > 0){
        while($film = $temp2->fetch_assoc()){
            $arrFilm[] = $film;
        }

        for($i = 0; $i<count($arrFilm); $i++){
            $tempFilm = $arrFilm[$i]["film_id"];
            $sql3 = "SELECT * FROM review WHERE film_id='$tempFilm' AND user_id='$uid'";
            $query = mysqli_query($db,$sql3);
            $result3 = mysqli_fetch_array($query);
            array_push($arrFilm2, $result3["film_id"]);
        }

        //if($arrayFilm2 == null){
        //    for($i = 0; $i<count($arrFilm); $i++){
        //        if($arrFilm[$i]["jam_tayang"] > $today){
        //            array_push($hasil1, $arrFilm[$i]);
        //        } else if ($arrFilm[$i]["jam_tayang"] <= $today){
        //            array_push($hasil2, $arrFilm[$i]);
        //        }
        //    }
        //} else {
        //    for($j = 0; $j<count($arrFilm2); $j++){
        //        for($i = 0; $i<count($arrFilm); $i++){
        //            if($arrFilm[$i]["film_id"] == $arrFilm2[$j]){
        //                array_push($hasil3, $arrFilm[$i]);
        //            } else if($arrFilm[$i]["jam_tayang"] <= $toda){
        //                array_push($hasil2, $arrFilm[$i]);
        //            } else if($arrFilm[$i]["jam_tayang"] > $today)
        //                array_push($hasil1, $arrFilm[$i]);
        //        }
        //    }
        //}
        
        for($j = 0; $j<count($arrFilm2); $j++){
            for($i = 0; $i<count($arrFilm); $i++){
                if($arrFilm[$i]["film_id"] == $arrFilm2[$j]){
                    array_push($hasil3, $arrFilm[$i]);
                } else if($arrFilm[$i]["jam_tayang"] <= $today){
                    array_push($hasil2, $arrFilm[$i]);
                } else if($arrFilm[$i]["jam_tayang"] > $today)
                    array_push($hasil1, $arrFilm[$i]);
            }
        }

        //for($i = 0; $i<count($arrFilm); $i++){
        //    for($j = 0; $j<count($arrFilm2); $j++){
        //        if($arrFilm[$i]["jam_tayang"] > $today){
        //            array_push($hasil1, $arrFilm[$i]);
        //        } else if($arrFilm[$i]["film_id"] != $arrFilm2[$j] && $arrFilm[$i]["jam_tayang"] <= $today){
        //            array_push($hasil2, $arrFilm[$i]);
        //        } else if($arrFilm[$i]["film_id"] == $arrFilm2[$j] && $arrFilm[$i]["jam_tayang"] <= $today){
        //            array_push($hasil3, $arrFilm[$i]);
        //        }
        //    }
        //}

        $response["message"] = "Success get film by date";
        $response["uid"] = $uid;
        $response["data1"] = $hasil1;
        $response["data2"] = $hasil2;
        $response["data3"] = $hasil3;
        $response["status"] = 200;

    } else {
        $response["message"] = "Film not found";
        $response["status"] = 200;
    }

    http_response_code(200); //Set HTTP Response Code

    header('Content-Type: application/json'); 
    echo(json_encode($response));
?>