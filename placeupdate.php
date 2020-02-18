
<?php
include ('connect.php');
    $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //if superadmin upgrades user to admin
if(isset($_POST['accept'])){
	$placeid=$_POST['place_id'];
	$update="UPDATE  places
    SET verification='verified'
    WHERE places.place_id ='$placeid' ";
    	$data1 =$conn->query($update);
    header('location:verifypost.php');
}
//if superadmin doesnt approve
	if(isset($_POST['reject'])){
	$placeid=$_POST['place_id'];
	$update="DELETE FROM  places
    WHERE places.place_id ='$placeid' ";
    	$data1 =$conn->query($update);
    header('location:verifypost.php');
}



?>