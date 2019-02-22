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
	
	$a = $_GET['sno'];

	$sql = "delete from cart where sno=$a";

	if ($conn->query($sql) === TRUE) {
		echo " record deleted successfully";
		$conn->close();
		header('Location: viewcart.php');
	} else {
		$conn->close();
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

?> 