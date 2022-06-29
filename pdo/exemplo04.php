<?php

$conn = new PDO("mysql: host=localhost;dbname=db_php7", "db_tester", "db_password");

$stmt = $conn->prepare("UPDATE tb_usuarios SET ds_login = :LOGIN, ds_senha = :PASSWORD WHERE id_usuario=:ID");

$login = 'gchagas1';
$password = 'qwerty';
$id=6;

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);
$stmt->bindParam(":ID", $id);

$stmt->execute();

echo "Dados alterados com Sucesso!!";
?>