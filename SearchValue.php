<html>
<head><title>Results</title></head>
<body>
<h1> Results</h1>
<p>
Here are your result.
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

$myNewsearchsize = $_POST['searchsize'];
$myNewspatulaname = $_POST['spatulaname'];
$myNewsearchcolour = $_POST['searchcolour'];
$myNewsearchprice = $_POST['searchprice'];
$myNewspatulatype = $_POST['spatulatype'];



////////////////////////////////////////////////////////////////////////////
/* this is to select the results*/ 

echo "<table border='1'>";

$result = mysqli_query($con,"SELECT idSpatula,ProductName,Type,Size,Colour,Price,QuantityInStock FROM Spatula WHERE ProductName LIKE '%{$myNewspatulaname}%' AND Type = '$myNewspatulatype' OR Size ='$myNewsearchsize' OR Colour='$myNewsearchcolour' OR Price <='$myNewsearchprice' ");

echo "<tr>";
echo "<td>" . 'Spatula ID' . "</td><td>" . 'Name' . "</td>";
echo '</tr><tr>';



while($row = mysqli_fetch_array($result)) {

echo "<td>" . $row['idSpatula']. "</td>";
echo "<td><a href='spatuladetail.php?idSpatula=" . $row['idSpatula'] . "'> " . $row['ProductName'] . "</a></td>";
echo "</tr>";

}
echo "</table>";





mysqli_close($con);
?>

</body>
</html>