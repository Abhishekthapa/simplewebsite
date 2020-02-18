<?php
session_start();
if(!isset($_SESSION['username']))
{
  echo"please log in";
    // not logged in
    header('refresh:2;index.php');
    exit();
}
else{
include('connect.php');
$conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//geting submitted data
    if (isset($_POST['add'])) {
    	$route=htmlspecialchars($_POST['route']);
    	$cost=$_POST['cost'];
    	$traveldays=$_POST['traveldays'];
    	$postedby=$_SESSION['username'];
    	$information=htmlspecialchars($_POST['information']);
    	$imgFile = $_FILES['image']['name'];
 		 $tmp_dir = $_FILES['image']['tmp_name'];
  		$imgSize = $_FILES['image']['size'];

  		
   		$upload_dir = 'images/'.basename($imgFile); // upload directory

 
  		 $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   		// valid image extensions
   		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
   		// allow valid image file formats
   		if(in_array($imgExt, $valid_extensions)){   
    	// Check file size '5MB'
     	move_uploaded_file($tmp_dir,$upload_dir);
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
    echo  $errMSG . '<br> please re enter the data';

   }
  
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $conn->prepare('INSERT INTO places(route,cost,traveldays,photo,information,posted_by) VALUES (:route,:cost,:traveldays,:photo,:information,:posted_by)');
   $stmt->bindParam(':route',$route);
   $stmt->bindParam(':cost',$cost);
   $stmt->bindParam(':traveldays',$traveldays);
   $stmt->bindParam(':photo',$imgFile);
   $stmt->bindParam(':information',$information);
   $stmt->bindParam(':posted_by',$postedby);
   
   
   if($stmt->execute())
   {
   $successMSG = "new record succesfully inserted waiting for admin approval...";
   echo $successMSG;
    header("refresh:2 ;index.php"); // redirects image view page after 2 seconds.
   }
   else
   {
    $errMSG = "error while inserting....";
   }
  }
 }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
       <li class="nav-item active">
        <a class="nav-link" href="index.php">BACK</a>
      </li>
  </ul>
</div>
</nav>
<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>ROUTE:<input type="text" name="route" placeholder="enter route"></td>
		</tr>
		<tr>
			<td>Cost:<input type="number" name="cost" placeholder="enter cost"></td>
		</tr>

		<tr>
			<td>Traveldays:<input type="number" name="traveldays" placeholder="enter days needed"></td>
		</tr>
		
			<tr>
			<td>image:<input type="file" name="image"  /></td>
		</tr>
		<tr>
			<td>Information:<input type="text" name="information" placeholder="detail the place"></td>
		</tr>
		<tr>
			<td><input type="submit" name="add" value="add"></td>
		</tr>
	</table>
	
</body>
</html>
