<?php
$configs = include("../Config.php");
function isValid($access_token){
    global $configs;
    $conn = new mysqli($configs["servername"], $configs["username"], $configs["password"], "engima");
    $sql = "SELECT * FROM access_token WHERE access_token = '" . $access_token . "'";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        $row = $result->fetch_assoc();
        $expire = $row["expire_at"];
        if($expire > date('Y-m-d H:i:s', time())){
            return true;
        } else {
            $sql = "DELETE FROM access_token WHERE access_token = '".$access_token."'";
            $conn->query($sql);
            return false;
        }
    } else {
        return false;
    }
}

function cekCookieLogin(){
    if(isset($_COOKIE["access_token"])){
        if(isValid($_COOKIE["access_token"])){
            header("Location:../home");
            die();
        }
    }
}

function cekCookieOther(){
    if(isset($_COOKIE["access_token"])){
        if(!isValid($_COOKIE["access_token"])){
            print("masuk sini");
            header("Location:../login");
            die();
        } else {
            print("masuk sini yaa");
        }
    } else {
        header("Location:../login");
        die();
    }
}