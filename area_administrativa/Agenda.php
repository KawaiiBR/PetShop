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
        function Editar(id, dia, hora)
            {
                document.getElementsByName('id')[0].value = id;
                document.getElementsByName('dia')[0].value = dia;
                document.getElementsByName('hora')[0].value = hora;
                
                document.getElementById('agendarBtn').style.display = "none";
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
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                    <h2>Novo usuário</h2>
                    <p>ID</p>
                    <input name="id" type="text">
                    <p>Dia</p>
                    <input name="dia" type="date">
                    <p>Hora</p>
                    <input name="hora" type="time">
                    <br>
                    <br>
                    <input id="agendarBtn" class="btn btn-primary" name="opcao" type="submit" value="Agendar">
                    <input id="atualizarBtn" style="display: none;" class="btn btn-warning" name="opcao" type="submit" value="Atualizar">
            
            <h1>Agenda</h1>
                    <table class="table table-striped">
                    <tr>
                        <td>ID</td>
                        <td>DIA</td>
                        <td>HORA</td>
                        <td colspan="2">OPÇOES</td>
                    </tr>
                        <?php
                        $c = new Cliente();
                        $clientes = $c->ListarTodosAgenda();
                        
                        foreach($clientes as $user) 
                        {
                            $dia = date('Y-m-d', strtotime($user->agenda));
                            $hora = date('H:i:s', strtotime($user->agenda));
                            echo "<tr>"
                                    ."<td>".$user->id."</td>"
                                    ."<td>".$dia."</td>"
                                    ."<td>".$hora."</td>"
                                    ."<td><a onclick='Editar(&quot;".$user->id."&quot;, &quot;".$dia."&quot;, &quot;".$hora."&quot;);' href='#' class='btn btn-warning'>Editar</a></td>"
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

    $dia = date('d/m/Y', strtotime($dia));
    if(isset($_GET['id']) && isset($_GET['opcao']) && isset($_GET['dia']) && isset($_GET['hora']))
        {
            if(empty($_GET['dia']) || empty($_GET['hora']))            
            {
                echo "<script type='text/javascript'>"
                        ."alert('Não deixe os campos em branco');"
                        ."window.location.href='http://localhost/PetShop/area_administrativa/Agenda.php';"
                        ."</script>'";
            }
            else
            {
                $id = $_GET['id'];
                $dia = $_GET['dia'];
                $hora = $_GET['hora'];
                $opcao = $_GET['opcao'];
                
                $c = new Cliente();
                
                switch ($opcao)
                {
                    Case "Atualizar";
                    $agenda = "$dia $hora";    
                    $resultado = $c->AlterarAgenda($id, $agenda);
                    if($resultado == true)
                    {
                        echo "<script type='text/javascript'>"
                                ."alert('Alterado com sucesso');"
                                ."window.location.href='http://localhost/PetShop/area_administrativa/Agenda.php';"
                            ."</script>'";
                    }
                    else
                    {
                        echo "<script type='text/javascript'>"
                                ."alert('Erro ao alterar o usuario!');"
                            ."</script>'";
                    }
                    Break; 
                    
                    case "Deletar";
                        
                        
                        Break;

                    case "Agendar";
                        $resultado = $c->Agendar($dia, $hora);
                        if($resultado == true)
                        {
                            echo "<script type='text/javascript'>"
                                    ."alert('Agendamento Realizado com Sucesso');"
                                    ."window.location.href='http://localhost/PetShop/area_administrativa/Agenda.php';"
                                ."</script>'";
                                }
                            else
                            {
                                echo "<script type='text/javascript'>"
                                        ."alert('Erro');"
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
        $resultado = $c->DeletarAgenda($id);

        if($resultado == 1)
        {
            echo "<script type='text/javascript'>"
                ."alert('Excluido');"
                ."window.location.href='http://localhost/PetShop/area_administrativa/Agenda.php';"
                ."</script>'";
        }
        else
        {
            echo "<script type='text/javascript'>"
                ."alert('Erro ao excluir o agendamento!');"
                ."window.location.href='http://localhost/PetShop/area_administrativa/Agenda.php';"
                ."</script>'";
        }
    }
}