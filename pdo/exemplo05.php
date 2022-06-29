<?php

$conn = new PDO("mysql: host=localhost;dbname=db_php7", "db_tester", "db_password");

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE id_usuario=:ID");


$id=5;

$stmt->bindParam(":ID", $id);

$stmt->execute();

echo "Dados excluidos  com Sucesso!!";
?>