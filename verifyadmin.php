<?php
$update="no admin request";//global variable
include ('connect.php');
    $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $data=$conn->prepare("SELECT * FROM users where wantadmin='1' ");
    $data->execute();
   
if ( $data->rowCount()  == 0) {
	echo $update;
	header('refresh:1; index.php');
}
else{
	$query = "SELECT * FROM users where wantadmin='1' ";
	$data=$conn->query($query);
foreach($data as $row)
{
	echo '<table>
	<tr>
	<th>Username: </th>
	<th>'.$row['username'].'</th>
	</tr>
	<tr>
	<th >email: </th>
	<th>'.$row['Email'].'</th>
	</tr>
	<tr>
	<th> action: </th>

	<th><form method="POST" action="adminupdate.php">
	<input type = "hidden" name = "username" value = "'.$row['username'].'" />
	<input type="submit" name="accept" value="accept"/>
	<input type="submit" name="reject" value="reject"/>

</form>
</th>
	</tr>

</table>' ;	
}
}
/*<input type="button" name="accept" value="accept" onclick="accept('.$row['username'].')">
	<input type="button" name="reject" value="reject" onclick="reject('.$row['username'].')">*/
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
</body>
</html>