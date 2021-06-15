<?php
ob_start();

include 'conexaoAcesso.php';
include 'acessoUsuario.php';
include 'navbar.php';

if ( $verificaInformacoes == 1 ) {

    $login = $_COOKIE["login"];
    $resultado = "SELECT * FROM usuario WHERE usuario = '$login'";
    $pesquisa = mysqli_query($conecta, $resultado) or die (mysqli_error($conecta));
    while ($listagem = mysqli_fetch_array($pesquisa)) {
        $suarioLogado = $listagem ["nome_usuario"];
    }

    $query = sprintf("SELECT * FROM expositor");
    $query2 = sprintf("SELECT * FROM expositor WHERE tipoInscricao = 200");
    $query3 = sprintf("SELECT * FROM expositor WHERE confirmado = 'CONFIRMADO'");

    $dados = mysqli_query($conecta, $query) or die (mysqli_error($conecta));
    $dados2 = mysqli_query($conecta, $query2) or die (mysqli_error($conecta));
    $dados3 = mysqli_query($conecta, $query3) or die (mysqli_error($conecta));

    $linha = mysqli_fetch_assoc($dados);

    $total = mysqli_num_rows($dados);
    $totalCupom1 = mysqli_num_rows($dados2);
    $totalConfirmado = mysqli_num_rows($dados3);

    $totalNaoConfirmado = $total - $totalConfirmado;

    mysqli_close($conecta);


    require 'conexao.php';

// Recebe o termo de pesquisa se existir
    $termo = (isset($_POST['pesquisa'])) ? $_POST['pesquisa'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
    if (empty($termo)):
//        Mostrar todos os cadastros
        $conexao = conexao::getInstance();
        $sql = 'SELECT idinscricao, nome, cpf, tipoInscricao, confirmado, email FROM expositor';
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
    else:

        // Executa uma consulta baseada no termo de pesquisa passado como parâmetro
        $conexao = conexao::getInstance();
        $sql = 'SELECT idinscricao, nome, cpf, tipoInscricao, confirmado, email FROM expositor WHERE nome LIKE :nome OR cpf LIKE :cpf';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':nome', $termo.'%');
        $stm->bindValue(':cpf', $termo.'%');
        $stm->execute();
        $clientes = $stm->fetchAll(PDO::FETCH_OBJ);

    endif;

    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <title>Confederação Nacional de Notários e Registradores</title>
        <!-- Favicon -->
        <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>

    <body>
    <!-- Sidenav -->
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="#">
                <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="assets/img/theme/cnr.png">
              </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Seja bem vindo!</h6>
                        </div>

                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Sair</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <?php echo $navBar; ?>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"></a>


                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="assets/img/theme/cnr.png">
                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $suarioLogado; ?></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Seja bem vindo!</h6>
                            </div>

                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Sair</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                </div>
            </div>
        </div>


        <!-- Page content -->
        <div class="container-fluid mt--7">


            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row">


                                <div class="card-body">
                                    <form action="gerando-pdf/relatorio.php" method="POST">
                                        <input type="hidden" name="idInscricao" id="idInscricao" value="">
                                        <h6 class="heading-small text-muted mb-4">Data do relatório</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-username">Do dia</label>
                                                            <input type="date" id="dataInicio" name="dataInicio" class="form-control form-control-alternative">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-email">Até</label>
                                                            <input type="date" id="dataFim" name="dataFim" class="form-control form-control-alternative">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class='row'>
                                            <div class='col-lg-10 text-center'>
                                                <button class="btn btn-lg btn-outline-success" type="submit">Imprimir relatório</button>
                                                <a href='home.php' class="btn btn-lg btn-outline-danger">Cancelar edição</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                            </div>
                        </div>



                        <!-- Footer -->
                        <footer class="footer">
                            <div class="row align-items-center justify-content-xl-between">
                                <div class="col-xl-6">
                                    <div class="copyright text-center text-xl-center text-muted">
                                        &copy; <?php echo date("Y"); ?> <a href="https://cnr.org.br" class="font-weight-bold ml-1" target="_blank">Confederação Nacional de Notários e Registradores</a>
                                    </div>
                                </div>
                                <div class="col-xl-6">

                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
            <!-- Argon Scripts -->
            <!-- Core -->
            <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
            <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Argon JS -->
            <script src="assets/js/argon.js?v=1.0.0"></script>
    </body>
    </html>

    <script>
        function formatar(src, mask)
        {
            var i = src.value.length;
            var saida = mask.substring(0,1);
            var texto = mask.substring(i)
            if (texto.substring(0,1) != saida)
            {
                src.value += texto.substring(0,1);
            }
        }
    </script>
    <?php
}
else {
    $urlAcesso = "login.php";
    echo "
    <script type='text/javascript'>
    alert('Proibido o acesso por esse meio. Volte e informe os dados corretamente. Obrigado e aguarde o redirecionamento para a tela inicial!');
    </script>";
    echo "<meta http-equiv=\"refresh\" content=\"1;URL=".$urlAcesso."\">";
}
?>