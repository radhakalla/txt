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
	
	$a = $_GET['ProId'];
	$b = $_GET['ProDescription'];
	$c = $_GET['ProName'];
	$d = $_GET['ProPrice'];
	$e = $_GET['ProQuantity'];
	$f = $_GET['CatId'];

	$sql = "UPDATE productmaster set ProDescription='$b', ProName='$c', ProPrice=$d, ProQuantity=$e, CatId=$f where proid=$a";

	if ($conn->query($sql) === TRUE) {
		//echo " record updated successfully";
		header('Location: ProductDisplay.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?> 