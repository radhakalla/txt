<?php 
$source_file = "Desert.jpg";
$im = ImageCreateFromJpeg($source_file); 
imagefilter($im, IMG_FILTER_GRAYSCALE); 
header('Content-type: image/jpeg');
//imagejpeg($im, 'desert_gray.jpg');
imagejpeg($im);
?>