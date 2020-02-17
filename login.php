<?php
include ('validuser.php');
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
