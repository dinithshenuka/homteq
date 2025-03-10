<?php
$pagename="Home";
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

// DB connection
include ("db.php");

// Header
include ('../templates/headfile.html');

echo "<body>";
    

$SQL="select prodId, prodName, prodPicNameSmall from Product";


$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
echo "<table style='border: 0px'>";

echo "<div class='container'>";
echo "<div class='row'>";

while ($arrayp=mysqli_fetch_array($exeSQL))
{
    echo "<div class='col-sm-4'>";
    echo "<div class='card' style='width: 18rem;'>";
    echo "<img class='card-img-top' src='images/".$arrayp['prodPicNameSmall']."' alt='".$arrayp['prodName']."'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>".$arrayp['prodName']."</h5>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

echo "</div>";
echo "</div>";

// footer
include ('../templates/footfile.html');

echo "</body>";

?>