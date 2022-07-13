<?php
header("Content-Type: image/png");

$image = imagecreate(600,600);

$black = imagecolorallocate($image, 0, 0, 0);

$red = imagecolorallocate($image, 255, 0, 0);

imagestring($image, 5, 60, 60, "Chupa minha rola nazista,<br> americano de merda", $red);

imagepng($image);

imagedestroy($image);

?>