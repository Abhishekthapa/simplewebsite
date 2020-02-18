<?php
	//db connection
$update="no post request";
	include ('connect.php');
    $conn = new PDO($dsn, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data=$conn->prepare("SELECT * FROM places where verification='pending' ");
    $data->execute();
   
if ( $data->rowCount()  == 0) {
	echo $update;
	header('refresh:1; index.php');
}
else{
    $query = "SELECT * FROM places";
    $data =$conn->query($query);
/*catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    exit();
    }*/
    //displaying the db place table which are pending for approval
  foreach ($data as $row)
    {
    	if ($row['verification']=='pending') {
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
			<tr>
			<th rowspan="2"> action: </th>
			<th><form method="POST" action="placeupdate.php" >
			<input type = "hidden" name = "place_id" value = "'.$row['place_id'].'" />
			<input type="submit" name="accept" value="accept"/>
			<input type="submit" name="reject" value="reject"/>
			</form></th>
			</tr>
		</table>' ;
	}
}
}
?>