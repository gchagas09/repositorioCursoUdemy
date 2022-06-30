<?php

require_once("config.php");

use Cliente\Cadastro;

$cad = new Cadastro();

$cad->setNome("Seu pourra");
$cad->setEmail("gchagas@emater.tche.br");
$cad->setSenha("***********");



echo $cad->registrarVenda();
?>