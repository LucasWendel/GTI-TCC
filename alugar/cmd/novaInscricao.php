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
    <script type="text/javascript">
        function mascara(telefone){
            if(telefone.value.length == 0)
                telefone.value = '(' + telefone.value;
            if(telefone.value.length == 3)
                telefone.value = telefone.value + ') ';
            if(telefone.value.length == 10)
                telefone.value = telefone.value + '-';

        }
    </script>


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
        <?php include 'navbar.php'; echo $navBar; ?>
    </div>
</nav>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->

            <!-- Form -->


        </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 450px; background-image: url(assets/img/theme/concart.png); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 order-lg-12">

                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Nova Inscrição</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="checkout.php" method="POST">
                            <input type="hidden" name="formulario" id="novaInscricao" value="novaInscricao">
                            <h6 class="heading-small text-muted mb-4">Dados pessoais</h6>
                            <dsiv class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nome*</label>
                                            <input type="text" id="nome" name="nome" class="form-control form-control-alternative" placeholder="Nome" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">E-mail*</label>
                                            <input type="email" id="email" name="email" class="form-control form-control-alternative" placeholder="exemplo@exemplo.com" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">CPF*</label>
                                            <input type="text" id="cpf" name="cpf" class="form-control form-control-alternative" placeholder="CPF" onkeypress="formatar(this,'999.999.999-99')" maxLength="14" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Celular</label>
                                            <input type="text" class="form-control form-control-alternative" name="telefone" id="telefone" placeholder="telefone" size="20" maxlength="15" onkeypress="mascara(this)">
                                        </div>
                                    </div>
                                </div>
                            </dsiv>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Endereço</h6>
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">CEP</label>
                                            <input class="form-control form-control-alternative" name="cep" id="cep" onkeypress="formatar(this,'99999-999')" maxLength="9" type="text">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">UF</label>
                                            <input type="text" class="form-control form-control-alternative" name="uf" id="uf" placeholder="UF" maxLength="2">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Cidade</label>
                                            <input type="text" class="form-control form-control-alternative" name="cidade" id="cidade" placeholder="Cidade" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Bairro</label>
                                            <input type="text" class="form-control form-control-alternative" name="bairro" id="bairro" placeholder="Bairro">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Endereço</label>
                                            <input type="text" class="form-control form-control-alternative" name="rua" id="rua" placeholder="Endereço" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Complemento</label>
                                            <input type="text" class="form-control form-control-alternative" name="complemento" id="address2" placeholder="Complemento">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4" />
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">Tipo de Inscrição</h6>
                            <div class="col-md-4">


                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck1" type="radio" name="tipoInscricao" value="1">
                                    <label class="custom-control-label" for="customCheck1">Não Associados</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck2" type="radio" name="tipoInscricao" value="2">
                                    <label class="custom-control-label" for="customCheck2">Acadêmicos de Direito (Graduação)</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck3" type="radio" name="tipoInscricao" value="3">
                                    <label class="custom-control-label" for="customCheck3">Associados do Sinoreg, Sindiregis, Sindinotars ou Sinoredi-CE</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck4" type="radio" name="tipoInscricao" value="4">
                                    <label class="custom-control-label" for="customCheck4">Tenho um cupom com desconto</label>
                                </div>

                            </div>

                            <hr class="my-4" />
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">Dados de pagamento</h6>
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck5" type="radio" name="pagamento" value="1">
                                    <label class="custom-control-label" for="customCheck5">Pago com cartão de crédito</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck6" type="radio" name="pagamento" value="2">
                                    <label class="custom-control-label" for="customCheck6">Pago com cartão de débito</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck7" type="radio" name="pagamento" value="3">
                                    <label class="custom-control-label" for="customCheck7">Insenção de pagamento</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck8" type="radio" name="pagamento" value="4">
                                    <label class="custom-control-label" for="customCheck8">Não pago</label>
                                </div>
                            </div>

                            <hr class="my-4" />
                            <button class="btn btn-lg btn-block btn-outline-success" type="submit">Finalizar inscrição</button>
                        </form>
                    </div>
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
<!-- Argon Scripts -->
<!-- Core -->
<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Argon JS -->
<script src="assets/js/argon.js?v=1.0.0"></script>
<script type="text/javascript" >

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado, por favor Corrija!");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido!");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

</script>

<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });


        $(".js-select2").each(function(){
            $(this).on('select2:close', function (e){
                if($(this).val() == "Please chooses") {
                    $('.js-show-service').slideUp();
                }
                else {
                    $('.js-show-service').slideUp();
                    $('.js-show-service').slideDown();
                }
            });
        });
    })
</script>

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


</body>

</html>