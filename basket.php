<?php

session_start();

include ("db.php"); //include db.php file to connect to DB

$pagename="Smart Basket"; //create and populate variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";

include ("headfile.html");

echo "<h4>".$pagename."</h4>";

//capture the ID of selected product using the POST method and the $_POST superglobal variable
//and store it in a new local variable called $newprodid
//capture the required quantity of selected product using the POST method and $_POST superglobal variable
//and store it in a new local variable called $reququantity
//Display id of selected product
//Display quantity of selected product
$newprodid = $_POST['h_prodid'];
$reququantity = $_POST['p_quantity'];

// echo "<p>Selected product Id: ".$newprodid;            // no need after adding if condition
// echo "<p>Quantity of product: ".$reququantity;

//create a new cell in the basket session array. Index this cell with the new product id.
//Inside the cell store the required product quantity
$_SESSION['basket'][$newprodid]=$reququantity;
// echo "<p>1 item added";


if (isset($_POST['h_prodid'])) {
    //capture the ID of selected product using the POST method and the $_POST superglobal variable
    //and store it in a new local variable called $newprodid
    //capture the required quantity of selected product using the POST method and $_POST superglobal variable
    //and store it in a new local variable called $reququantity
    $newprodid = $_POST['h_prodid'];
    $reququantity = $_POST['p_quantity'];

    //Display id of selected product
    echo "<p>Selected product Id: ".$newprodid;
    //Display quantity of selected product
    echo "<p>Quantity of product: ".$reququantity;

    //create a new cell in the basket session array. Index this cell with the new product id.
    //Inside the cell store the required product quantity
    $_SESSION['basket'][$newprodid] = $reququantity;

    //Display "1 item added to the basket " message
    echo "<p>1 item added to the basket";
} else {
    //Display "Basket unchanged " message
    echo "<p>Basket unchanged";
}


include ("footfile.html");
echo "</body>";
?>