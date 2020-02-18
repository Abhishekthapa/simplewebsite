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
        <a class="nav-link" href="add.php">ADD SOME MORE CONTENT</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="index.php">BACK</a>
      </li>
  </ul>
</div>
</nav>
	
	<?php
	//db connection
	include ('connect.php');
    $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM places";
    $data =$conn->query($query);
/*catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    exit();
    }*/
    //displaying the db 
  foreach ($data as $row)
    {
    	if ($row['verification']=='verified') {
	echo '<table class="Destinationstable">
			<tr>
				<th rowspan="9" width="150px" ></th><img runat="server" src="images/'.$row['photo'].'" width="100%" height="400px" >
				<th width="30px"> route:</th>
				<td>'.$row['route'].'</td>
			</tr>

			<tr>
				<th>cost: </th>
				<td>'. $row['cost'].'</td>
			</tr>

			<tr>
				<th>traveldays: </th>
				<td>'. $row['traveldays'] .'</td>
			</tr>
			<tr>
				<th>postedby: </th>
				<td>'. $row['posted_by'].'</td>
			</tr>

			<tr>
				<th>information: </th>
				<td>'. $row['information'].'</td>
			</tr>
		</table>' ;
	}
}
	?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
