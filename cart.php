<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must login first";
    header("location:login.php");
}
include_once 'server.php';
$database = new server();
$connect = $database->openConnection();

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $key => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}

if (isset($_POST["place_order"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $tempname = $_SESSION["username"];
        $tempnumber = $_SESSION["phonenumber"];
        foreach ($_SESSION["shopping_cart"] as $k => $v) {
            $temppro = $v["item_name"];
            $tempquan = $v["item_quantity"];
            $sql_query = "INSERT INTO `ordering` VALUES (NULL,'$tempname','$tempnumber','$temppro',$tempquan)";
            $user = $connect->query($sql_query);

        }
    }
    foreach ($_SESSION["shopping_cart"] as $key => $values) {
        unset($_SESSION["shopping_cart"][$key]);}
    header("location:order.php");
}

$database->closeConnection();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(background-images/everything.jpg) no-repeat;
        background-size: cover;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin-top: 8%;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
        border: 1px solid black;
        font-size: 30px;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
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

    #log {
        text-align: center;
    }

    #place_button {
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

    #place_button:hover {
        cursor: pointer;
        background-color: #ffff00;
    }

    #order_place {
        margin-left: auto;
        margin-right: auto;
        width: 20%;
    }
    </style>
    <script>
    function mouseover() {
        document.getElementById("place_button").style.borderColor = "red";
    }

    function mouseout() {
        document.getElementById("place_button").style.borderColor = "green";
    }
    </script>
</head>

<body>

    <div id="log">
        <?php if (isset($_SESSION['username'])) {
    echo "<h2>This is your Shopping cart, " . $_SESSION['username'] . "!";
}
?>
    </div>
    <div id="header">
        <div id="subheader">
            <div class="cantainer">
                <img src="images/mainlogo.png" width="250px" height="150px">
                <a class="main_buttons" href="logout.php">LOGOUT</a>
                <a class="main_buttons" href="index.php">HOMEPAGE</a>
            </div>
        </div>
    </div>
    <div style="text-align:center; font-size:70px; font-weight:bold; color:white;"> CART </div>
    <div id="table" style="overflow-x:auto;">

        <table id="carttable">
            <tr>
                <th width=40%> Item name </th>
                <th width=10%> Quantity </th>
                <th width=20%> Price </th>
                <th width=15%> Total </th>
                <th width=5%> Action </th>
            </tr>
            <?php
if (!empty($_SESSION["shopping_cart"])) {
    $total = 0;
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        ?>
            <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td><?php echo $values["item_quantity"]; ?></td>
                <td><?php echo $values["item_price"]; ?></td>
                <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>
                </td>
                <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span>Remove</span></a>
                </td>

                <?php
$total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
    ?>
            <tr>
                <td colspan='3' align="right"><strong>TOTAL</strong></td>
                <td colspan='2 ' align="right"><strong>₹<?php echo $total ?></strong></td>
            </tr>
            <?php }?>
        </table>
        <div id="order_place">
            <form method="POST" action="">
                <input type="submit" value="PLACE ORDER" name="place_order" id="place_button" onMouseOver="mouseover()"
                    onMouseOut="mouseout()">
            </form>
        </div>
    </div>

</body>

</html>