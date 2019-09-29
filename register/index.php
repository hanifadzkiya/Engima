<?php 

require_once("../Cookie.php");
cekCookieLoginRegister();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="css/register_style.css">
        <script>
            function errorMsg(val,name){
                if(val == ""){
                    document.getElementByID(name+"_error").innerHTML = "";
                    return;
                } else {
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById(name+"_error").innerHTML = this.responseText;
                            //document.getElementById(regist).disabled = disabled;
                            if (this.responseText == ""){
                                document.getElementById(name).style.border = '1px solid #b8ffa0'
                                //document.getElementById(regist).disabled = false;
                            } else {
                                document.getElementById(name).style.border = '1px solid #c9c9c9'
                            }
                        }
                    };
                    
                    //xmlhttp.open("GET", "regist.php?val=" + val, true);
                    xmlhttp.open("GET", "regist.php?val=" + val + "&name=" + name, true);
                    xmlhttp.send();
                }
            }
        </script>
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <body>
    <?php
        error_reporting(0);
        require_once '../Model/User.php';
        //connect to the database
        $db = mysqli_connect($configs["servername"], $configs["username"], $configs["password"], $db_name);
        if(!$db){
            die('Could not connect: ' . mysqli_error($db));
        }

        //register user
        if(isset($_POST['regist'])) {
            $username =$_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass_1 = $_POST['password'];
            $pass_2 = $_POST['confirm'];
            $picture = $_FILES['pic']['name'];
            
            $errorpass = "";
            $errorpic = "";

            $target_dir = "../images/";
            $target_file = $target_dir . basename($_FILES['pic']['name']);
            $upOK = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            $newtarget_file = $target_dir . $username . "." . $imageFileType;
            $newFileName = $username . "." . $imageFileType;

            //only allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $errorpic =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $upOk = 0;
            }

            //CHECK other data
            if ($pass_1 != $pass_2) {
                $errorpass =  "The two passwords do not match";
                $upOK = 0;
                //array_push($errors, "The two passwords do not match");
            }

            //check username
            $sql = "SELECT * FROM user WHERE name= '".$username."'";
            $result = mysqli_query($db,$sql);

            if(mysqli_affected_rows($db)>=1){
                $errorusername = "Username " . $username . " is exist! Please use another username.";
                $upOK = 0;
            } else if(!(preg_match('/^[a-zA-Z0-9_.]+$/',$username))){
                $errorusername = "Please use alphabet, number and underscore only";
                $upOK = 0;
            }
            //check email
            $sql = "SELECT * FROM user WHERE email= '".$email."'";
            $result = mysqli_query($db,$sql);

            if(mysqli_affected_rows($db)>=1){
                $erroremail = "Email is already used! Please use another email.";
                $upOK = 0;
            }
            //check phone num
            if(!(preg_match('/^[0-9]{9,12}$/', $phone))){
                $errorphone = "Phone number is invalid! Put only 9 to 12 digits number.";
                $upOK = 0;
            }
            $sql = "SELECT * FROM user WHERE phone_number= '".$phone."'";
            $result = mysqli_query($db,$sql);
    
            if(mysqli_affected_rows($db)>=1){
                $errorphone = "Phone num is already used! Please use another phone num.";
            }

            // Check if $uploadOk is set to 0 by an error
            if ($upOK == 0) {
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["pic"]["tmp_name"], $newtarget_file)) {
                } else {
                    $errorpic =  "Sorry, there was an error uploading your file.";
                }
                //update database
                $user = new User();
                $user->add($username, $email, $phone, $pass_1, $newFileName);
                $result = $user->getByEmail($email);
                while($row = $result->fetch_assoc()){
                    $user_id = $row["id"];
                }
                $expire_at = date('Y-m-d H:i:s', time()+18000);
                $access_token = rand()."+".$expire_at;
                $sql = "INSERT INTO access_token  (access_token, user_id, expire_at) VALUES ('" . $access_token . "','".$user_id."','".$expire_at."')";
                if($user->runQuery($sql)){
                    setcookie('user_id',$user_id, time()+18000,'/');
                    setcookie('access_token', $access_token, time()+18000,'/');
                } else {

                }
                header("Location: ../home");
                exit();
            }
        }
    ?>
        <div class="wrapper">
            <p id="title">Welcome to <b>Engi</b>ma!</p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"> <!--PHP action-->
                <div class="inputform">
                    <label>Username</label>
                    <input id="username" type="text" placeholder="joe.johndoe" name="username" class="intext" onchange="errorMsg(this.value,this.name)" required>
                    <p id="username_error" class="error_msg"><?php echo $errorusername ?></p>
                </div>
                <br>

                <div class="inputform">
                    <label>Email Address</label>
                    <input id="email" type="email" placeholder="joe@email.com" name="email" class="intext" onchange="errorMsg(this.value,this.name)" required>
                    <p id="email_error" class="error_msg"><?php echo $erroremail ?></p>
                </div>
                <br>

                <div class="inputform">
                    <label>Phone Number</label>
                    <input id="phone" type="tel" placeholder="+62813xxxxxxxx" name="phone" class="intext" onchange="errorMsg(this.value,this.name)" required>
                    <p id="phone_error" class="error_msg"><?php echo $errorphone ?></p>
                </div>
                <br>
                
                <div class="inputform">
                    <label>Password</label>
                    <input type="password" placeholder="Make as strong as possible" name="password" class="intext" required>
                    <p id="password_error" class="error_msg"> </p>
                </div>
                <br>

                <div class="inputform">
                    <label>Confirm Password</label>
                    <input type="password" placeholder="Same as above" name="confirm" class="intext" required>
                    <p id="confirm_error" class="error_msg"><?php echo $errorpass ?></p>
                </div>
                <br>

                <div class="inputform">
                    <label>Profile Picture</label>
                    <input type="file" name="pic" id="pic" class="hide" required onchange="readFile(this)">
                    <input name="fileToUpload" id="fileToUpload" placeholder=" " readonly class="intext">
                    <button type="button" name="upload" id="upload" onclick="document.getElementById('pic').click()">Browse</button>
                    <p id="pic_error" class="error_msg"><?php echo $errorpic ?></p>
                </div>
                <script>
                    function readFile(name) {
                        document.getElementById("fileToUpload").value = document.getElementById("pic").files[0].name;
                    }
                </script>
                
                <br>
                <input type="submit" name="regist" value="Register" id="regist">
            </form>
            
            <p id="login">Already have account? <a href="../login/index.php"> Login Here</a> </p>
        </div>
    </body>
</html>