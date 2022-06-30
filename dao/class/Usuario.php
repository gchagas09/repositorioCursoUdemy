<?php
   
   class Usuario{
        private $id_usuario;
        private $ds_login;
        private $ds_senha;
        private $dt_cadastro;
        
        public function __toString(){
            return json_encode(array(
                "id_usuario"=> $this->getId_usuario(),
                "ds_login"=> $this->getDs_login(),
                "ds_senha"=> $this->getDs_senha(),
                "dt_cadastro"=> $this->getDt_cadastro()->format("d/m/Y H:i:s")
            ));
        }

        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;
        }

        public function getDs_login()
        {
                return $this->ds_login;
        }

        public function setDs_login($ds_login)
        {
                $this->ds_login = $ds_login;
        }

        public function getDs_senha()
        {
                return $this->ds_senha;
        }

        public function setDs_senha($ds_senha)
        {
                $this->ds_senha = $ds_senha;
        }

        public function getDt_cadastro()
        {
                return $this->dt_cadastro;
        }

        public function setDt_cadastro($dt_cadastro)
        {
                $this->dt_cadastro = $dt_cadastro;
        }

        public function loadById($id){
            $sql = new Sql();

            $results = $sql-> select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(
                ":ID"=>$id
            ));

            if (count($results)>0){
                $row = $results[0];

                $this ->setId_usuario($row['id_usuario']);
                $this ->setDs_login($row['ds_login']);
                $this ->setDs_senha($row['ds_senha']);
                $this ->setDt_cadastro(new DateTime($row['dt_cadastro']));
                
            }
        }
   }


?>