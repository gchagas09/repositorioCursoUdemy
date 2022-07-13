<?php

$data = array(
    "empresa"=>"HCODE treinamentos"

);

setcookie("NOME_DO_COOKIE", json_encode($data), time()+ 3600 );

echo "Cookie criado com sucesso. Não esqueça dele no forno";

?>