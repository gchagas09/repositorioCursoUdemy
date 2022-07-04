<?php
require_once("config.php");

$sql=new Sql();

$usuarios = $sql -> select("SELECT * FROM tb_usuarios ORDER BY ds_login");

$headers = array();

foreach($usuarios[0] as $key =>$value){
    array_push($headers, ucfirst($key));
}

$file = fopen("usuarios.csv", "w+");

fwrite($file, implode(",", $headers)."\r\n");

//Percorre cada uma das linhas 
foreach($usuarios as $row){
    $data = array();
    //Percorre cada uma das colunas
    foreach ($row as $key => $value){
        array_push($data, $value);
    }
    fwrite($file, implode(",", $data)."\r\n");
}

fclose($file);
?>