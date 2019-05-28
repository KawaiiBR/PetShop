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
            return false;
        }
    }
    
    public function Agendar($dia, $hora)
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
        
            $sql = "INSERT INTO agenda (dia, hora) VALUES (:dia, :hora);";
            $preparar = $conexao->prepare($sql);
            $preparar->bindValue(":dia", "$dia");
            $preparar->bindValue(":hora", "$hora");

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
            return false;
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
            return false;
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
}

//teste do metodo Inserir
//$u = new usuario();
//$resultado = $u->Inserir("Anderson Serrano", "anderson", "ander@anderson.com.br", "1234");
//echo $resultado;

////teste do metodo Login
//$u = new usuario();
//$resultado = $u->Login('123', '123');
//echo $resultado;

?>