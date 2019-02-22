 <?php
 session_start();
 ?>
 
 <h1>invoice</h1>
 
 <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "creditcardfrauddetection";
	
		$a = $_SESSION['customerid'];
	
	$sql = "SELECT * from salesmaster";

	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		// , , , , 
		$total = 0;
		while($row = $result->fetch_assoc()) 
		{
			$total = $total + $row["ProPrice"] * $row['quantity'];


		}
		

	$conn->close();
?> 

