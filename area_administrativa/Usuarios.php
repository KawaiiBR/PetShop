<?php
    namespace PetShop;
    include '../Classes/Usuario.php';
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
        
        <script type="text/javascript">
        function Editar(id, nome, usuario, email)
            {
                document.getElementsByName('id')[0].value = id;
                document.getElementsByName('nome')[0].value = nome;
                document.getElementsByName('usuario')[0].value = usuario;
                document.getElementsByName('email')[0].value = email;
                
                document.getElementById('inserirBtn').style.display = "none";
                document.getElementById('atualizarBtn').style.display = "inline";
            }
            
            function Cancelar()
            {
                var acao = confirm("Tem certeza?\nSem ctrl Z bro");
                if(acao === true)
                {
                    window.location.reload();
                }
            }
        </script>
    </head>
    <body>
        
        <div id="topo">
        <img src="#" alt=""/>
        </div>
        
        <div id="menu">
            <div class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="Cadastro.php">Cadastro</a></li>
                        <li><a href="Agenda.php">Agendar Horário</a></li>
                        <li><a href="Historia.php">Historia</a></li>
                        <li class="active"><a href="Usuarios.php">Usuários</a></li>
                        <li><a href="../index.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="corpo">      
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
                    <input id="inserirBtn" class="btn btn-primary" name="opcao" type="submit" value="Inserir">
                    <input id="atualizarBtn" style="display: none;" class="btn btn-warning" name="opcao" type="submit" value="Atualizar">
                    <input onclick="Cancelar();" id="cancelarBtn" class="btn btn-danger" name="opcao" type="submit" value="Cancelar">
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
                        <?php
                        $u = new Usuario();
                        $usuarios = $u->ListarTodos();
                        
                        foreach($usuarios as $user) 
                        {
                            echo "<tr>"
                                    ."<td>".$user->id."</td>"
                                    ."<td>".$user->nome."</td>"
                                    ."<td>".$user->usuario."</td>"
                                    ."<td>".$user->email."</td>"
                                    ."<td><a onclick='Editar(&quot;".$user->id."&quot;, &quot;".$user->nome."&quot;, &quot;".$user->usuario."&quot;, &quot;".$user->email."&quot;);' href='#' class='btn btn-warning'>Editar</a></td>"
                                    ."<td><a onclick='return confirm(&quot;Tem Certeza?&quot;)' href='?id=".$user->id."&opcao=Deletar' class='btn btn-danger'>Excluir</a></td>"
                                ."</tr>";
                        }
                        ?>
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
            isset($_POST['senha']) &&
            isset(($_POST['opcao'])))
    {
        if(empty($_POST['nome']) ||
            empty($_POST['email']) ||
            empty($_POST['usuario']) ||
            empty($_POST['senha']))
        {
            echo "<script type='text/javascript'>"
                    ."alert('Não deixe os campos em branco');"
                    ."window.location.href='http://localhost/PetShop/area_administrativa/Usuarios.php';"
                    ."</script>'";
        }
        else
        {
            $id = $_POST['id']; 
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $opcao = $_POST['opcao'];

            $u = new Usuario();

            switch ($opcao)
            {
                case "Inserir";

                $resultado = $u->Inserir($nome, $email, $usuario, $senha);
                if($resultado == true)
                {
                    echo "<script type='text/javascript'>"
                            ."alert('Cadastro Realizado com Sucesso');"
                            ."window.location.href='http://localhost/PetShop/area_administrativa/Usuarios.php';"
                        ."</script>'";
                        }
                    else
                    {
                        echo "<script type='text/javascript'>"
                                ."alert('Erro');"
                            ."</script>'";
                    }
                Break;

                Case "Atualizar";
                $resultado = $u->Alterar($id, $nome, $usuario, $email, $senha);
                if($resultado == 1)
                {
                    echo "<script type='text/javascript'>"
                            ."alert('Alterado com sucesso');"
                            ."window.location.href='http://localhost/PetShop/area_administrativa/Usuarios.php';"
                        ."</script>'";
                }
                else
                {
                    echo "<script type='text/javascript'>"
                            ."alert('Erro ao alterar o usuario!');"
                        ."</script>'";
                }
                Break;                
            }
        }
    }
    
    else if(isset($_GET['id']) && isset($_GET['opcao']))
    {
        if($_GET['opcao'] == "Deletar")
        {
            $id = $_GET['id'];
            $u = new Usuario();
            $resultado = $u->Deletar($id);            
            
            if($resultado == 1)
            {
                echo "<script type='text/javascript'> "
                         ."alert('Sucesso');"
                        . "window.location.href='http://localhost/PetShop/area_administrativa/Usuarios.php';"
                     ."</script>";
            }
            else
            {
               echo "<script type='text/javascript'> alert ('Deu Ruim!');window.location.href='http://localhost/PetShop/area_administrativa/Usuarios.php';</script>";
            }
        }
    }
    