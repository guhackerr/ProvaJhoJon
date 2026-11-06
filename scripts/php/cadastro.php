<?php 
    class BancoDados{
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "biblioteca";

        public $pdo;
         

        function __construct(){
            try{
                $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->username, $this->password);
                $this->pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            catch(PDOException $e){
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            };
        }

        function adicionar($nomeTabela, $keys, $values){

            $colunas = "";
            for ($i = 0; $i < count($keys) - 1; $i++){
                $colunas .=  $keys[$i] . ",";
            }

            $colunas .= $keys[count($keys) - 1];

            $parametros = "";
            for ($i = 0; $i < count($values) - 1; $i++){
                $parametros .=  "?,";
            }

            $parametros .= "?";

            $sql = "INSERT INTO $nomeTabela ($colunas) VALUES($parametros);";

            $stmt = $this->pdo ->prepare($sql);
            $stmt->execute($values);
        }
    }

    $banco_dados = new BancoDados();

    $banco_dados->adicionar("classificacao", ["nome", "descricao"], ["coator", "cara feio"]);
    

    // Create connection
    


    


?>