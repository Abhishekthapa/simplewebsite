<?php
session_start();
$message="";
include ('connect.php');
 $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*if(isset($_POST['Login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$usertype=$_POST['usertype'];
$password_hash=password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT * from users WHERE username=:username AND password=:password AND usertype=:usertype ");
$stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':usertype', $usertype);
$stmt->execute();
$row_count = $stmt->rowCount();
echo "". $row_count;
if($row_count>0){
if (password_verify($password, $password_hash)) {
    $_SESSION["username"]=$username;
    header("location: index.php");
    echo "Correct";
}
}
else {
    echo "user: " . $username. "<br>";
    echo "pass: " . $password_hash. "<br>";
    echo "Wrong Username or Password";
}
}*/

if(isset($_POST['Login'])){
 	$username=$_POST['username'];
 	$password=$_POST['password'];
 	$usertype=$_POST['usertype'];
 	$password=password_hash($password, PASSWORD_DEFAULT);
 	$query = " SELECT * FROM users where username='".$username."' and password='".$password."' ";
 	$data =$conn->query($query) ;
 	$count=$data->rowCount();
 	echo "string" .$count;
 	 if($count>0)
 	 {
 	 	$_SESSION["username"]=$_POST['username'];
 	 	header("location:index.php");
 	 }
 	 else
 	 {
 	 	$message='wrong data';
 	 }
 	}
 


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
			<td>Select usertype:<select name="usertype">
				<option value="admin">admin</option>
				<option value="user">user</option>
			</select></td>
		</tr>
		<tr>
			<td><input type="submit" name="Login" value="Login"></td>

		</tr>
		<tr>
			<td>Dont have an account? <a href="register.php">Register here</a>.</td>
		</tr>
	</table>
</form>
</body>
</html>
