<?php
    namespace PetShop;
    
    class Historia
    {
        public function ListarHistoria()
        {
            try 
            {
                $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root","" );

                $sql = "SELECT historia FROM historia";

                $preparar = $conexao->prepare($sql);
                $preparar->execute();

                $resultado = $preparar->fetch(\PDO::FETCH_OBJ);

                return $resultado;
            } 
            catch (Exception $e) 
            {
                throw new Exception("Ops... Erro: "+$e->getMessage());
            }
        }
        
        public function AtualizarHistoria($historia)
        {
            try 
            {
                $conexao = new \PDO("mysql:host=localhost; dbname=petshop", "root","" );
                 
                $sql = "UPDATE historia SET historia = :historia";
                 
                $preparar = $conexao->prepare($sql);
                $preparar->bindValue(":historia", $historia);
                
                $resultado = $preparar->execute();
                
                if($resultado == 1)
                {
                    return true;
                }
                else 
                {
                    return false;
                }
            } 
            catch (\PDOException $e) 
            {
                echo "Erro: ".$e->getMessage();
                return false;
            }
        }
    }
    
//    Teste Atualizar
//    $h = new historia();
//    $resultado = $h->AtualizarHistoria('olaaa');
//    echo $resultado;

