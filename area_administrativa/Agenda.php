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
                        <li><a href="Cadastro.php">Cadastro</a></li>
                        <li class="active"><a href="Agenda.php">Agendar Horário</a></li>
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
                    <p>Dia</p>
                    <input name="dia" type="date">
                    <p>Hora</p>
                    <input name="hora" type="time">
                    <br>
                    <br>
                    <input class="btn btn-primary" name="opcao" type="submit" value="Atualizar">
            
            <h1>Agenda</h1>
                    <table class="table table-striped">
                    <tr>
                        <td>ID</td>
                        <td>DIA</td>
                        <td>HORA</td>
                        <td colspan="2">OPÇOES</td>
                    </tr>
                        <?php
                        $u = new Cliente();
                        $usuarios = $u->ListarTodosAgenda();
                        
                        foreach($usuarios as $user) 
                        {
                            $dia = date('d/m/Y H:i:s', strtotime($user->agenda));
                            echo "<tr>"
                                    ."<td>".$user->id."</td>"
                                    ."<td>".$dia."</td>"
                                    ."<td><a onclick='Editar(&quot;".$user->id."&quot;, &quot;".$user->agenda."&quot;);' href='#' class='btn btn-warning'>Editar</a></td>"
                                    ."<td><a onclick='return confirm(&quot;Tem Certeza?&quot;)' href='?id=".$user->id."&acao=deletar' class='btn btn-danger'>Excluir</a></td>"
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

    $dia = date('d/m/Y', strtotime($dia));
    if(isset($_GET['id']) && isset($_GET['acao']))
        {
            $id = $_GET['id'];
            $acao = $_GET['acao'];

            switch ($acao)
            {
                case "deletar";

                    $u = new Cliente();
                    $resultado = $u->DeletarAgenda($id);
                    if($resultado == true)
                    {
                        echo "<script type='text/javascript'>"
                            ."alert('Excluido');"
                            ."</script>'";

                        echo "<script type='text/javascript'>"
                            ."window.location.href='http://localhost/PetShop/area_administrativa/Agenda.php';"
                            ."</script>";
                    }
                    else
                    {
                        echo "<script type='text/javascript'>"
                        ."alert('Erro ao remover o usuario!');"
                        ."</script>'";
                    }
                break;

                Case "Atualizar";
                $resultado = $u->A($id, $agenda);
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