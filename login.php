<?php
session_start();
if (isset($_POST['submit'])) {
    include_once 'server.php';

    $name = $_POST['username'];
    $password = md5($_POST['password']);

    $database = new server();

    $db = $database->openConnection();

    $sql_query = "SELECT * FROM credentials WHERE username = '$name' AND password = '$password'";
    $user = $db->query($sql_query);
    $result = $user->fetchAll(PDO::FETCH_ASSOC);

    $id = $result[0]['id'];
    $name = $result[0]['username'];
    $email = $result[0]['email'];
    $phone= $result[0]['phone'];
    $_SESSION['username'] = $name;
    $_SESSION['id'] = $id;
    $_SESSION['phonenumber']=$phone;

    $database->closeConnection();

    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>login</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background-images/bg2webp.jpg) no-repeat;
        background-size: cover;
    }

    #form-login {
        width: 30%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .login-box h1 {
        float: left;
        font-size: 40px;
        border-bottom: 6px solid yellow;
        margin-bottom: 50px;
        padding: 13px 0;
    }

    #signup-link a:link,
    a:visited {
        background-color: #f44336;
        color: white;
        width: 20%;
        padding: 10px 15px;
        margin: 13px 0;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    #signup-link a:hover,
    a:active {
        background-color: red;
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

    #login-button {
        width: 100%;
        background-color: #ffff80;
        color: #6699ff;
        font-size: 25px;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin-top: 13px;
    }

    #login-button:hover {
        cursor: pointer;
        background-color: #ffff00;
    }
    </style>
    <script type="text/javascript" src="js/loginvalidate.php"></script>
</head>

<body>
    <div class="wrapper">
        <div id="userinfo" style="color:white;">
            <?php if (isset($_SESSION['username'])) {
    echo "Welcome " . $_SESSION['username'] . "! Click to <a href='logout.php'>Logout</a>";
} else {
    echo "<script type='text/javascript'> alert('You need to login first');</script>";
}
?>
        </div>
        <div id="form-login">
            <form method="POST" action="">
                <div class="login-box">
                    <h1>Login</h1>
                    <div class="textbox-info">
                        <input type="text" id="t1" placeholder="username" name="username" required">
                    </div>

                    <div class="textbox-info">
                        <input type="password" id="t2" placeholder="password" name="password" required>
                    </div>

                    <input type="submit" value="SIGN IN" name="submit" id="login-button" onMouseOver="mouseover()"
                        onMouseOut="mouseout()">
                    <br>
                    <div id="signup-link">
                        <a href="signup.php">New Here? SIGN UP </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>