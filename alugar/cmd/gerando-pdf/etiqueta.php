<?php
$nomeCertificado = (isset($_GET['nomeCertificado'])) ? $_GET['nomeCertificado'] : '';
include("mpdf60/mpdf.php");
$nomeCertificado = mb_substr($nomeCertificado, 0, 22);
$html = "<samp>$nomeCertificado</samp>";

$mpdf=new mPDF('utf-8', [80, 40]);
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("css/estiloEtiqueta.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output();
$mpdf->AddPage();



exit;