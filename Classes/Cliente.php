<?php 

namespace PetShop;

class Cliente
{
    public function InserirCliente($nome, $email, $nomepet, $telefone, $senha)
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");

            $sql = "INSERT INTO cliente (nome, email, nomepet, telefone, senha) VALUES (:nome, :email, :nomepet, :telefone, :senha);";
            $preparar = $conexao->prepare($sql);
            $preparar->bindValue(":nome", "$nome");
            $preparar->bindValue(":email", "$email");
            $preparar->bindValue(":nomepet", "$nomepet");
            $preparar->bindValue(":telefone", "$telefone");
            $preparar->bindValue(":senha", "$senha");

            $resultado = $preparar->execute();
            if($resultado == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(\PDOException $e)
        {
            throw new Exception("Ocorrou um ERRO: "+$e);
        }
    }
    
    public function Agendar($dia, $hora)
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
        
            $sql = "INSERT INTO agenda (agenda) VALUES (:agenda);";
            $databanco = "$dia $hora";
            $preparar = $conexao->prepare($sql);
            $preparar->bindValue(":agenda", $databanco);

            $resultado = $preparar->execute();
            if($resultado == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(\PDOException $e)
        {
            throw new Exception("Ocorrou um ERRO: "+$e);
        }
        
    }
    
    public function ListarTodosAgenda()
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
            $sql = "SELECT * FROM agenda";

            $preparar = $conexao->prepare($sql);
            $preparar->execute();

            $resultado = $preparar->fetchAll(\PDO::FETCH_OBJ);

            return $resultado;
        }
        catch(\PDOException $e)
        {
            throw new Exception("Ocorrou um ERRO: "+$e->getMessage());
        }
    }
    
    public function ListarTodosCliente()
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
            $sql = "SELECT * FROM cliente";

            $preparar = $conexao->prepare($sql);
            $preparar->execute();

            $resultado = $preparar->fetchAll(\PDO::FETCH_OBJ);

            return $resultado;
        }
        catch(\PDOException $e)
        {
            throw new Exception("Ocorrou um ERRO: "+$e->getMessage());
        }
    }
    
    public function DeletarAgenda($id)
    {
        $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
        $sql = "DELETE FROM agenda WHERE id = :id";
            
        $preparar = $conexao->prepare($sql);
        $preparar->bindValue(":id", $id);
        $resultado = $preparar->execute();
        if($resultado == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function AlterarAgenda($id, $agenda)
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
            $sql = "UPDATE agenda SET agenda = :agenda WHERE id = :id"; 

            $preparar = $conexao->prepare($sql);
            $preparar->bindValue(":id", $id);
            $preparar->bindValue(":agenda", $agenda);

            $resultado = $preparar->execute();
            if($resultado == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(\PDOException $e)
        {
            throw new Exception("Ocorrou um ERRO: "+$e->getMessage());
        }
    }
    
    public function AlterarCliente($id, $nome, $email, $nomepet, $telefone, $senha)
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
            $sql = "UPDATE cliente SET nome = :nome, email = :email, nomepet = :nomepet, telefone = :telefone, senha = :senha WHERE id = :id"; 

            $preparar = $conexao->prepare($sql);
            $preparar->bindValue(":id", $id);
            $preparar->bindValue(":nome", $nome);
            $preparar->bindValue(":email", $email);
            $preparar->bindValue(":nomepet", $nomepet);
            $preparar->bindValue(":telefone", $telefone);
            $preparar->bindValue(":senha", $senha);

            $resultado = $preparar->execute();
            if($resultado == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(\PDOException $e)
        {
            throw new Exception("Ocorrou um ERRO: "+$e->getMessage());
        }
    }
    
    public function DeletarCliente($id)
    {
        $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
        $sql = "DELETE FROM cliente WHERE id = :id";
            
        $preparar = $conexao->prepare($sql);
        $preparar->bindValue(":id", $id);
        $resultado = $preparar->execute();
        if($resultado == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

//teste do metodo InserirCliente
//$c = new Cliente();
//$resultado = $c->InserirCliente("Anderson Serrano", "ander@anderson.com.br", "anderson", "1234", "123");
//echo $resultado;

//Teste do metodo ListarTodosCliente
//$c = new Cliente();
//$resultado = $c->ListarTodosCliente();

//Teste do metodo AlterarCliente
//$c = new Cliente();
//$resultado = $c->AlterarCliente(1, 'teste', 'teste', 'teste', 'teste');
//echo $resultado;

//Teste do metodo DeletarCliente
//$c = new Cliente();
//$resultado = $c->DeletarCliente(1);

//teste do metodo Agendar
//$c = new Cliente();
//$resultado = $c->Agendar("2019-06-04", "15:58");
//echo $resultado;

//Teste do metodo ListarTodosAgenda
//$c = new Cliente();
//$resultado = $c->ListarTodosAgenda();

//Teste do metodo AlterarAgenda
//$c = new Cliente();
//$resultado = $c->AlterarAgenda(1, '2019-06-04', '15:53')
//echo $resultado;

//Teste do metodo DeletarAgenda
//$c = new Cliente();
//$resultado = $c->DeletarAgenda(1);