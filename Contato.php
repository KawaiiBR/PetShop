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
                        <li><a href="Agenda.php">Agendar Horário</a></li>
                        <li><a href="História.php">Historia</a></li>
                        <li class="active"><a href="Contato.php">Contato</a></li>
                    </ul>                       
                </div>             
            </div>
        </div>
        
        <div id="corpo">
            <form id="cadastro" action="#" method="GET">
                <p>Nome Completo</p>
                <input placeholder="Nome Completo" type="text">
                <p>Email</p>
                <input placeholder="email@examplo" type="text">
                <p>Telefone</p>
                <input placeholder="(99) 99999-9999" type="text">
                <p>Mensagem</p>
                <textarea width="200" height="200"></textarea>
                <br>
                <input class="btn btn-success" type="submit" value="Enviar">
            </form>
        </div>
        
        <div id="rodape">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <a id="index" href="#">dias disponiveis?</a>
            <br>
            <a id="index" href="#">Perguntas?</a>
        </div>
    </body>
</html>