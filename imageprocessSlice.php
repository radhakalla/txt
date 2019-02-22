<?php
	session_start();
	$_SESSION['otpsendtime'] = time();
	$secureimages=['DesertSm.jpg', 'HydrangeasSm.jpg', 'JellyfishSm.jpg', 'KoalaSm.jpg'];
	$i=rand(0,3);
	$source_file = $secureimages[$i];
	echo $source_file;
	$im = ImageCreateFromJpeg($source_file); 

	imagefilter($im, IMG_FILTER_GRAYSCALE); 
	imagejpeg($im, 'gray1.jpg');

	imagefilter($im, IMG_FILTER_CONTRAST, -1000);
	imagejpeg($im, 'gray2.jpg');
?>

<?php 
//$source_file = "Desert.jpg";
//$im = ImageCreateFromJpeg($source_file); 
$imgw = imagesx($im);
$imgh = imagesy($im);
$ims1  = imagecreatetruecolor($imgw*2, $imgh*2);
$ims2  = imagecreatetruecolor($imgw*2, $imgh*2);
$patterns=[[1,1,0,0], [1,0,1,0], [1,0,0,1], [0,1,1,0], [0,1,0,1], [0,0,1,1]];

$valw = imagecolorallocate($ims1, 255,255,255);
$valb = imagecolorallocate($ims1, 0,0,0);

$c1=0;
$c2=0;
for ($i=0; $i<$imgw; $i++)
{
        for ($j=0; $j<$imgh; $j++)
        {
				$r=rand(0,5);
				$pat=$patterns[$r];

				$x1=$i*2;
				$x2=$i*2+1;
				$y1=$j*2;
				$y2=$j*2+1;
				//$y=$x+1;
                // get the rgb value for current pixel
                $rgb = ImageColorAt($im, $i, $j); 
                // extract each value for r, g, b
                $rr = ($rgb >> 16) & 0xFF;
                $gg = ($rgb >> 8) & 0xFF;
                $bb = $rgb & 0xFF;
                // get the Value from the RGB value

                $g = round(($rr + $gg + $bb) / 3);			

				imagesetpixel($ims1, $x1, $y1, $pat[0]==1?$valw:$valb);
				imagesetpixel($ims1, $x2, $y1, $pat[1]==1?$valw:$valb);
				imagesetpixel($ims1, $x1, $y2, $pat[2]==1?$valw:$valb);
				imagesetpixel($ims1, $x2, $y2, $pat[3]==1?$valw:$valb);

				if ($g==0)#Dark pixel so B gets the anti pattern
				{
					imagesetpixel($ims2, $x1, $y1, $pat[0]==0?$valw:$valb);
					imagesetpixel($ims2, $x2, $y1, $pat[1]==0?$valw:$valb);
					imagesetpixel($ims2, $x1, $y2, $pat[2]==0?$valw:$valb);
					imagesetpixel($ims2, $x2, $y2, $pat[3]==0?$valw:$valb);
					$c1++;
				}
				else
				{
					imagesetpixel($ims2, $x1, $y1, $pat[0]==1?$valw:$valb);
					imagesetpixel($ims2, $x2, $y1, $pat[1]==1?$valw:$valb);
					imagesetpixel($ims2, $x1, $y2, $pat[2]==1?$valw:$valb);
					imagesetpixel($ims2, $x2, $y2, $pat[3]==1?$valw:$valb);
					$c2++;
				}

        }
}
//echo $c1.'<br/>'.$c2;
imagejpeg($ims1, 'slice1.jpg');
imagejpeg($ims2, 'slice2.jpg');
?>

	<img width='100' src='<?php echo $source_file ?>' />
	<img width='100' src='gray1.jpg' />
	<img width='100' src='gray2.jpg' />
	<img width='100' src='slice1.jpg' />
	<img width='100' src='slice2.jpg' />

<?php 
	require('maildemoheader.php');
    $mail->addAddress($_GET['email'], 'vj');     // Add a recipient
    $mail->addAttachment('slice1.jpg', 'slice1.jpg');    // working; Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'slice otp';
    $mail->Body    = 'WElcome onboard <b>plz download this otp slice and upload in the checkout page!</b>';
	require('maildemofooter.php');
?>