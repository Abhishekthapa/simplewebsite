<?php
session_start();
//connecting database
include ('connect.php');
 $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //taking the input data
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$usertype=$_POST['Usertype'];

//checking if the data entered exist in database
$stmt = $conn->prepare("SELECT * from users WHERE username=:username");
$stmt->bindParam(':username', $username);
$stmt->execute();
   
$user=$stmt->fetch();
//verifying valid user
if ($stmt->rowCount() > 0){
	if (password_verify($password, $user['password']) && ($user['Usertype']==$usertype)){
		$_SESSION['username']=$_POST['username'];
		$_SESSION['usertype']=$_POST['Usertype'];
		$_SESSION['User_id']=$user['User_id'];
			header("location:index.php");
			 }
		else
			echo "enter correct credentials or you might have been promoted to admin";
          
	
}
else
	echo "enter correct credentials or you might have been promoted to admin";
}

?>