<?php
    namespace PetShop;
    include '../Classes/Historia.php';
    
    $h = new Historia();
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
                        <li><a href="Agenda.php">Agendar Horário</a></li>
                        <li class="active"><a href="Historia.php">Historia</a></li>
                        <li><a href="Usuarios.php">Usuários</a></li>
                        <li><a href="../index.php">Sair</a></li>
                    </ul>                       
                </div>             
            </div>
        </div>
        
        <div id="corpo">
            <h1>Historia do PetShop</h1>
            
            <div id="HistoriaAdmin">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                   <textarea id="CampoHistoria" name="texto">
                        <?php
                            $resultado = $h->ListarHistoria();
                            echo $resultado->historia;
                        ?>
                   </textarea>
                    <br>
                    <div id="HistoriaAdminButton">
                        <input class="btn btn-success" name="opcao" type="submit" value="Atualizar">
                        <input onclick="Cancelar()" name="opcao" class="btn btn-danger" type="submit" value="Cancelar">   
                    </div>
               </form>
            </div>
        </div>
        
        <div id="rodape">
            
        </div>
    </body>
</html>
<?php
    if(isset($_POST['texto']) && isset($_POST['opcao']))
    {
        if(empty($_POST['texto']))
        {
            echo "<script type='text/javascript'> alert('Não deixe os campos em branco');</script>";
        }
        else
        {
            $historia = $_POST['texto'];
            $opcao = $_POST['opcao'];
            
            $h = new Historia();
                
            switch ($opcao)
            {
                case "Atualizar":
                    $resultado = $h->AtualizarHistoria($historia);
                    
                    if($resultado == 1)
                    {
                        echo "<script type='text/javascript'> "
                                        ."alert('Atualizado com Sucesso'); "
                                        ."window.location.href='http://localhost/PetShop/area_administrativa/Historia.php';"
                                    ."</script>";
                    }
                    else
                    {
                        echo "<script type='text/javascript'> "
                                        ."alert('Ouve algum erro ao atualizar); "
                                        ."window.location.href='http://localhost/PetShop/area_administrativa/Historia.php';"
                                    ."</script>";
                    }
            break;
            }
        }
    }