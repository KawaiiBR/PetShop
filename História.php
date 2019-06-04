<?php
    namespace PetShop;
    include 'Classes/Historia.php';
    
    $h = new Historia();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- JQUEY -->
        <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
        
        <!--Bootstrap-->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        
        <!--meu CSS -->
        <link href="CSS/estilo.css" rel="stylesheet" type="text/css"/>
        
        <!--Font Awesomw-->
        <link href="CSS/all.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/all.min.js" type="text/javascript"></script>
        <title></title>
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
                        <li class="active"><a href="História.php">Historia</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="corpo">
            <h1>História</h1>
            
            <div id="textoHistoria">
                <p>
                    <?php
                        $h = new Historia();
                        $resultado = $h->ListarHistoria();
                        echo $resultado->historia;
                    ?>
                </p>
            </div>
        </div>
        
        <div id="rodape">
            <a href="Agenda.php">dias disponiveis?</a>
        </div>
    </body>
</html>