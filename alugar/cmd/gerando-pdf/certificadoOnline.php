<?php
include "../conexaoAcesso.php";
include("mpdf60/mpdf.php");

$nomeCertificado = filter_input(INPUT_POST, 'nomeCertificado', FILTER_SANITIZE_SPECIAL_CHARS);

//$verifica = mysqli_query($conecta,"SELECT nome FROM inscricao WHERE cpf = '$cpfCertificado'") or die(mysqli_error($conecta));
//while ($result = mysqli_fetch_array($verifica) )
//
//{
//    $nome = $result['nome'];
//}

$html = "<p>$nomeCertificado</p>";

$mpdf=new mPDF('utf-8', 'A4-L');
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("css/certificadoOnline.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output();
$mpdf->AddPage();



exit;