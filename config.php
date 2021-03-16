<?php
	$servername = "localhost";
	$username = "id16371812_root";
	$password = "Mypassword@12345";
	$dbname = "id16371812_sparks";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}
?>