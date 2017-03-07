<html>
<head><title>Browse</title></head>
<body>
<h1> Browse</h1>
<p>
Search for your SPATULA!!
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

echo "<form method='POST' action='SearchValue.php' >";
echo "Spatula name: ";
echo "<input type='text' name='spatulaname' /><br><br>";
////////////////////Show Types///////////////////////////////////////
// echo "<p> -- select type --</p>";

$result = mysqli_query($con,"SELECT DISTINCT Type FROM Spatula");


echo "<select name='spatulatype' >";
echo "<option value=''>";
echo "select type";
echo "</option>";
while($row = mysqli_fetch_array($result)) {
echo "<option value='" . $row['Type'] . "'>";
echo $row['Type'];
"</option>";

}
echo "</select>";


////////////////////////////////////////////////////////////////////

echo "<br><br>";
echo "Size: ";
echo "<input type='text' name='searchsize' /><br>";
echo "Colour: ";
echo "<input type='text' name='searchcolour' /><br>";
echo 'Price ($AU): ';
echo "<input type='text' name='searchprice' /><br>";
echo "<br>";	



////////////////////////////////////////////////////////////////////////////
/* this lists the name and release date of all action movies */ 



echo "</table>";

echo "<br>";
echo "<input type='submit' value='Search..' />";
echo "</form>";


mysqli_close($con);
?>

</body>
</html>