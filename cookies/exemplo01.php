<?php

$data = array(
    "empresa"=>"HCODE treinamentos"

);

setcookie("NOME_DO_COOKIE", json_encode($data), time() + 3600);

echo json_encode($data);

?>