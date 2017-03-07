<html>
<head><title>Lab F</title></head>
<body>
<h1> Order</h1>
<p>
Order Cart
</p>
<p>
<br>
</table>


<?php

//replace the following with your details. Dbname is your username by default.
$con = mysqli_connect("info20003db.eng.unimelb.edu.au","dejunx","051103","dejunx");

// Check connection
if (mysqli_connect_errno()) {
	echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}

///////////////////////////////////TRY INSERT////////////////////////////////

echo "<form method='POST' action='InsertValue.php' >";
echo "Customer Detail:<br>";
echo "<input type='text' style=width:300px;height:100px; name='CustomerDetails' /><br><br>";

echo "Responsible Staff Member:";
echo "<input type='text' name='ResponsibleStaffMember' /><br>";
echo "<br>";	



////////////////////////////////////////////////////////////////////////////
/* this lists the name and release date of all action movies */ 

echo "<table border='1'>";

$result = mysqli_query($con,"SELECT idSpatula,ProductName,Type,Size,Colour,Price,QuantityInStock FROM Spatula WHERE QuantityInStock!=0");

echo "<tr>";
echo "<td>" . 'Spatula ID' . "</td><td>" . 'Name' . "</td><td>" . 'Type'. "</td><td>" . 'Size'. "</td><td>" . 'Colour'. "</td><td>" . 'Price'. "</td><td>" . 'Quantity Currently In Stock'. "</td><td>" . 'Order Quantity'. "</td><td>" . ' '. "</td>";
echo '</tr><tr>';



while($row = mysqli_fetch_array($result)) {

echo "<td>" . $row['idSpatula']. "</td><td>" . $row['ProductName'] . "</td><td>".$row['Type']."</td><td>". $row['Size'] ."</td><td>". $row['Colour'] ."</td><td>". $row['Price'] ."</td><td>". $row['QuantityInStock'] ."</td>";
$spa_id = $row['idSpatula'];
$qsi = $row['QuantityInStock'];
$pron = $row['ProductName'];
echo "<td>";
echo "<input type='text' name='Quantity[]' value=0  />";
echo "</td>";
echo "<td>";
echo "<input type='hidden' name='hidden_spaid[]' value=$spa_id />";
echo "<input type='hidden' name='hidden_qis[]' value=$qsi />";
echo "<input type='hidden' name='hidden_pron[]' value=$pron />";
echo "</td>";
echo "</tr>";

}
echo "</table>";

echo "<br>";
echo "<input type='submit' value='submit' />";
echo "</form>";


mysqli_close($con);
?>

</body>
</html>