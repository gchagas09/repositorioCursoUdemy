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

//$user = new Usuario();

//$user->login('gchagas09', '123456');

//echo $user;

//Cria um usuário no banco, usando o método construtor e uma query específica
//$aluno = new Usuario("kaliadronoch", "khalmyr");
//$aluno->insert();
//echo $aluno;


//Altera os dados do usuário no BD
/*
$user = new Usuario();
$user->loadById(14);

echo $user;
 
$user->update("professor", "pr0f3ss0r");

echo $user;
*/

$user = new Usuario();
$user -> loadById(12);

$user->delete();

echo $user;

?>