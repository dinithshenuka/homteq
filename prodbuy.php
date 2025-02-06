<?php

include ("db.php"); //include db.php file to connect to DB

$pagename="A smart buy for a smart home"; //create and populate variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";

include ("headfile.html");

echo "<h4>".$pagename."</h4>";

//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];
//display the value of the product id, for debugging purposes
echo "<p>Selected product Id: ".$prodid;

//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select prodId, prodName, prodPicNameSmall, prodDescripLong, prodPrice, prodQuantity 
from Product 
where prodId = $prodid";
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

echo "<table style='border: 0px'>";

//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{

    echo "<tr>";
    echo "<td style='border: 0px'>";

        //make the image into an anchor to prodbuy.php and pass the product id by URL (the id from the array)
        echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
            //display the small image whose name is contained in the array
            echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200>";
        echo "</a>";
    echo "</td>";
    echo "<td style='border: 0px'>";
        echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
        echo "<p><h3>".$arrayp['prodDescripLong']."</h3>"; // prod description
        echo "<p><h3>Price: $".$arrayp['prodPrice']."</h3>"; // prod price
        // Add a section of code to display the number of items left in stock.
        echo "<p><h3>Number in stock: ".$arrayp['prodQuantity']."</h3>";

        echo "<p>Number to be purchased: ";
    
        //create form made of one text field and one button for user to enter quantity
        //the value entered in the form will be posted to the basket.php to be processed
        echo "<form action=basket.php method=post>";
        echo "<input type=text name=p_quantity size=5 maxlength=3>";
        echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
        //pass the product id to the next page basket.php as a hidden value
        echo "<input type=hidden name=h_prodid value=".$prodid.">";
        echo "</form>";
        echo "</p>";
    
    echo "</td>";
echo "</tr>";
}
echo "</table>";



include ("footfile.html");
echo "</body>";
?>