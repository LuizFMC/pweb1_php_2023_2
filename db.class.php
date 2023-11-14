<?php

class DB
{

    public function conn()
    {
        $host = "localhost";
        $dbname = "db_aula_pweb1";
        $user = "root";
        $password = "";

        try {
            $conn = new PDO(
                "mysql:host=$host;dbname=$dbname",
                $user,
                $password,
                [ PDO::ATTR_ERRMODE,
                  PDO::ERRMODE_EXCEPTION,
                  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );

           // echo "Connected successfully";

            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function select($nome_tabela){
        
        $conn = $this->conn();
        $sql = "SELECT * FROM $nome_tabela";

        $st = $conn->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS);

    }

    public function find($nome_tabela, $id){
        
        $conn = $this->conn();
        $sql = "SELECT * FROM $nome_tabela Where id = ?";

        $st = $conn->prepare($sql);
        $st->execute([$id]);

        return $st->fetchObject();

    }

    public function insert($nome_tabela, $dados){

        unset($dados['id']);
        $conn = $this->conn();
        $sql = "INSERT INTO $nome_tabela (";

        $flag = 0;
        $vetorDados = [];

        foreach ($dados as $campo => $valor ){
            if ($flag == 0){
                $sql .= "$campo";
            }else {
                $sql .= ", $campo";

            }
            $flag = 1;
           
      
        }
              $sql .= ") values (";
              $flag = 0;

              foreach ($dados as $campo => $valor ){
                if ($flag == 0){
                    $sql .= " ?";
                }else {
                    $sql .= ", ?";
    
                }
                $flag = 1;
                $vetorDados[] = $valor;
            }
    

              $sql .= ")";
              //var_dump($sql);
              //var_dump($vetorDados);
              //exit;


        $st = $conn->prepare($sql);

        $st->execute($vetorDados);
    }

    public function update($nome_tabela, $dados){
        
        $conn = $this->conn();
        $sql = "UPDATE $nome_tabela SET nome=?, cpf=?, telefone=? WHERE id=?";  

        $st = $conn->prepare($sql);

        $st->execute([
            $dados['nome'],
            $dados['cpf'],
            $dados['telefone'],
            $dados['id'],
        ]);
    }

    public function destroy($nome_tabela, $id){
        
        $conn = $this->conn();
        $sql = "DELETE FROM $nome_tabela where id = ?";

        $st = $conn->prepare($sql);
        $st->execute([$id]);

    }

    public function search($nome_tabela, $dados){
        
        //var_dump($dados);
        //exit;
        $campo = $dados['tipo'];
        $valor = $dados['valor'];

        $conn = $this->conn();
        $sql = "SELECT * FROM $nome_tabela where $campo LIKE ?";

        $st = $conn->prepare($sql);
        $st->execute(["%$valor%"]);

        return $st->fetchAll(PDO::FETCH_CLASS);
    }
    public function login($nome_tabela, $dados){
        
        $conn = $this->conn();
        $sql = "SELECT * FROM $nome_tabela WHERE cpf = ?";

        $st = $conn->prepare($sql);
        $st->execute([$dados['cpf']]);

        $result = $st->fetchObject();

        if(password_verify($dados['senha'],$result->senha)){
            return $result;

        }else{
            return "Error";
        }

    }
}

?>