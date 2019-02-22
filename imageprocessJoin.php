<?php
	$ims1 = ImageCreateFromJpeg('slice1.jpg'); 
	$ims2 = ImageCreateFromJpeg('slice2.jpg'); 	
?>

<?php 
//$source_file = "Desert.jpg";
//$im = ImageCreateFromJpeg($source_file); 
$imgw = imagesx($ims1);
$imgh = imagesy($ims1);
$immrg= imagecreatetruecolor($imgw*2, $imgh*2);

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
				imagesetpixel($immrg, $i, $j, $g1>$g2 ?$val1:$val2);

        }
}
//echo $c1.'<br/>'.$c2;
imagejpeg($immrg, 'merged.jpg');
?>

<img width='100' src='gray2.jpg' />
<img width='100' src='merged.jpg' />
