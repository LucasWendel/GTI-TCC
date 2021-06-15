<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alugar drone</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="form/images_rares/icons/logo-blue.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form/css/util.css">
    <link rel="stylesheet" type="text/css" href="form/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="bg-contact2" style="background-image: url('../form/images/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <!-- Recebendo e gravando os dados -->
            <?php

            include "conexao.php";

            //URL para a qual o usuário será enviado após ter preenchido todos os campos corretamente
            $urlAcesso = "http://localhost/gti";

            //Recebendo os dados e tratando os mesmos para inserção no banco
            $recebeModeloDrone = filter_input(INPUT_POST, 'modeloDrone', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeNomeresponsavel = filter_input(INPUT_POST, 'nomeResponsavel', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeTelefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeTelefone = str_replace("-", "", $recebeTelefone);
            $recebeTelefone = str_replace(" ", "", $recebeTelefone);
            $recebeCpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeCpf = str_replace("-", "", $recebeCpf);
            $recebeCpf = str_replace(" ", "", $recebeCpf);
            $recebeCpf = str_replace(".", "", $recebeCpf);
            $recebeEndereco = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeCEP = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeCEP = str_replace("-", "", $recebeCEP);
            $recebeUF = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeCidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeBairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
            $recebeEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


            if ($recebeEmail == NULL ) {
                echo "<p>Retorne e digite um e-mail válido por favor!";
                echo "<div class='container-contact2-form-btn'>
                    <div class='wrap-contact2-form-btn'>
                        <div class='contact2-form-bgbtn'></div>
                        <a class='contact2-form-btn' href='javascript:history.back();'>Voltar</a>                      
                        </button>
                    </div>
                </div>";
                return false;
            }

            else {
                $consultaBanco = mysqli_query($conecta,"SELECT * FROM alugar WHERE email = '$recebeEmail'") or die (mysqli_error($conecta));
                $verificaBanco = mysqli_num_rows($consultaBanco);

                if($verificaBanco == 1){

                    echo "<p style='text-align: left;'>O endereço de e-mail <strong>$recebeEmail </strong> já consta em nossa base de dados!</p>";
                    echo "<div class='container-contact2-form-btn'>
                    <div class='wrap-contact2-form-btn'>
                        <div class='contact2-form-bgbtn'></div>
                        <a class='contact2-form-btn' href='javascript:history.back();'>Informe um novo email</a>                      
                        </button>
                    </div>
                </div>";
                    return false;
                }

//Agora vamos inserir os dados no banco
                $data_aluguel = date("d/m/Y");
                mysqli_query($conecta, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                $insereDados = mysqli_query($conecta,"INSERT INTO alugar (modeloDrone, nomeResponsavel, telefone, endereco, cep, uf, cidade, bairro, email, cpf, data_aluguel) VALUES ('$recebeModeloDrone', '$recebeNomeresponsavel', '$recebeTelefone', '$recebeEndereco', '$recebeCEP', '$recebeUF', '$recebeCidade', '$recebeBairro', '$recebeEmail', '$recebeCpf', '$data_aluguel')") or die (mysqli_error($conecta));

                echo "<p>Seu cadastro foi efetuado com sucesso!</p>";
                echo "<p>Seu drone já está sendo separado.</p>";
                echo "<p>Enviamos um e-mail de confirmação para o e-mail informado.</p>";
                echo "<p>Estamos redirecinando você para nosso site!</p>";
                $pagEmail = require_once 'email.html' ;
                $emailDrone = "alugar@drones.com";
                include ("vendor/phpmailer/class.phpmailer.php");

                $headers = "Content-type:text/html; charset=utf-8";
                $headers = "From: alugar@drones.com";
                $destino = $recebeEmail.','.$emailDrone;
                $de = utf8_decode("Aluguel de Drones");
                $assunto = utf8_decode("Seu Drone foi alugado");
                $html = $pagEmail;
                $mail = new PHPMailer(); // criando a nova classe - instnciando
                $mail->IsSMTP = ("smtp");
                $mail->Mailer = ("mail");
                $mail->SMTPSecure = "ssl";
                $mail->SMTPAuth = true;
                $mail->CharSet = 'utf-8';
                $mail->Username = ("alugar@drones.com");
                $mail->Password = ("Drone@2020");
                $mail->Sender = ("alugar@drones.com");
                $mail->From = ("alugar@drones.com");
                $mail->FromName = $de;
                $mail->AddAddress ($destino);
                $mail->Addbcc ($email);
                $mail->AddReplyTo("$email","$nome");
                $mail->Wordwrap = 50;
                $mail->Subject = ($assunto);
                $mail->IsHTML = (true);
                $texto = "body";
                $mail->Body = $html;
                $mail->AltBody =$texto;

                if($mail->Send($destino, "Recuperação de dados!", $html, $headers)){
                    echo "<div class='col-md-4'>
                        <div class='modal fade' id='modal-notification' tabindex='-1' role='dialog' aria-labelledby='modal-notification' aria-hidden='true'>
                            <div class='modal-dialog modal-danger modal-dialog-centered modal-' role='document'>
                                <div class='modal-content bg-gradient-danger'>
                                    <div class='modal-body'>
                                        <div class='py-3 text-center'>
                                            <i class='ni ni-check-bold ni-3x'></i>
                                            <h3 class='heading mt-4'>Comprovante enviado para o email com sucesso!</h3>
                                        </div>
                                    </div>
                                    <form action='home.php' method='post'>
                                        <input type='hidden' id='pesquisa' name='pesquisa' value='$recebeCpf'>
                                        <button class='btn btn-lg btn-block btn btn-secondary' type='submit'>OK</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>";
                } else {echo "<div class='col-md-4'>
                        <div class='modal fade' id='modal-notification' tabindex='-1' role='dialog' aria-labelledby='modal-notification' aria-hidden='true'>
                            <div class='modal-dialog modal-danger modal-dialog-centered modal-' role='document'>
                                <div class='modal-content bg-gradient-danger'>
                                    <div class='modal-body'>
                                        <div class='py-3 text-center'>
                                            <i class='ni ni-check-bold ni-3x'></i>
                                            <h3 class='heading mt-4'>Houve um problema!</h3>
                                        </div>
                                    </div>
                                    <form action='home.php' method='post'>
                                        <input type='hidden' id='pesquisa' name='pesquisa' value='$recebeCpf'>
                                        <button class='btn btn-lg btn-block btn btn-secondary' type='submit'>OK</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>";};

                echo "<meta http-equiv=\"refresh\" content=\"10;URL=".$urlAcesso."\">";
            }


            ?>

        </div>
    </div>
</div>
</body>
</html>
