<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must login first";
    header("location:login.php");
}

include_once 'server.php';
$connect = mysqli_connect("localhost", "root", "", "testing");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['a'])) {
    $_SESSION['branding'] = $_GET['a'];
}
$xyz = $_SESSION["branding"];

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"],
                'item_quantity' => (int) $_POST["quantity_1"],
            );
            array_push($_SESSION["shopping_cart"], $item_array);
        } else {
            echo '<script>alert("item already added")</script>';
            echo '<script>window.location="product.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => (int) $_POST["quantity_1"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }

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
        /*background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%); */
        background: url(background-images/everything.jpg) no-repeat;
        background-size: cover;
    }
    }



    #quantity_input {
        overflow: hidden;
        background: none;
        width: 30px;
    }


    .each_mobile {
        width: auto;
        float: left;
        margin: 20px;
        color: black;
        text-align:center;
    }



    .mobiles {

        height: auto;
    }

    #carttable {
        color: white;
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
        text-align: center;
    }

    .footer_right img {
        width: 50%;
        height: 50%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .footer_middle {
        width: 50%;
        color: black;
        height: 70%;
        float: left;
        text-align: center;
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
        text-align: center;
    }

    .footer_left h1 {
        padding-left: 0px;
    }

    #social {
        padding-left: 100px;
        background-color: transparent;
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

    .add_to_cart_button {
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

    .add_to_cart_button:hover {
        cursor: pointer;
        background-color: #ffff00;
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
    </style>
</head>

<body>
    <div id="wrapper">






        <!-################header###################################->
            <div id="header">
                <div id="subheader">
                
                    <div class="cantainer">
                    <img src="images/mainlogo.png" width="250px" height="150px">
                        <a class="main_buttons" href="logout.php">LOGOUT</a>
                        <a class="main_buttons" href="cart.php">CART</a>
                        <a class="main_buttons" href="index.php">HOMEPAGE</a>
                    </div>
                </div>
            </div>

            <!-###################products##############################->

                <div>
                    <div align="center" style="color:white;padding-top:10px;font-size:50px;"><strong>AVAILABLE
                            MODELS</strong></div>
                    <?php
$sql_query = "SELECT * FROM products WHERE brand = '$xyz'";
$result = mysqli_query($connect, $sql_query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>

                    <div class="mobiles">
                        <form method='POST' action='product.php?action=add&id=<?php echo $row["id"]; ?>'>

                            <div class="each_mobile">
                                <img src="images/<?php echo $xyz; ?>/<?php echo $row['image']; ?>"><br />
                                <h2><?php echo $row['productname']; ?></h2><br />
                                <h3>₹ <?php echo $row['price']; ?></h3><br />
                                <input id="quantity_input" type="text" value="1" name="quantity_1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row['productname']; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
                                <input type="submit" name="add_to_cart" value="Add to cart" class="add_to_cart_button">
                            </div>
                        </form>
                    </div>

                    <?php }}?>

                </div>

                <div style="clear:both;"></div>
                <br />

                <!-########################footer##########################->
                    <footer class="footer">



                        <div class="footer_left">
                            <h1>Follow Us On</h1>

                            <div id="social">
                                <a href="https://www.instagram.com/mohit_1607/" class="instagram"></a>
                                <a href="https://www.facebook.com/profile.php?id=100007205018667" / class="facebook">
                                </a>
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