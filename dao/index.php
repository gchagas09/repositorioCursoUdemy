<?php
    require_once("config.php");
//Carrega um usuário específico
//    $user = new Usuario();
//    $user ->loadById(12);
//    echo $user;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuários procurando pelo login 
//$search = Usuario::search('gch');
//echo json_encode($search);

//Carrega um usuário usando login e senha

$user = new Usuario();

$user->login('gchagas09', '123456');

echo $user;

?>