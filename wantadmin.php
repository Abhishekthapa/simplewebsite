<?php
session_start();
$msg= "your a/c having username: ". $_SESSION['username'] . " has requested for adminship please wait for sysadmin approval";
	include ('connect.php');
    $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $wantadmin=1;
    $userid=$_SESSION['User_id'];
    //updating user table
    $query = "UPDATE  users
    		SET wantadmin='1'
    		WHERE User_id='$userid'";
    $data =$conn->query($query);
    echo $msg;
header('refresh:2 ; index.php');

?>