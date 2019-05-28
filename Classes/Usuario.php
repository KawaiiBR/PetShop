<?php

namespace PetShop;

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
    
    public function ListarTodos()
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
            $sql = "SELECT * FROM usuarios";

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
    
    public function Deletar($id)
    {
        $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
        $sql = "DELETE FROM usuarios WHERE id = :id";
            
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
    
    public function Alterar($id, $nome, $usuario, $email, $senha)
    {
        try
        {
            $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root", "");
            $sql = "UPDATE usuarios SET nome = :nome, usuario= :usuario, email = :email, senha = :senha WHERE id = :id";

            $preparar = $conexao->prepare($sql);
            $preparar->bindValue(":id", $id);
            $preparar->bindValue(":nome", $nome);
            $preparar->bindValue(":usuario", $usuario);
            $preparar->bindValue(":email", $email);

            $senhaCriptografada = sha1($senha);
            $preparar->bindValue(":senha", $senhaCriptografada);

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
}