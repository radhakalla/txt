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
	
	$a = $_POST['ProDescription'];
	$b = $_POST['ProName'];
	$c = $_POST['ProPrice'];
	$d = $_POST['ProQuantity'];
	$e = $_POST['CatId'];
	// $f = $_POST['propic'];

	$sql = "INSERT INTO productmaster (ProDescription, ProName, ProPrice, ProQuantity, CatId)
	VALUES ('$a', '$b', $c, $d, $e)";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "select max(proid) maxpid from productmaster";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$maxpid=$row["maxpid"];
	
	move_uploaded_file($_FILES["propic"]["tmp_name"], "productimages/".$maxpid.".jpg");

	$conn->close();
?> 

<a href='ProductDisplay.php'>Show All Products</a>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!--<?php
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
	
	$a = $_POST['ProDescription'];
	$b = $_POST['ProName'];
	$c = $_POST['ProPrice'];
	$d = $_POST['ProQuantity'];
	$e = $_POST['CatId'];
	// $f = $_POST['propic'];

	$sql = "INSERT INTO productmaster (ProDescription, ProName, ProPrice, ProQuantity, CatId)
	VALUES ('$a', '$b', $c, $d, $e)";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql = "select max(proid) maxpid from productmaster";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$maxpid=$row["maxpid"];
	
	move_uploaded_file($_FILES["propic"]["tmp_name"], "productimages/".$maxpid.".jpg");

	$conn->close();
?> 

<a href='ProductDisplay.php'>Show All Products</a> >