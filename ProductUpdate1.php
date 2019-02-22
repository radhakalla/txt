<h1>my super site</h1>

<h2>Product Updation Page </h2>

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
	
	$sql = "SELECT * FROM PRODUCTMASTER where proid=".$_GET['pid'];

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$a=$row["ProId"];
	$b=$row["ProDescription"];
	$c=$row["ProName"];
	$d=$row["ProPrice"];
	$e=$row["ProQuantity"];
	$f=$row["CatId"];

	$conn->close();

?>

<form action='ProductUpdate2.php'>
	<input type='hidden' name='ProId' value='<?php echo $a ?>' /> 
	Product Description, <input type='text' name='ProDescription' value='<?php echo $b ?>' /> <br/>
	Product Name, <input type='text' name='ProName'  value='<?php echo $c ?>' /> <br/>
	Product Price, <input type='text' name='ProPrice'  value='<?php echo $d ?>' /> <br/>
	Product Quantity, <input type='text' name='ProQuantity'  value='<?php echo $e ?>' /> <br/>
	Category Id<input type='text' name='CatId'  value='<?php echo $f ?>' /> <br/>
	<input type='submit'  /> <br/>
</form>