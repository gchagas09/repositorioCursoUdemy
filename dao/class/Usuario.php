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

        public function __construct($login='', $password=''){
                $this->setDs_login($login);
                $this->setDs_senha($password);
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
                $this->setData($results[0]); 
                }
        }

        public static function getList(){
                $sql = new Sql();

                return $sql ->select("SELECT * FROM tb_usuarios ORDER BY ds_login");

        }

        public static function search($login){
                $sql = new Sql();

                return $sql -> select("SELECT * FROM tb_usuarios WHERE ds_login LIKE :SEARCH ORDER BY ds_login", array(
                        ':SEARCH'=>"%".$login."%"
                ));
        }

        public function login($login, $senha){
                $sql = new Sql();

                $results = $sql-> select("SELECT * FROM tb_usuarios WHERE ds_login = :LOGIN AND ds_senha =:PASSWORD", array(
                    ":LOGIN"=>$login,
                    ":PASSWORD"=>$senha
                ));
    
                if (count($results)>0){
                        $this->setData($results[0]);                    
                } else {
                        throw new Exception("Login e/ou senha inválidos");
                }
        }

        public function setData($data){
                $this ->setId_usuario($data['id_usuario']);
                $this ->setDs_login($data['ds_login']);
                $this ->setDs_senha($data['ds_senha']);
                $this ->setDt_cadastro(new DateTime($data['dt_cadastro']));
        }

        public function insert(){
                
                $sql = new Sql();
                
                $results = $sql -> select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
                        ':LOGIN'=>$this->getDs_login(),
                        ':PASSWORD'=>$this->getDs_senha()
                ));                
                if (count($results)>0){
                        $this->setData($results[0]); 
                        }
        }

        public function update($login, $password){
                
                $this->setDs_login($login);
                $this->setDs_senha($password);
                
                $sql = new Sql();

                $sql -> query("UPDATE tb_usuarios SET ds_login = :LOGIN, ds_senha = :PASSWORD WHERE id_usuario = :ID", array(
                        ':LOGIN'=> $this->getDs_login(),
                        ':PASSWORD'=> $this->getDs_senha(),
                        ':ID'=> $this->getId_usuario()
                ));
        }
   }


?>