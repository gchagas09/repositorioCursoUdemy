<?php

$conn = new PDO("mysql:dbname=db_php7;host=localhost", "root", "");

$stmt = $conn->prepare("SELECT * FROM tb_usuarios ORDER BY ds_login");

$stmt->execute();

$results = $stmt->fetchAll();

var_dump($results);
?>