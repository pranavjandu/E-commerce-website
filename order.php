<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must login first";
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background-images/everything.jpg) no-repeat;
        background-size: cover;
    }
    .main_buttons {
        padding: 10px;
        font-size: 20px;
        font-weight: bold;

    }

    .cantainer {
        padding-left: 20px;
        padding-right: 40px;
    }

    #subheader {
        width: 100%;
        height: 150px;

    }

    #subheader a {
        line-height: 30px;
        margin-left: 30px;
        float: right;
        color: yellow;
        text-decoration: none;
    }

    #subheader a:hover {
        color: red;
        background-color: yellow;
    }
    #headhead{
        text-align:center;
        color:white;
        padding-top:80px;
    }
    </style>
</head>
<body>
    <div id="header">
        <div id="subheader">
            <div class="cantainer">
                <img src="images/mainlogo.png" width="250px" height="150px">
                <a class="main_buttons" href="logout.php">LOGOUT</a>
                <a class="main_buttons" href="index.php">HOMEPAGE</a>
            </div>
        </div>
    </div>
    <div id="headhead">
    <h1> Your Order has been placed. We will contact you soon on your registered Mobile number </h1>
    </div>

</body>

</html>