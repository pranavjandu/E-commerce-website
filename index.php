<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must login first";
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>INDEX</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background: url(background-images/everything.jpg) no-repeat;
        background-size: cover;
    }

    #wrapper {}

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

    .middle {
        width: 1100px;
        height: 400px;
        background-color: transparent;
        margin: auto;
        overflow: hidden;
    }

    .slider {
        position: relative;
        width: 4400px;
        animation: slide 20s infinite;
    }

    .slider img {
        float: left;
    }

    @keyframes slide {
        0% {
            left: 0px;
        }

        25% {
            left: 0px;
        }

        35% {
            left: -1100px;
        }

        45% {
            left: -1100px;
        }

        50% {
            left: -2200px;
        }

        75% {
            left: -2200px;
        }

        80% {
            left: -3300px;
        }

        85% {
            left: -3300px;
        }

        100% {
            left: auto;
        }
    }

    .brand {
        text-align: center;

        height: 550px;
    }

    #mi img {
        background-color: #fff;
        box-shadow: 0px 0px 0 5px red, 0 2px 3px 0 yellow;
        width: 150px;
        margin: 20px;
        height: 150px;
        margin-top: 45px;
    }

    .footer {
        width: 100%;
        height: 250px;
        margin: 0px;
        padding: 0px;

    }

    .footer_right {
        width: 25%;
        height: 99%;
        float: left;
        text-align:center;
    }

    .footer_right img {
        width: 50%;
        height:50%;
        padding-top: 50px;
        padding-bottom:50px;
    }

    .footer_middle {
        width: 50%;
        color: black;
        height: 70%;
        float:left;
        text-align:center;
    }

    .footer_middle .about {
        text-transform: capitalize;
        padding-left: 30px;
        padding-top: 45px;
    }

    .footer_left {
        width: 25%;
        color: black;
        height: 70%%;
        float: left;
        text-align:center;
    }

    .footer_left h1 {
        padding-left: 0px;
    }

#social{
    padding-left:100px;
    background-color:transparent;
}

    .instagram {
        width: 115px;
        height: 113px;
        display: block;
        background-image: url(images/white.png);
        background-position: 0 0;
        transition: all 0.3s .1s linear;
        float: left;
    }

    .instagram:hover {
        background-position: 0 -111px;
    }

    .facebook {
        width: 115px;
        height: 113px;
        display: block;
        background-image: url(images/white2.png);
        background-position: 0px 0px;
        margin-left: 111px;
        margin-bottom: 111px;
    }

    .facebook:hover {
        background-position: 0px -111px;
        transition: all 0.3s .1s linear;
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

    #userinfo {
        color: white;
        font-size: 25px;
        text-align: center;
    }

    style="color:white;"
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="userinfo">
            <?php if (isset($_SESSION['username'])) {
    echo "<h2>Welcome to our website " . $_SESSION['username'] . "!";
}?>

        </div>





        <!-################header###################################->
            <div id="header">
                <div id="subheader">
                    <div class="cantainer">
                        <img src="images/mainlogo.png" width="250px" height="150px">
                        <a class="main_buttons" href="logout.php">LOGOUT</a>
                        <a class="main_buttons" href="cart.php">CART</a>
                    </div>
                </div>
            </div>

            <!-#################slider############################->
                <div class="middle">
                    <div class="slider">
                        <img src="images/1.jpg">
                        <img src="images/2.jpg">
                        <img src="images/3.jpg">
                        <img src="images/4.jpg">
                    </div>
                </div>
                <br /><br /><br />
                <!-###################products##############################->
                    <div class="brand">
                        <h1 style="color:black;padding-top:10px;">BRANDS AVAILABLE</h1>
                        <div id="b1">
                            <span id="mi">

                                <a href="product.php?a=apple"><img src="images/apple.jpg"></a>
                            </span>
                            <span id="mi">
                                <a href="product.php?a=mi"><img src="images/mi.jpg"></a>
                            </span>
                            <span id="mi">
                                <a href="product.php?a=samsung"><img src="images/samsung.jpg"></a>
                            </span>
                        </div>
                        <div id="b2">
                            <span id="mi">
                                <a href="product.php?a=vivo"><img src="images/vivo.jpg"></a>
                            </span>
                            <span id="mi">
                                <a href="product.php?a=oppo"><img src="images/oppo.jpg"></a>
                            </span>
                            <span id="mi">
                                <a href="product.php?a=realme"><img src="images/realme.jpg"></a>
                            </span>
                        </div>

                        <!-########################footer##########################->
                            <footer class="footer">



                                <div class="footer_left">
                                    <h1>Follow Us On</h1>

                                    <div id="social">
                                        <a href="https://www.instagram.com/mohit_1607/" class="instagram"></a>
                                        <a href="https://www.facebook.com/profile.php?id=100007205018667" /
                                            class="facebook"> </a>
                                    </div>
                                </div>




                                <div class="footer_middle">
                                    <div class="about">
                                        <h1>ABOUT US</h1>
                                        <p>welcome to our online shopping website. We sell mobile of all major
                                            brands.</p>
                                        <p>THANKS PLEASE VISIT AGAIN!!!!!</p>
                                    </div>
                                </div>





                                <div class="footer_right">

                                    <img src="images/mainlogo.png">







                                </div>





                            </footer>





                    </div>







    </div>
</body>

</html>