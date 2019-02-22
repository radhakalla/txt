<?php
		$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "creditcardfrauddetection";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$a = $_GET['cartsno'];

	$sql = "delete from cart where sno=$a";

	$conn->query($sql);

	$conn->close();

	header('location:cart.php');
?>