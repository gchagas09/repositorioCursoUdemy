<?php

$link = "https://t5z6q4c2.rocketcdn.me/wp-content/uploads/2020/10/cavaleiro-medieval-quem-era-formacao-caracteristicas-e-funcoes.jpg";

$content = file_get_contents($link);

$parse = parse_url($link);


$basename = basename($parse["path"]);

$file = fopen("img_cavaleiro.jpg", "w+");

fwrite($file, $content);

fclose($file);
?>

<img src= "<?=$basename?>">