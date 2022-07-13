<?php


function nomeArquivo($nomeArquivo){
    $arquivo = strtolower(str_replace(' ', '-', $nomeArquivo));
    return $arquivo;
}

$nome=utf8_decode("Nome do Desgraçadinho");
$dataConclusao= date("d-m-Y");



$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0,0,0);
$gray = imagecolorallocate($image, 150,150,150);

imagestring($image, 5, 450, 150, "CERTIFICADO", $titleColor);

imagestring($image, 5, 440, 350, $nome, $titleColor);

imagestring($image, 3, 440, 370, "Concluido em: ". $dataConclusao, $gray);

//header("Content-type: image/jpeg");

var_dump($dataConclusao);



$arquivoCertificado = "certificado-".nomeArquivo($nome)."-$dataConclusao-exemplo02.jpg";
imagejpeg($image, $arquivoCertificado, 100);
imagedestroy($image);
?>