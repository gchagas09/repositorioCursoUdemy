<?php

$nome=utf8_decode("Nome do Desgraçadinho");
$dataConclusao= date("d-m-Y");

$bevan = __DIR__.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR."Bevan".DIRECTORY_SEPARATOR."Bevan-Regular.ttf";
$playball = __DIR__.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR."Playball".DIRECTORY_SEPARATOR."Playball-Regular.ttf";

$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0,0,0);
$gray = imagecolorallocate($image, 150,150,150);

imagettftext($image, 32, 0,  450, 150, $titleColor, $bevan, "CERTIFICADO");

imagettftext($image, 32, 0, 440, 350, $titleColor, $playball, $nome);

imagestring($image, 3, 440, 370, "Concluido em: ". $dataConclusao, $gray);

header("Content-type: image/jpeg");

imagejpeg($image);
imagedestroy($image);
?>