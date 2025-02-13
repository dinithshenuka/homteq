<?php
session_start();
include ("db.php"); //include db.php file to connect to DB

$pagename="Smart Basket"; //create and populate variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";

include ("headfile.html");

echo "<h4>".$pagename."</h4>";

if (isset($_POST['h_prodid'])) {
    $newprodid = $_POST['h_prodid'];
    $reququantity = $_POST['p_quantity'];
    echo "<p>Selected product Id: ".$newprodid;
    $_SESSION['basket'][$newprodid] = $reququantity;
    echo "<p>1 item added";
} else {
    echo "<p>Basket unchanged";
}

$total = 0;
echo "<table border='1'>";
echo "<tr>";
echo "<th>Product Name</th>";
echo "<th>Price</th>";
echo "<th>Quantity</th>";
echo "<th>Subtotal</th>";
echo "</tr>";

if (isset($_SESSION['basket'])) {
    $productFound = false;
    foreach ($_SESSION['basket'] as $index => $value) {
        $stmt = $conn->prepare("SELECT prodName, prodPrice FROM Product WHERE prodId = ?");
        $stmt->bind_param("i", $index);
        $stmt->execute();
        $result = $stmt->get_result();
        $arrayp = $result->fetch_assoc();

        if ($arrayp) {
            $productFound = true;
            echo "<tr>";
            echo "<td>".$arrayp['prodName']."</td>";
            echo "<td>".$arrayp['prodPrice']."</td>";
            echo "<td>".$value."</td>";
            $subtotal = $arrayp['prodPrice'] * $value;
            echo "<td>".$subtotal."</td>";
            $total += $subtotal;
            echo "</tr>";
        }
    }
    if (!$productFound) {
        echo "<tr><td colspan='4'>Product not found</td></tr>";
    }
    echo "<tr>";
    echo "<td colspan='3'>Total</td>";
    echo "<td>".$total."</td>";
    echo "</tr>";
} else {
    echo "<p>Basket is empty</p>";
}

echo "</table>";

// clear the basket
echo "<p><a href='clearbasket.php'>Clear Basket</a></p>";

// signup and login links
echo "<p><a href='signup.php'>Sign Up</a></p>";
echo "<p><a href='login.php'>Log In</a></p>";

include("footfile.html");
echo "</body>";
?>