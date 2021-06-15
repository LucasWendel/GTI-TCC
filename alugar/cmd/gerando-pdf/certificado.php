<?php
    $nomeCertificado = (isset($_GET['nomeCertificado'])) ? $_GET['nomeCertificado'] : '';
 include("mpdf60/mpdf.php");

 $html = "<p>$nomeCertificado</p>";

 $mpdf=new mPDF('utf-8', 'A4-L');
 $mpdf->SetDisplayMode('fullpage');
 $css = file_get_contents("css/estilo.css");
 $mpdf->WriteHTML($css,1);
 $mpdf->WriteHTML($html);
 $mpdf->Output();
$mpdf->AddPage();



 exit;