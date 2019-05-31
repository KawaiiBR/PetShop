<?php
    namespace PetShop;
    include '../Classes/Cliente.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- JQuery -->
        <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
        
        <!-- Bootstrap-->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        
        <!--Fonte Awesome-->
        <link href="../css/all.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/all.min.js" type="text/javascript"></script>
        
        <!--Estilo-->
        <link href="../css/area_administrativa.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript">
        function Editar(id, nome, email, nomepet, telefone)
            {
                document.getElementsByName('id')[0].value = id;
                document.getElementsByName('nome')[0].value = nome;
                document.getElementsByName('email')[0].value = email;
                document.getElementsByName('nomepet')[0].value = nomepet;
                document.getElementsByName('telefone')[0].value = telefone;
                
                document.getElementById('inserirBtn').style.display = "none";
                document.getElementById('atualizarBtn').style.display = "inline";
            }
            
            function Cancelar()
            {
                var opcao = confirm("Tem certeza?\nNão há voltas nesta ação");
                if(opcao === true)
                {
                    window.location.reload();
                }
            }
        </script>
    </head>
    <body>
        <div id="topo">
           
        </div>
        
        <div id="menu">
            <div class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <img id="logo" src="../imagens/o krai.png" alt="logo"/>
                        <li><a href="index.php">Inicio</a></li>
                        <li  class="active"><a href="Cadastro.php">Cadastro</a></li>
                        <li><a href="Agenda.php">Agendar Horário</a></li>
                        <li><a href="Historia.php">Historia</a></li>
                        <li><a href="Contato.php">Contato</a></li>
                        <li><a href="Usuarios.php">Usuários</a></li>
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
                    <p>Nome Completo</p>
                    <input name="nome" type="text" autofocus="">
                    <p>Email</p>
                    <input name="email"type="text">
                    <p>Nome do Pet</p>
                    <input name="nomepet"type="text">
                    <p>Telefone</p>
                    <input name="telefone" type="text">
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
                        <td>Nome do Pet</td>
                        <td>Telefone</td>
                        <td colspan="2">OPÇOES</td>
                    </tr>
                        <?php
                        $c = new Cliente();
                        $clientes = $c->ListarTodosCliente();
                        
                        foreach($clientes as $user) 
                        {
                            echo "<tr>"
                                    ."<td>".$user->id."</td>"
                                    ."<td>".$user->nome."</td>"
                                    ."<td>".$user->email."</td>"
                                    ."<td>".$user->nomepet."</td>"
                                    ."<td>".$user->telefone."</td>"
                                    ."<td><a onclick='Editar(&quot;".$user->id."&quot;, &quot;".$user->nome."&quot;, &quot;".$user->email."&quot;, &quot;".$user->nomepet."&quot;, &quot;".$user->telefone."&quot;);' href='#' class='btn btn-warning'>Editar</a></td>"
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
                isset($_POST['nomepet']) &&
                isset($_POST['telefone']) &&
                isset($_POST['senha']) &&
                isset(($_POST['opcao'])))
        {
            if(empty($_POST['nome']) ||
                empty($_POST['email']) ||
                empty($_POST['nomepet']) ||
                empty($_POST['telefone']) ||
                empty($_POST['senha']))
            {
                echo "<script type='text/javascript'>"
                        ."alert('Não deixe os campos em branco');"
                        ."window.location.href='http://localhost/PetShop/area_administrativa/Cadastro.php';"
                        ."</script>'";
            }
            else
            {
                $id = $_POST['id']; 
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $nomepet = $_POST['nomepet'];
                $telefone = $_POST['telefone'];
                $senha = $_POST['senha'];
                $opcao = $_POST['opcao'];

                $c = new Cliente();

                switch ($opcao)
                {
                    case "Inserir";

                    $resultado = $c->InserirCliente($nome, $email, $nomepet, $telefone, $senha);
                    if($resultado == true)
                    {
                        echo "<script type='text/javascript'>"
                                ."alert('Cadastro Realizado com Sucesso');"
                                ."window.location.href='http://localhost/PetShop/area_administrativa/Cadastro.php';"
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
                    $resultado = $c->AlterarCliente($id, $nome, $email, $nomepet, $telefone,$senha);
                    if($resultado == 1)
                    {
                        echo "<script type='text/javascript'>"
                                ."alert('Alterado com sucesso');"
                                ."window.location.href='http://localhost/PetShop/area_administrativa/Cadastro.php';"
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
                $c = new Cliente();
                $resultado = $c->DeletarCliente($id);            

                if($resultado == 1)
                {
                    echo "<script type='text/javascript'> "
                             ."alert('Sucesso');"
                            . "window.location.href='http://localhost/PetShop/area_administrativa/Cadastro.php';"
                         ."</script>";
                }
                else
                {
                   echo "<script type='text/javascript'> alert ('Deu Ruim!');window.location.href='http://localhost/PetShop/area_administrativa/Cadastro.php';</script>";
                }
            }
        }