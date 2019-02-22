
<head>
  <title>Credit Card Fraud Detection</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<h2>view cart</h2>

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
	
	$sql = "SELECT c.sno, c.productid, pm.ProName, c.quantity, pm.ProPrice FROM cart c, productmaster pm where c.productid=pm.ProId";// where customerid=$a";

	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		// , , , , 
		echo "<table border='1' class='table table-striped'>";
			echo "<tr>";
			echo "<th>id: </th><th>ProductId";
			echo "</th><th> ProductName: </th><th> Price: </th><th> ProQuantity: </th>";
			echo "</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			$a=$row["sno"];
			echo "<td>" . $row["sno"]. "</td><td> " . $row["productid"]. "</td><td> " . $row["ProName"]. " </td><td> " . $row["ProPrice"]. " </td>";
			echo "<td> " . $row["quantity"]. " </td>";
			echo "<td><a href='CartDelete.php?sno=$a'>delete</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}

	$conn->close();
?> 
