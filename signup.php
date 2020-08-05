<?php
if (isset($_POST["submit"])) {
    include_once 'server.php';
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phonenumber = $_POST['phone'];
    $passwordconfirm = md5($_POST['passwordconfirm']);
    if ($password == $passwordconfirm) {

        $database = new server();
        $db = $database->openConnection();
        $sql_query = "SELECT username,email FROM credentials WHERE username='$name' OR email='$email' LIMIT 1";
        $user = $db->query($sql_query);
        $result = $user->fetchAll();
        

        if (empty($result)) {
            $sql_query = "INSERT INTO credentials (username,email,phone,password) VALUES ('$name','$email','$phonenumber','$password')";
            $db->exec($sql_query);

            $database->closeConnection();
            $response = array(
                "type" => "success",
                "message" => "You have registered successfully.<br/><a href='login.php'>Now Please Login</a>.",
            );
            unset($_POST["submit"]);
        } else {
            
            $response = array(
                "type" => "error",
                "message" => "username or email already in use",
            );
            
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>signup</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background-images/bg2webp.jpg) no-repeat;
        background-size: cover;
    }

    .form-signup {
        width: 25%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .signup-box h1 {
        float: left;
        font-size: 40px;
        border-bottom: 6px solid yellow;
        margin-bottom: 50px;
        padding: 13px 0;
    }

    .textbox-info {
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0;
        margin: 8px 0;
        border-bottom: 1px solid yellow;
    }

    .textbox-info input {
        border: none;
        outline: none;
        background: none;
        color: white;
        font-size: 18px;
        width: 80%;
        float: left;
        margin: 0 10px;
    }

    #signup-button {
        width: 100%;
        background-color: #ffff80;
        color: #6699ff;
        font-size: 25px;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    #signup-button:hover {
        cursor: pointer;
        background-color: #ffff00;
    }

    #login-link a:link,
    a:visited {
        background-color: #f44336;
        color: white;
        width: 30%;
        padding: 10px 15px;
        margin: 8px 0;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    #login-link a:hover,
    a:active {
        background-color: red;
    }

    .success {
        color:white;
        font-size:20px;
    }
    .error{
        color:red;
        font-size:20px;
    }


    </style>
    <script src="js/signupvalidate.php"></script>
</head>

<body>
    <div>
        <?php if (!empty($response)): ?>
        <div id="response" class="<?php echo $response["type"]; ?>"><?php echo $response["message"] ?></div>
        <?php endif?>
        <div class="form-signup">
            <form action="" method="POST">
                <div class="signup-box">
                    <h1>Sign-up</h1>



                    <div class="textbox-info">
                        <input type="text" id="t3" placeholder="Username" name="username" required>

                    </div>

                    <div class="textbox-info">
                        <input type="text" id="t4" placeholder="Phone number" name="phone" required>

                    </div>

                    <div class="textbox-info">
                        <input type="email" id="t1" placeholder="Email" name="email" required>

                    </div>
                    <div class="textbox-info">
                        <input type="password" id="t2" placeholder="New Password" name="password" required>
                    </div>
                    <div class="textbox-info">
                        <input type="password" id="t5" placeholder="Confirm Password" name="passwordconfirm" required>
                    </div>

                    <input type="submit" id="signup-button" onclick="validate()" value="SIGN UP" name="submit"
                        onMouseOver="mouseover()" onMouseOut="mouseout()">
                    <br>
                    <div id="login-link">
                        <a href="login.php">Already a user? Sign-In </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>