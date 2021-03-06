<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="icon" 
              type="image/png" 
              href="img/icon.png" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <title>Área administrativa</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <style type="text/css">
            .carousel-caption{
                font-size: 2vw;
            }
        </style>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <?php
        session_start();
        if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('Location: /index.php');
        }

        $logado = $_SESSION['login'];
        ?>
    </head>
    <body style="background-color: #c4c2c0;">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Principal</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="empresa.html">Empresa</a></li>
                        <li><a href="contato.html">Contato</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="login.php">Logar no sistema</a></li>
                                <li><a href="#">Cadastrar acesso</a></li>
                                <li><a href="#">Esqueci minha senha</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- /fim menu da pagina #ffb844;-->
        <!--<div class="container" style="background-color: #646366; min-height: 100px; width: auto"> <!-- topo da pagina -->       

        <!-- </div> <!-- fim da pagina -->
        <!--background-image: url(img/bg-banner-back.png), url(img/bg-banner-middle.png), url(img/bg-banner-front.png);-->
        <style>
            @keyframes backgroundMove {
                from {background-position-x: 0%, 50%, 100%}
                to {background-position-x: 1320%, 930%, 550%}
            }
        </style>

        <section style="background-color:#e0dee5;    
                 font-family: Oswald, sans-serif;
                 padding: 25px 90px;
                 font-size: 90px;
                 font-weight: bold;
                 text-transform: uppercase;
                 color: #7f6a5e;
                 background-image: url(img/bg-banner-front.png), url(img/bg-banner-middle.png), url(img/bg-banner-back.png);
                 background-repeat: repeat-x;
                 background-size: auto 100%;
                 animation: backgroundMove 120s linear 0s infinite reverse;
                 background-position-x: 0%, 50%, 100%;
                 animation-name: backgroundMove;
                 animation-duration: 120s;
                 animation-timing-function: linear;
                 animation-delay: 0s;
                 animation-iteration-count: infinite;
                 animation-direction: alternate;
                 animation-fill-mode: initial;
                 animation-play-state: initial;">
            <p><?php echo" Bem vindo $logado"; ?></p>
        </section>
        <div class="jumbotron">
            <div class="container">
                </br>
                <div class="row">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'banco.php';
                            $pdo = Banco::conectar();
                            $sql = 'SELECT * FROM pessoa ORDER BY id DESC';

                            foreach ($pdo->query($sql)as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['nome'] . '</td>';
                                echo '<td>' . $row['endereco'] . '</td>';
                                echo '<td>' . $row['telefone'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['sexo'] . '</td>';
                                echo '<td width=255>';
                                echo '<a class="btn btn-primary" href="read.php?id=' . $row['id'] . '">Imprimir</a>';
                                echo ' ';
                                echo '<a class="btn btn-warning" href="update.php?id=' . $row['id'] . '">Atualizar</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Excluir</a>';
                                echo '</td>';
                                echo '<tr>';
                            }
                            Banco::desconectar();
                            ?>
                        </tbody>                   
                    </table>     
                    <p>
                        <a href="create.php" class="btn btn-success">Adicionar</a>
                    </p>
                </div>
            </div>
        </div>
    </body>

</html>

