<?php
include 'verificaSessao.php';
header("Content-Type: text/html; charset=iso-8859-1", true);
//error_reporting(E_ERROR);
require_once 'include_dao.php';
ob_start();
$fichaId = $_REQUEST["ficha"];
$ficha= DAOFactory::getDesistenciaDAO()->load($fichaId);
$doador = DAOFactory::getDoadorDAO()->load($ficha->doador);
?>

<form>
    <table border=1 style="border-collapse: collapse" width="100%">                        
        <tbody>
            <tr bgcolor="#FFFFFF"><td colspan="2" align="center">Semin&aacute;rio de Santa Terezinha</td></tr>
            <tr bgcolor="#FFFFFF"><td colspan="2" align="center">Ficha de Cancelamento - <?= $doador->nome ?> - 
                    <?= Utils::converteData($data) ?> - <?= DAOFactory::getCidadeDAO()->load($doador->cidade)->cidade ?></td></tr>

            <tr bgcolor="#FFFFFF">
                <td colspan="1">Nome do Doador:</td>
                <td><?= $doador->nome ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Data de Cancelamento:</td>
                <td><?= $doador->dataCancelamento != null ? date("d-m-Y", strtotime($doador->dataCancelamento)) : "N&atilde;o Informado" ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">CPF:</td>
                <td><?= $doador->cpf ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Par&oacute;quia:</td>
                <td><?= DAOFactory::getParoquiaDAO()->load($doador->paroquia)->paroquia ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Endere&ccedil;o:</td>
                <td><?= utf8_decode($doador->rua) ?>,<?= utf8_decode($doador->bairro) ?>,<?= DAOFactory::getCidadeDAO()->load($doador->cidade)->cidade ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Contrato:</td>
                <td><?= $doador->contrato ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Motivo:</td>
                <td><?= utf8_decode($ficha->motivo) ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Valor (R$):</td>
                <td><?= Utils::formatarValor($doador->valorDoacao) ?></td>            
            </tr>
        </tbody>
    </table>
</form>

<?php
$html = ob_get_clean();
$html = utf8_encode($html);
include('./mpdf/mpdf.php');
$mpdf = new mPDF('c', 'A4');
$mpdf->WriteHTML($html);
//echo $html;
$mpdf->SetHtmlFooter($footer);
$mpdf->Output("ficha_cancelamento_" . $doador->iddoador . ".pdf", 'D');
exit;


