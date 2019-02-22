<?php
	session_start();
	$currenttime = time();
	$otpsendtime = $_SESSION['otpsendtime'];
	
	if( $currenttime - $otpsendtime > 2000 )
	{
		echo "otp expired <a href='index.php'>home</a>";
	}
	else
	{

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
	/*	
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
	*/
		$conn->close();

		
		move_uploaded_file($_FILES["slice"]["tmp_name"], "slice1_upload.jpg");
		
		// merge slice1 and slice2
	

?> 

<table>
	<tr><td>slice1_upload:</td><td><img width='300'  src='slice1_upload.jpg' /></td></tr>
	<tr><td>slice2:</td><td><img width='300' src='slice2.jpg' /></td></tr>


<br/>


<br/>

<?php
		$ims1 = ImageCreateFromJpeg('slice1.jpg'); 
		$ims2 = ImageCreateFromJpeg('slice2.jpg'); 	
?>

<?php 
	//$source_file = "Desert.jpg";
	//$im = ImageCreateFromJpeg($source_file); 
	$imgw = imagesx($ims1);
	$imgh = imagesy($ims1);
	$immrg= imagecreatetruecolor($imgw, $imgh);

	$c1=0;
	$c2=0;
	for ($i=0; $i<$imgw; $i++)
	{
			for ($j=0; $j<$imgh; $j++)
			{
					$rgb = ImageColorAt($ims1, $i, $j); 
					$val1=$rgb;
					// extract each value for r, g, b
					$rr = ($rgb >> 16) & 0xFF;
					$gg = ($rgb >> 8) & 0xFF;
					$bb = $rgb & 0xFF;
					// get the Value from the RGB value
					$g1 = round(($rr + $gg + $bb) / 3);			

					$rgb = ImageColorAt($ims2, $i, $j); 
					$val2=$rgb;
					// extract each value for r, g, b
					$rr = ($rgb >> 16) & 0xFF;
					$gg = ($rgb >> 8) & 0xFF;
					$bb = $rgb & 0xFF;
					// get the Value from the RGB value
					$g2 = round(($rr + $gg + $bb) / 3);			

					$val = imagecolorallocate($immrg, 0,0,0);
					imagesetpixel($immrg, $i, $j, $g1<$g2 ?$val1:$val2);

			}
	}
	//echo $c1.'<br/>'.$c2;
	$immrgresize= imagecreatetruecolor($imgw/2, $imgh/2);
	imagecopyresampled($immrgresize, $immrg, 0, 0, 0, 0, $imgw/2, $imgh/2, $imgw, $imgh);
	imagejpeg($immrgresize, 'merged.jpg');

?>

	<tr><td>merged:</td><td><img width='300' src='merged.jpg' /></td></tr>
	<tr><td>original:</td><td><img width='300' src='gray2.jpg' /></td></tr>
	<tr><td></td><td></td></tr>
</table>


<a href='#'>--</a>

<?php
		// comparision
		
		$ims1 = ImageCreateFromJpeg('slice1_upload.jpg'); 
		$ims2 = ImageCreateFromJpeg('slice1.jpg'); 	
		$imgw = imagesx($ims1);
		$imgh = imagesy($ims1);

		$cnt=0;
		
		for ($i=0; $i<$imgw; $i++)
		{
				for ($j=0; $j<$imgh; $j++)
				{
			try{
						$rgb = ImageColorAt($ims1, $i, $j); 
						$val1=$rgb;
						// extract each value for r, g, b
						$rr = ($rgb >> 16) & 0xFF;
						$gg = ($rgb >> 8) & 0xFF;
						$bb = $rgb & 0xFF;
						// get the Value from the RGB value
						$g1 = round(($rr + $gg + $bb) / 3);			

						$rgb = ImageColorAt($ims2, $i, $j); 
						$val2=$rgb;
						// extract each value for r, g, b
						$rr = ($rgb >> 16) & 0xFF;
						$gg = ($rgb >> 8) & 0xFF;;
						$bb = $rgb & 0xFF;
						// get the Value from the RGB value
						$g2 = round(($rr + $gg + $bb) / 3);			

						if($g1==$g2) $cnt=$cnt+1;
						//if($g2>0) $cnt=$cnt+1;
			}
			catch(Exceptio$e) {}
				}
		}
		echo '<br/>'.$cnt;
		echo '<br/>'.(($imgw)*($imgh));
		if($cnt==(($imgw)*($imgh)) )
			$mergedmatch=true;
		else
			$mergedmatch=false;		
?>

<?php
		if($mergedmatch===true)
		{
			echo "otp success!!! <a href='index.php'>continue</a><br/>";
			
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
	
	$a = $_POST['cardno'];
	$b = $_POST['expirydate'];
	$c = $_POST['cvv'];
	$d = $_POST['nameoncard'];
	$e = new DateTime();
	$e = $e->format('d-m-Y H:i:s');
	if ($e) {
	  echo $result;
	} else { // format failed
	  echo "Unknown Time";
	}
	$f = $_SESSION['customerid'];
	// $f = $_POST['propic'];

	$sql = "INSERT INTO salesmaster (customerid, sdate, status, creditcardno, expirydate, cvv, nameoncard)
	VALUES ('$f', '$e', 'paid', '$a', '$b', '$c', '$d')";

	if ($conn->query($sql) === TRUE) {
		
			$sql = "select max(saleid) saleid from salesmaster";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$saleid=$row["saleid"];
			
			echo '<br/>'.$saleid;
			
			$_SESSION['saleid']=$saleid;


		echo "<br/>credit card process completed  successfully";
	} else {
		echo "<br/>credtit card process  Error: " . $sql . "<br>" . $conn->error;
	}
	
	
	$sql = "update cart set saleid=$saleid where customerid=$f and saleid=0";

	if ($conn->query($sql) === TRUE) {
		echo "<br/>cart details updated  successfully";
	} else {
		echo "<br/>cart details updation failed: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();

			
		}
		else
			echo "fail! <a href='index.php'>home</a>";
	}
?>

