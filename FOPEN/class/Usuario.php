<?php
   
   class Usuario{
        private $id_usuario;
        private $ds_login;
        private $ds_senha;
        private $dt_cadastro;
        
        //Método mágico 'toString' que converte os dados do objeto para string, para que o mesmo possa ser exibido na tela
        public function __toString(){
            return json_encode(array(
                "id_usuario"=> $this->getId_usuario(),
                "ds_login"=> $this->getDs_login(),
                "ds_senha"=> $this->getDs_senha(),
                "dt_cadastro"=> $this->getDt_cadastro()->format("d/m/Y H:i:s")
            ));
        }

        //Método construtor do objeto, que recebe login e senha, e recebe os messmos vazios, tornando sua passagem opcional
        public function __construct($login='', $password=''){
                $this->setDs_login($login);
                $this->setDs_senha($password);
        }

        //getters e setters do objeto
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

        /*
        Método que busca no banco de dados os dados do usuário, cujo id foi passado como parâmetro do metodo
        O método então utiliza um array associativo para completar os dados do objeto
        */
        public function loadById($id){
            $sql = new Sql();

            $results = $sql-> select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(
                ":ID"=>$id
            ));

            if (count($results)>0){
                $this->setData($results[0]); 
                }
        }

        // Método que busca todos os usuários do BD
        public static function getList(){
                $sql = new Sql();

                return $sql ->select("SELECT * FROM tb_usuarios ORDER BY ds_login");

        }

        // Método que busca um usuário no BD pelo seu login
        public static function search($login){
                $sql = new Sql();

                return $sql -> select("SELECT * FROM tb_usuarios WHERE ds_login LIKE :SEARCH ORDER BY ds_login", array(
                        ':SEARCH'=>"%".$login."%"
                ));
        }
        // Método que valida o login e a senha do usuário no BD
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
        // Método responsável por associar os dados do usuário no BD ao objeto 
        public function setData($data){
                $this ->setId_usuario($data['id_usuario']);
                $this ->setDs_login($data['ds_login']);
                $this ->setDs_senha($data['ds_senha']);
                $this ->setDt_cadastro(new DateTime($data['dt_cadastro']));
        }

        //Método que cria um novo usuário
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

        // Método que atualiza um usuário no BD
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

        //Método que exclui os dados do usuario no banco de Dados
        public function delete(){
                $sql = new Sql();

                $nome = $this->getDs_login();
                $cadastro_dt= $this->getDt_cadastro();

                echo "Usuário $nome em $cadastro_dt excluído com sucesso";

                $sql -> query("DELETE FROM tb_usuarios WHERE id_usuario = :ID", array(
                        ':ID'=>$this->getId_usuario()
                ));

                $this->setId_usuario(NULL);
                $this->setDs_login(NULL);
                $this->setDs_senha(NULL);
                $this->setDt_cadastro(new DateTime());

                echo "Usuário $nome em $cadastro_dt excluído com sucesso";
                
        }
   }


?>