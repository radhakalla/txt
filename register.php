<?php
	session_start();
?>
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
	
	$a = $_POST['email'];
	$b = $_POST['password'];
	$c = $_POST['firstname'];
	$d = $_POST['lastname'];
	$e = $_POST['phoneno'];
	$f = $_POST['address'];
	$g = $_POST['gender'];

	$sql = "INSERT INTO customer (email, password, firstname, lastname, phoneno,address,gender)
	VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g')";

	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully";
		// store email in session 
		$_SESSION['email']=$a;
		header('Location: index.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
/*	$sql = "select max(proid) maxpid from productmaster";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$maxpid=$row["maxpid"];
	
	move_uploaded_file($_FILES["propic"]["tmp_name"], "productimages/".$maxpid.".jpg");
*/

	$conn->close();
	
	
?> 

<?php 
	require('maildemoheader.php');
    $mail->addAddress($a, 'vj');     // Add a recipient
    //$mail->addAttachment('images/banner-02.jpg', 'new.jpg');    // working; Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'thank q';
    $mail->Body    = 'WElcome onboard <b>happy stay!</b>';
	require('maildemofooter.php');
?>


<a href='ProductDisplay.php'>Show All Products</a>