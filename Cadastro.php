<?php
    namespace PetShop;
    include 'Classes/Cliente.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- JQuery -->
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        
        <!-- Bootstrap-->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        
        <!--Fonte Awesome-->
        <link href="css/all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/all.min.js" type="text/javascript"></script>
        
        <!--Estilo-->
        <link href="css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="topo">
            <img src="imagens/o krai.png" alt="logo"/>
        </div>
        
        <div id="menu">
            <div class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Inicio</a></li>
                        <li class="active"><a href="Cadastro.php">Cadastro</a></li>
                        <li><a href="Agenda.php">Agendar Horário</a></li>
                        <li><a href="História.php">Historia</a></li>
                        <li><a href="Contato.php">Contato</a></li>
                    </ul>                       
                </div>             
            </div>
        </div>
        
        <div id="corpo">
            <form id="cadastro" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <p>Nome Completo</p>
                <input name="nome" placeholder="Nome Completo" type="text">
                <p>Email</p>
                <input name="email" placeholder="email@examplo" type="text">
                <p>Nome do pet</p>
                <input name="nomepet" placeholder="rodolfinho" type="text">
                <p>Telefone</p>
                <input name="telefone" placeholder="(14) 99876-5432" type="text">
                <p>Senha</p>
                <input name="senha" placeholder="*****" type="text">
                <br>
                <input class="btn btn-success" type="submit" value="Cadastrar">
            </form>
            
        </div>
        
        <div id="rodape">
            <a id="index" href="Agenda.php">dias disponiveis?</a>
            <br>
            <a id="index" href="#">Perguntas?</a>
        </div>
    </body>
</html>

<?php
                if(isset($_POST['nome']) &&
                isset($_POST['email']) &&
                isset($_POST['nomepet']) &&
                isset($_POST['telefone']) &&
                isset($_POST['senha']))
        {
           if(empty($_POST['nome']) ||
                   empty($_POST['email']) ||
                   empty($_POST['nomepet']) ||
                   empty($_POST['telefone']) ||
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

               $u = new Cliente();
               $resultado = $u->InserirCliente($nome, $email, $nomepet, $telefone, $senha);
               echo $resultado;
               if($resultado == true)
               {
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
