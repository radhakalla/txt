
<head>
  <title>Credit Card Fraud Detection</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<a href='ProductInsert.html'>Add New Product</a>

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
	
	$sql = "SELECT * FROM PRODUCTMASTER";

	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		// , , , , 
		echo "<table border='1' class='table table-striped'>";
			echo "<tr>";
			echo "<th>id: </th><th> ProDescription: </th><th>ProName";
			echo "</th><th>ProPrice: </th><th> ProQuantity: </th><th> CatId</th>";
			echo "<th>Pic</th><th></th><th></th>";
			echo "</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			$a=$row["ProId"];
			echo "<td>" . $row["ProId"]. "</td><td> " . $row["ProDescription"]. " </td><td> " . $row["ProName"]. "";
			echo "</td><td> : " . $row["ProPrice"]. " - </td><td> : " . $row["ProQuantity"]. " </td><td> " . $row["CatId"]. "</td> ";
			echo "<td><img width='200px' height='200px' src='productimages/".$row["ProId"].".jpg' /></td>";
			echo "<td><a href='ProductUpdate1.php?pid=$a'>edit</a></td>";
			echo "<td><a href='ProductDelete.php?pid=$a'>delete</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}

	$conn->close();
?> 
