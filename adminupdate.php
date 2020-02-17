<?php
include ('connect.php');
    $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //if superadmin upgrades user to admin
if(isset($_POST['accept'])){
	$username=$_POST['username'];
	$update="UPDATE  users
    SET wantadmin='0',Usertype='admin'
    WHERE username ='$username' ";
    	$data1 =$conn->query($update);
    header('location:verifyadmin.php');
}
//if superadmin doesnt approve
if(isset($_POST['reject'])){
	$username=$_POST['username'];
	echo $username;
	$update="UPDATE  users
    SET wantadmin='0'
    WHERE username ='$username' ";
    	$data1 =$conn->query($update);
    	header('location:verifyadmin.php');
}

?>