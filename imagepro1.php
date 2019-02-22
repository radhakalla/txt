<?php
	$im = imagecreatefrompng('desert.png');
    $rgb = imagecolorat($im, 234,234);
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;
    echo '<div style="font-size:60px;color:rgb(' .$r .','.$g.','.$b.')">Text in color of the Image</div>';
?>