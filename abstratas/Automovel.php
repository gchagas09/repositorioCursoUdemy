<?php

abstract class Automovel implements Veiculo{
    public function acelerar($velocidade){
        echo "O veículo acelerou até $velocidade km/h";
    }
    public function frenar($velocidade){
        echo "O veículo frenou quando chegou a $velocidade km/h";
    }
    public function trocarMarcha($marcha){
        echo "O veículo engatou a marcha $marcha";
    }
}



?>