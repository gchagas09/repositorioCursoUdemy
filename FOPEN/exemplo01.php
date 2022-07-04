<?php
//Cria um arquivo log e adiciona ao fim dele a data e a hora atuais

$file = fopen("log.txt", "a+");

fwrite($file, date("Y-m-d H:i:s")."\r\n");

fclose($file);

echo "Arquivo criado com sucesso";

?>