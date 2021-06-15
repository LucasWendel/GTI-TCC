<?php
include "../conexaoAcesso.php";
//include("mpdf60/mpdf.php");

$dataInicio = filter_input(INPUT_POST, 'dataInicio', FILTER_SANITIZE_SPECIAL_CHARS);
$dataFim = filter_input(INPUT_POST, 'dataFim', FILTER_SANITIZE_SPECIAL_CHARS);


$verifica = mysqli_query($conecta,"SELECT * FROM inscricao WHERE dataInscricao = '$dataInicio'") or die(mysqli_error($conecta));
while ($result = mysqli_fetch_array($verifica) )

{
    $nome = $result['nome'];
    $tipoInscricao = $result['tipoInscricao'];
    $dataInscricao = $result['dataInscricao'];
    $inscricaoLocal = $result['inscricaoLocal'];
    $valorInscricao = $result['valorInscricao'];

    if ($tipoInscricao == 1){
        $tipoInscricao = "Não associado";
    }elseif ($tipoInscricao == 2){
        $tipoInscricao = "Acadêmico de Direito";
    }elseif ($tipoInscricao == 3){
        $tipoInscricao = "Associado";
    }else{
        $tipoInscricao = "Cupom de desconto";
    }

}

echo "<table style='width:100%' border='1'>
  <tr>
    <th>Nome</th>
    <th>Tipo de inscrição</th>
    <th>Data da Inscricao</th>
    <th>Inscrição local</th>
    <th>Valor da Inscrição</th>
  </tr>
  <tr>
    <td>$nome</td>
    <td>$tipoInscricao</td>
    <td>$dataInscricao</td>
    <td>$inscricaoLocal</td>
    <td>$valorInscricao</td>
  </tr>
  </table>";


//$html = "<p>$nomeCertificado</p>";
//
//$mpdf=new mPDF('utf-8', 'A4-L');
//$mpdf->SetDisplayMode('fullpage');
//$css = file_get_contents("css/relatorio.css");
//$mpdf->WriteHTML($css,1);
//$mpdf->WriteHTML($html);
//$mpdf->Output();
//$mpdf->AddPage();



//exit;