<?php
	$servername = "localhost";
	$username = "id16399168_root1";
	$password = "Mypassword@123";
	$dbname = "id16399168_sparks";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}
?>