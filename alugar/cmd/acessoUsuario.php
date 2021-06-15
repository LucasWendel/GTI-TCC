<?php

include 'conexaoAcesso.php';

$usuario = $_COOKIE["login"];
$criptoSenha = $_COOKIE["senha"];

$confirmacao = mysqli_query($conecta,"SELECT * FROM usuario WHERE usuario = '$usuario' and senha = '$criptoSenha'") or die (mysqli_error($conecta));

$verificaInformacoes = mysqli_num_rows($confirmacao);

?>
