<html>
<head><title>Lab F</title></head>
<body>
<h1> Order Comfirmation</h1>
<p>

</p>
<p>
<br>
</table>

<?php

//replace the following with your details. Dbname is your username by default.
$con = mysqli_connect("info20003db.eng.unimelb.edu.au","dejunx","051103","dejunx");
mysql_select_db("dejunx");
// Check connection
if (mysqli_connect_errno()) {
	echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}


$myNewCustomerDetail = $_POST['CustomerDetails'];
$myNewResponsibleStaffMember = $_POST['ResponsibleStaffMember'];
// $myNewQuantity = $_POST['Quantity'];
// $myNewHiddenSpaid = $_POST['hidden_spaid'];
// $myNewHiddenqis = $_POST['hidden_qis'];


//////////////////////////////////////////////////




 /*   foreach ($_POST['Quantity'] as $myNewQuantity ) {

        echo $myNewQuantity ;

    } 

        echo "<br>";
    foreach ($_POST['hidden_spaid'] as $myNewHiddenSpaid) {
        echo $myNewHiddenSpaid ;

    } 
        echo "<br>";*/



//..........INSERT A NEW ORDER.................
mysqli_autocommit($con, FALSE);

$sql = "INSERT INTO `Order` (RequestedTime,ResponsibleStaffMember,CustomerDetails) VALUES (now(),'$myNewResponsibleStaffMember','$myNewCustomerDetail')";

if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    echo "Order Number is: " . $last_id;
    echo "<br>";


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
echo "<br>";


//................INSERT INTO OrderLineItem AND UPDATE SPARULA TABLE.................

    $countlength=0;

    //     foreach ($_POST['Quantity'] as $val)
    //     {
    //     $myNewQuantity= $_POST['Quantity'][$i];
    //     $myNewHiddenSpaid = $_POST['hidden_spaid'][$i];
    //     $check = mysqli_query($con,"SELECT ProductName,QuantityInStock FROM Spatula WHERE idSpatula=$myNewHiddenSpaid");
        
    //     while($row = mysqli_fetch_array($check)) {
    //         if(($row['QuantityInStock']-$myNewQuantity)>=0){$countlength++;}}
    // } 



    
	$i = 0;
    foreach ($_POST['Quantity'] as $val) {
        $myNewQuantity= $_POST['Quantity'][$i];
        $myNewHiddenSpaid = $_POST['hidden_spaid'][$i];
        $myNewHiddenqis = $_POST['hidden_qis'][$i];
        $myNewHiddenpron = $_POST['hidden_pron'][$i];
        $check = mysqli_query($con,"SELECT ProductName,QuantityInStock FROM Spatula WHERE idSpatula=$myNewHiddenSpaid");

        $sql3 ="UPDATE Spatula SET QuantityInStock=QuantityInStock-$myNewQuantity WHERE idSpatula=$myNewHiddenSpaid";
        if ($res=mysqli_query($con, $sql3)) {
            // echo "Successfully Update current Stock.  " ;
            // // echo "$myNewHiddenSpaid";
            // // echo "$myNewHiddenqis";
            // // echo "$myNewQuantity";
            // echo "<br>";

        } else {
            $countlength++;
            $faileitem = mysqli_query($con,"SELECT ProductName FROM Spatula WHERE idSpatula=$myNewHiddenSpaid");
            while($row = mysqli_fetch_array($faileitem)) {echo "Opps,".$row['ProductName']." is out of order.";
            echo "<br>";}
            // echo "Error: " . $sql3 . "<br>" . mysqli_error($con);
        }
	    
       if ($myNewQuantity!=0){
        $sql2 = "INSERT INTO OrderLineItem (idSpatula, idOrder, Quantity) VALUES ($myNewHiddenSpaid,$last_id,$myNewQuantity)";
	    
        if ($res1=mysqli_query($con, $sql2)) {
            // echo "Successfully Insert into OrderLineItem.  " ;
            // echo "<br>";
        } else {
            // echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
        }
    }
        
        $i++;


        }

            echo "<br>";
         if($countlength==0){ 
            mysqli_commit($con);
            echo 'Order Has Been Placed'; 
        }else{
            mysqli_rollback($con);
            echo 'Sorry, Order is Unsuccessful'; }
            echo "<br>";
            echo $itemnostock;

        mysql_query("END"); 

        mysqli_autocommit($con, TRUE);
     







mysqli_close($con);
?>

</body>
</html>