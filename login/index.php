<?php 

function verify($password_input,$password_hash){
    return (crypt($password_input, $password_hash) == $password_hash);
}

function checkPassword($email,$password) 
{ 
    $conn = new mysqli("localhost", "root", "1256", "engima");
    $sql = "SELECT * FROM user where email='".$email."'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == 1) {
        while($row = $result->fetch_assoc()) {
            $hash_password = $row["password"];
        }
        return verify($password,$hash_password);
    } else {
        return false;
    }
}

function isValid($access_token){
    $conn = new mysqli("localhost", "root", "1256", "engima");
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

function cekCookie(){
    if(isset($_COOKIE["access_token"])){
        if(isValid($_COOKIE["access_token"])){
            header("Location:../home");
            die();
        }
    } 
}

cekCookie();
if (isset($_POST['email'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    if (($email != "") && ($password != "")) {

        if (checkPassword($email,$password)) {
            $conn = new mysqli("localhost", "root", "1256", "engima");
            $result = $conn->query("SELECT * FROM user where email='".$email."'");
            $row = $result->fetch_assoc();
            $username = $row["name"];
            $user_id = $row["id"];
            
            $result = $conn->query("SELECT * FROM user where user_id='".$user_id."'");
            if(mysqli_num_rows($result) > 0){
                print "sudah ada";
            } else {
                $expire_at = date('Y-m-d H:i:s', time()+18000);
                $access_token = rand()."+".$expire_at;
                $sql = "INSERT INTO access_token  (access_token, user_id, expire_at) VALUES ('" . $access_token . "','".$user_id."','".$expire_at."')";
                if($conn->query($sql)){
                    setcookie('user_id',$user_id, time()+18000,'/');
                    setcookie('access_token', $access_token, time()+18000,'/');
                } else {

                }
            }
            header("Location:../home");
            die();
        } else {
            echo "<div class='alert' style='text-align:center;background-color:red;color:white;padding:10pt;'> You Have Entered Incorrect Username or Password </div>";
            unset($_POST['email']);
            unset($_POST['password']);
        }

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel=stylesheet href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <h1 id="title">Welcome to <b>Engi</b>ma!</h1>
        <form action="#" method="POST"> <!--PHP action-->
            <label>Email</label>
            <input type="email" placeholder="joe@do.com" name="email" class="intext" required>
            <br>
            <label>Password</label>
            <input type="password" placeholder="place here" name="password" class="intext" required>
            <br>
            <input type="submit" value="Login" id="login">
        </form>
        <p id="register">Don't have an account? <a href="#"> Register Here</a> </p><!--login.html-->
    </div>

</body>
</html>