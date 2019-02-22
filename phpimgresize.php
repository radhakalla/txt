<?php
	$im = ImageCreateFromJpeg('merged.jpg'); 
	$imgw = imagesx($im);
	$imgh = imagesy($im);
	$immrg  = imagecreatetruecolor($imgw/2, $imgh/2);
	imagecopyresampled($immrg, $im, 0, 0, 0, 0, $imgw/2, $imgh/2, $imgw, $imgh);	
	imagejpeg($immrg, 'mergedresize.jpg');
?>
