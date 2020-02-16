<?php
include('connect.php');
$conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['add'])) {
    	$route=$_POST['route'];
    	$cost=$_POST['cost'];
    	$traveldays=$_POST['traveldays'];
    	$postedby=$_POST['postedby'];
    	$information=$_POST['information'];
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
   $successMSG = "new record succesfully inserted ...";
    header("refresh:2 ;destination.php"); // redirects image view page after 2 seconds.
   }
   else
   {
    $errMSG = "error while inserting....";
   }
  }
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
			<td>postedby:<input type="text" name="postedby" placeholder="enter your name "></td>
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
