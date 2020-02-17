<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
	include ('connect.php');
	$connect = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['register'])){
    	$email=$_POST['email'];
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    	$password=password_hash($password, PASSWORD_DEFAULT);
    	$query = "SELECT * FROM users where email=:email or username='".$username."' ";
    //	$data = $connect->exec($query);
    	$stmt = $connect->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		if($stmt->rowCount() > 0)
    		echo "User already exists or username taken! reenter the credentials";
    	else
    	{
   		 $sql = "INSERT INTO users (username, password, Email)
    	VALUES ('$username', '$password', '$email')";
    	$connect->exec($sql);
    	echo "successful addition please login ";
    	header("location:login.php");
    }
    




    }
	?>
<form method="post">
	<table>
		<tr>
			<td>Email:<input type="email" name="email" placeholder="enter your email"></td>
		</tr>
		<tr>
			<td>Username:<input type="text" name="username" placeholder="enter your username"></td>
		</tr>

		<tr>
			<td>Password:<input type="password" name="password" placeholder="enter your password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="register" value="register"></td>
		</tr>
	</table>
</form>
</body>
</html>