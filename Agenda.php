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
                        <li><a href="Cadastro.php">Cadastro</a></li>
                        <li class="active"><a href="Agenda.php">Agendar Horário</a></li>
                        <li><a href="História.php">Historia</a></li>
                        <li><a href="Contato.php">Contato</a></li>
                    </ul>                       
                </div>             
            </div>
        </div>
        
        <div id="corpo">
            <form id="cadastro" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <p>Dia: <input name="dia" type="date" id="calendario"/></p>
                <p>Hora: <input name="hora" type="time" id="Hora"/></p>
                <input class="btn btn-success" type="submit" value="Agendar">
            </form>
            
            
        </div>
        
        <div id="rodape">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <a href="Agenda.php">dias disponiveis?</a>
            <br>
            <a href="Contato.php">Perguntas?</a>
        </div>
    </body>
</html>

<?php
                if(isset($_POST['dia']) &&
                isset($_POST['hora']))
        {
           if(empty($_POST['dia']) ||
                   empty($_POST['hora']))
           {         
                echo "<script type='text/javascript'>"
                    ."alert('Não deixe os campos em Branco');"
                ."</script>'";
           }
           else
           {
               $dia = $_POST['dia']; 
               $hora = $_POST['hora'];

               $u = new Cliente();
               $resultado = $u->Agendar($dia, $hora);
               if($resultado == true)
               {
                   echo "<script type='text/javascript'>"
                            ."alert('Agendamento Realizado com Sucesso');"
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