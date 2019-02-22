 <?php
	session_start();
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
	
	$a = $_SESSION['customerid'];
	$b = substr($_GET['pid'],1);

	$sql = "INSERT INTO cart (customerid, productid, quantity)
	VALUES ('$a', '$b', 1)"; // todo quantity

	if ($conn->query($sql) === TRUE) {
		header('Location: cart.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
?> 

<a href='ProductDisplay.php'>Show All Products</a>