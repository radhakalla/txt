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
	
	$a = $_POST['email'];
	$b = $_POST['password'];
	
	$sql = "SELECT * FROM customer where email='$a' and password='$b'";

	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		// output data of each row
		// , , , , 
		// store email into session
		$_SESSION['email']=$a;
		$_SESSION['customerid']=$row['cid'];
		$conn->close();
		header('Location: index.php?cid='.$_SESSION['customerid']);
	} else {
		$conn->close();
		header('Location: register.html');
	}

?> 
