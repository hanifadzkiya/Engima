<?php
    $val = $_REQUEST['val'];
    $name = $_REQUEST['name'];
    $error = "";

    $configs = include("../Config.php");

    //connect to the database
    $db = mysqli_connect($configs["servername"], $configs["username"], $configs["password"],"engima");
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
        if(!(preg_match('/^[0-9]{9,12}$/', $val))){
            $error = "Phone number is invalid! Put only 9 to 12 digits number.";
        }
        $sql = "SELECT * FROM user WHERE phone_number= '".$val."'";
        $result = mysqli_query($db,$sql);

        if(mysqli_affected_rows($db)>=1){
            $error = "Phone num is already used! Please use another phone num.";
        }
    }

    echo $error;
    //echo $hint === "" ? "no suggestion" : $hint;
?>