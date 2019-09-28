<?php
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
    $result1 = mysql_fetch_array($temp1);
    $uid = $result1['id'];

    $sql2 = "SELECT judul, poster,jadwal FROM (kursi JOIN ON kursi.jadwal_id = jadwal.id)  WHERE user_id='$uid' ";
    $temp2 = mysqli_query($db,$sql2);
    $result2 = mysql_fetch_array($temp2);
    

?>