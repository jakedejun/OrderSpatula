<html>
<head><title>Spatula Detail</title></head>
<body>
<h1>Here is the detials of the spatula. </h1>
<p>

</p>
<p>
<br>
</table>

<?php

$con = mysqli_connect("info20003db.eng.unimelb.edu.au","dejunx","051103","dejunx");
mysql_select_db("dejunx");

// Check connection
if (mysqli_connect_errno()) {
	echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}

///////////////////////////////////TRY INSERT////////////////////////////////

// $myNewsearchsize = $_POST['searchsize'];
// $myNewspatulaname = $_POST['spatulaname'];
// $myNewsearchcolour = $_POST['searchcolour'];
// $myNewsearchprice = $_POST['searchprice'];
// $myNewspatulatype = $_POST['spatulatype'];



////////////////////////////////////////////////////////////////////////////
/* this is to select the results*/ 

$sql_string = "SELECT * FROM Spatula";

if (isset($_GET['idSpatula'])) {

//There is a movie_id in the URL
$sql_string = $sql_string . " WHERE idSpatula = " . $_GET['idSpatula'];

}


$result = mysqli_query($con,$sql_string);


echo "<table border='1'>";

echo "<tr>";
echo "<td>" . 'Spatula ID' . "</td><td>" . 'Name' . "</td><td>" . 'Type'. "</td><td>" . 'Size'. "</td><td>" . 'Colour'. "</td><td>" . 'Price'. "</td><td>" . 'Quantity Currently In Stock'. "</td>";
echo '</tr><tr>';



while($row = mysqli_fetch_array($result)) {

echo "<td>" . $row['idSpatula']. "</td><td>" . $row['ProductName'] . "</td><td>".$row['Type']."</td><td>". $row['Size'] ."</td><td>". $row['Colour'] ."</td><td>". $row['Price'] ."</td><td>". $row['QuantityInStock'] ."</td>";
echo "</tr>";

}
echo "</table>";






mysqli_close($con);
?>

</body>
</html>