<?phpinclude "conexaoAcesso.php";//Recebendo os dados e tratando os mesmos para inserção no banco$recebeIdinscricao = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_SPECIAL_CHARS);$recebeNome = filter_input(INPUT_POST, 'nomeResponsavel', FILTER_SANITIZE_SPECIAL_CHARS);$recebeEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);$recebeTelefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);$recebeCep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);$recebeCpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);$recebeUf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_SPECIAL_CHARS);$recebeCidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);$recebeEndereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);$recebeModeloDrone = filter_input(INPUT_POST, 'modeloDrone', FILTER_SANITIZE_SPECIAL_CHARS);mysqli_query($conecta, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");$insereDados = mysqli_query($conecta,"UPDATE  alugar SET nomeResponsavel='$recebeNome', cpf='$recebeCpf', telefone='$recebeTelefone', cep='$recebeCep', uf='$recebeUf', cidade='$recebeCidade', endereco='$recebeEndereco', modeloDrone='$recebeModeloDrone' WHERE id_usuario='$recebeIdinscricao'") or die (mysqli_error($conecta));?><!DOCTYPE html><html><head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">    <meta name="author" content="Creative Tim">    <title>Aluguel de Drones</title>    <!-- Favicon -->    <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">    <!-- Fonts -->    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">    <!-- Icons -->    <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">    <!-- Argon CSS -->    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet"></head><body><div style="padding-top: 350px"></div><div class="container">    <div class="row">        <div class="col-md-12">            <div class='col-md-4'>                <div class='modal fade' id='modal-notification' tabindex='-1' role='dialog' aria-labelledby='modal-notification' aria-hidden='true'>                    <div class='modal-dialog modal-danger modal-dialog-centered modal-' role='document'>                        <div class='modal-content bg-gradient-danger'>                            <div class='modal-body'>                                <div class='py-3 text-center'>                                    <i class='ni ni-check-bold ni-3x'></i>                                    <h3 class='heading mt-4'>Aluguel editado com sucesso!</h3>                                </div>                            </div>                            <form action='home.php' method='post'>                                <input type='hidden' id='pesquisa' name='pesquisa' value='<?php echo $recebeNome; ?>'>                                <button class='btn btn-lg btn-block btn btn-secondary' type='submit'>OK</button>                            </form>                        </div>                    </div>                </div>            </div>        </div>    </div>    <!-- Argon Scripts -->    <!-- Core -->    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>    <!-- Argon JS -->    <script src="assets/js/argon.js?v=1.0.0"></script>    <script type="text/javascript">        $(document).ready(function() {            $('#modal-notification').modal('show');        })    </script></body></html>