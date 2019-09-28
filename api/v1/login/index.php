<?php 

require_once __DIR__ .'/../../../Model/User.php';

if (isset($_POST['email'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    $user = new User();
    $user->print();
    if ($user->checkPassword("samantha11@gmail.com","samantha11")) {
        print ("ada");
    } else {
        print("tdk ada");
    }

    /*if (($email != "") && ($password != "")) {
        $user = new User();

        if ($user->checkPassword($email,$password)) {
            print ("ada");
        } else {
            print ("tdk ada");
        }

    }*/
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