<?php

$conn = new PDO("mysql: host=localhost;dbname=db_php7", "db_tester", "db_password");

$conn->beginTransaction();

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE id_usuario=?");

$id= 6 ;

$stmt->execute(array($id));

//$conn->rollback();

$conn->commit();

echo "Dados excluidos  com Sucesso!!";
?>