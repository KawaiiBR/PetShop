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
}

class Usuario
{
    public function Inserir($nome, $usuario, $email, $senha)
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");

            $sql = "INSERT INTO usuarios (nome, usuario, email, senha) VALUES (:nome, :usuario, :email, :senha);";
            $preparar = $conexao->prepare($sql);
            $preparar->bindValue(":nome", "$nome");
            $preparar->bindValue(":usuario", "$usuario");
            $preparar->bindValue(":email", "$email");
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

    public function Login($login, $senha)
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");

            $sql = "SELECT count(*) FROM usuarios WHERE usuario = :login AND senha = :senha";
            $preparar = $conexao->prepare($sql);
            $preparar->bindValue(":login", $login);

            $senhaCriptografada = sha1($senha);
            $preparar->bindValue(":senha", $senhaCriptografada);
            
            $preparar->execute();
            $resultado = $preparar->fetch();

            if($resultado[0] == 1)
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