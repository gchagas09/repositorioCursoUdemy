<?php

$conn = new mysqli("127.0.0.1", "root", "", "db_php7");

if ($conn->connect_error){
    echo "Fudeu, dá uma olhada aqui: ". $conn->connect_error;
}

/*
$stmt = $conn-> prepare("INSERT INTO tb_usuarios (ds_login, ds_senha) VALUES (?, ?)");

$stmt ->bind_param("ss", $login, $pass);

$login = "Cu_de_indio";
$pass = "123456";

$stmt->execute();

echo "Ai meu deus, deu merda";

$login = "user";
$pass = "654321";

$stmt->execute();

echo "Porra é essa marreco?";

*/

$result = $conn->query("SELECT * FROM tb_usuarios ORDER BY ds_login");

$data = array();

while ($row = $result->fetch_assoc()){
    array_push($data, $row);
}

echo json_encode($data);

?>