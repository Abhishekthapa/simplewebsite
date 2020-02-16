<?php
session_start();
include ('connect.php');
 $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$usertype=$_POST['Usertype'];


$stmt = $conn->prepare("SELECT * from users WHERE username=:username");
$stmt->bindParam(':username', $username);
$stmt->execute();
    //$stmt->bindParam(':password', $password);
//    $stmt->bindParam(':usertype', $usertype);
$user=$stmt->fetch();
if ($stmt->rowCount() > 0){
	if (password_verify($password, $user['password']) && ($user['Usertype']==$usertype)){
		$_SESSION['username']=$username;
		$_SESSION['usertype']=$usertype;
		header("location:index.php");
           }
	else
	echo "enter correct credentials";
}
}


/*if(isset($_POST['Login'])){
 	$username=$_POST['username'];
 	$password=$_POST['password'];
 	$usertype=$_POST['usertype'];
 	$query = " SELECT * FROM users where username='".$username."' and password='".$password."' ";
 	$data =$conn->query($query) ;
 	$count=$data->rowCount();
 	 if($count>0)
 	 {
 	 	$_SESSION["username"]=$_POST['username'];
 	 	header("location:index.php");
 	 }
 	 else
 	 {
 	 	echo 'wrong data';
 	 	session_destroy();
 	 	header("refresh:2 ; location:login.php");
 	 }
 	}*/
 


	/*$emailErr=$passwordErr=$usernameErr="";
	$email=$password=$username="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["password"])) 
	$passwordErr = "password is required";
else 
	$password = $_POST["password"];
  
 if (empty($_POST["email"])) 
	$emailErr = "Email is required";
 else {
	$email =$_POST["email"];
	// check if e-mail address is well-formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	  $emailErr = "Invalid email format";
}
if (empty($_POST["username"])) 
	$usernameErr = "username is required";
  else {
	$username =$_POST["username"];
	
  }
}*/
?>


<!HTML DOCTYPE>
<html>
<head>
</head>
<body>	
<form method="POST">
	<table>
		<tr>
			<td>Username:<input type="text" name="username" placeholder="enter your username"></td>
		</tr>

		<tr>
			<td>Password:<input type="password" name="password" placeholder="enter your password"></td>
		</tr>
		<tr>
			<td>Select usertype:<select name="Usertype">
				<option value="admin">admin</option>
				<option value="user">user</option>
				<option value="superadmin">superadmin</option>
			</select></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="Login"></td>

		</tr>
		<tr>
			<td>Dont have an account? <a href="register.php">Register here</a>.</td>
		</tr>
	</table>
</form>
</body>
</html>
