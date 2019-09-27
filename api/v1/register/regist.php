<?php
    $val = $_REQUEST['val'];
    $name = $_REQUEST['name'];
    $error = "";

    //echo $val;
    //echo $name;

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

    if($name == "username"){
        $sql = "SELECT * FROM user WHERE name= '".$val."'";
        $result = mysqli_query($db,$sql);

        if(mysqli_affected_rows($db)>=1){
            $error = "Username " . $val . " is exist! Please use another username.";
        } else if(!(preg_match('/^[a-zA-Z0-9_.]+$/',$val))){
            $error = "Please use alphabet, number and underscore only";
        }
    }

    if($name == "email"){
        $sql = "SELECT * FROM user WHERE email= '".$val."'";
        $result = mysqli_query($db,$sql);

        if(mysqli_affected_rows($db)>=1){
            $error = "Email is already used! Please use another email.";
        }
    }

    if($name == "phone"){
        if(!(strlen($val)>=9 && strlen($val)<=12)){
            $error = "Phone number is invalid! Put only 9 to 12 digits.";
        }
    }

    echo $error;
    //echo $hint === "" ? "no suggestion" : $hint;
?>