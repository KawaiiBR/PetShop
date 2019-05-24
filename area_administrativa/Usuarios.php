<?php
    namespace PetShop;
    include '../Classes/Cliente.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- JQUERY -->
        <script src="../JS/jquery-3.4.1.min.js" type="text/javascript"></script>
        
        <!-- BOOTSTRAP -->
        <script src="../JS/bootstrap.min.js" type="text/javascript"></script>
        <link href="../CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- MEU CSS -->
        <link href="../css/area_administrativa.css" rel="stylesheet" type="text/css"/>
        
        <!-- Font Awesome-->
        <link href="../CSS/all.min.css" rel="stylesheet" type="text/css"/>
        <script src="../JS/all.min.js" type="text/javascript"></script>
        
        
    </head>
    <body>
        
        <div id="topo">
        <img src="#" alt=""/>
        </div>
        
        <div id="menu">
            <div class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li  class="active"><a href="index.php">Inicio</a></li>
                        <li><a href="Cadastro.php">Cadastro</a></li>
                        <li><a href="Agenda.php">Agendar Horário</a></li>
                        <li><a href="Historia.php">Historia</a></li>
                        <li><a href="Contato.php">Contato</a></li>
                        <li class="active"><a href="Usuarios.php">Usuários</a></li>
                        <li><a href="../index.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="corpo">      
                <!-- EMMET -->
                <div id="formNovoUsuario">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <h2>Novo usuário</h2>
                    <p>ID</p>
                    <input name="id" type="text">
                    <p>Nome completo</p>
                    <input name="nome" type="text" autofocus="">
                    <p>Email</p>
                    <input name="email"type="text">
                    <p>Usuario</p>
                    <input name="usuario"type="text">
                    <p>Senha</p>
                    <input name="senha"type="password">
                    <br>
                    <br>
                    <div id="buttonNovoUsuario">
                    <input name="opcao"type="submit" value="INSERIR">
                    <input name="opcao"type="submit" value="ATUALIZAR">
                    <input name="opcao"type="submit" value="DELETAR">
                    </div>
                </form>
            </div>
                <hr>
            <h1>Usuários</h1>
                    <table class="table table-striped">
                    <tr>
                        <td>ID</td>
                        <td>Nome completo</td>
                        <td>Email</td>
                        <td>Usuario</td>
                        <td colspan="2">OPÇOES</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Cesar</td>
                        <td>cesar@cesar.com</td>
                        <td>cesar</td>
                        <td>[editar]</td>
                        <td>[excluir]</td>
                    </tr>

                     <tr>
                        <td>2</td>
                        <td>Pedro</td>
                        <td>pedro@pedro.com</td>
                        <td>pedro</td>
                        <td>[editar]</td>
                        <td>[excluir]</td>
                    </tr>
                    </table>            
        </div>
            <div id="rodape">
        </div>
    </body>
</html>

<?php
    if(isset($_POST['id']) &&
            isset($_POST['nome']) &&
            isset($_POST['email']) &&
            isset($_POST['usuario']) &&
            isset($_POST['senha']))
    {
       if(empty($_POST['nome']) ||
               empty($_POST['email']) ||
               empty($_POST['usuario']) ||
               empty($_POST['senha']))
       {         
            echo "<script type='text/javascript'>"
                ."alert('Não deixe os campos em Branco');"
            ."</script>'";
       }
       else
       {
           $id = $_POST['id']; 
           $nome = $_POST['nome'];
           $email = $_POST['email'];
           $usuario = $_POST['usuario'];
           $senha = $_POST['senha'];
           
           $u = new Usuario();
           $resultado = $u->Inserir($nome, $usuario, $email, $senha);
           echo $resultado;
           if($resultado == true)
           {
               header("Location: http://localhost/PetShop/area_administrativa/Usuarios.php");
               echo "<script type='text/javascript'>"
                        ."alert('Cadastro Realizado com Sucesso');"
                    ."</script>'";
           }
           else
           {
                echo "<script type='text/javascript'>"
                        ."alert('Deu Ruim');"
                    ."</script>'";
           }
       }
    }
?>