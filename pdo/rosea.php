<?php

$conn = new PDO("mysql: host=localhost;dbname=db_php7", "db_tester", "db_password");

$stmt = $conn->prepare("UPDATE tb_usuarios (ds_login, ds_senha) VALUES (:LOGIN,:PASSWORD)");

$login = 'gchagas';
$password = '123456';

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);

$stmt->execute();

echo "Hello world";
?>