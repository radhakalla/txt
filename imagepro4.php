<?php 
$source_file = "Desert.jpg";

$im = ImageCreateFromJpeg($source_file); 

imagefilter($im, IMG_FILTER_GRAYSCALE); 

imagefilter($im, IMG_FILTER_CONTRAST, -1000);

header('Content-type: image/jpeg');
//imagejpeg($im, 'desert_gray.jpg');
imagejpeg($im);
?>