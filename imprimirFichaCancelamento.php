<?php
include 'verificaSessao.php';
header("Content-Type: text/html; charset=utf-8", true);
error_reporting(E_ERROR);
require_once 'include_dao.php';
$doador = DAOFactory::getDoadorDAO()->load($_GET["id"]);
$motivo = $_GET["motivo"];
$data = $_GET["data"];
$doador->motivoCancelamento = $motivo;
$doador->dataCancelamento = Utils::converteDataBrasilAmerica($data);
DAOFactory::getDoadorDAO()->update($doador);
$desistencia = new Desistencia();
$desistencia->data = Utils::converteDataBrasilAmerica($data);
$desistencia->motivo = $motivo;
$desistencia->doador = $doador->iddoador;
$paroquia = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"]);
$desistencia->usuario = $_SESSION["usuario"];
DAOFactory::getDesistenciaDAO()->insert($desistencia);

?>

<form>
    <table border=1 style="border-collapse: collapse" width="100%">                        
        <tbody>
            <tr bgcolor="#FFFFFF"><td colspan="2" align="center">Semin&aacute;rio</td></tr>
            <tr bgcolor="#FFFFFF"><td colspan="2" align="center">Cancelamento - <?= $doador->nome ?> - 
                    <?= Utils::converteData($data) ?> - <?= DAOFactory::getCidadeDAO()->load($doador->cidade)->cidade ?></td></tr>

            <tr bgcolor="#FFFFFF">
                <td colspan="1">Nome do Doador:</td>
                <td><?= $doador->nome ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Data de Anivers&aacute;rio:</td>
                <td><?= $doador->nascimento != null ? date("d-m", strtotime($doador->nascimento)) : "N&atilde;o Informado" ?></td>            
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
                <td><?= $doador->rua ?>,<?= $doador->bairro ?>,<?= DAOFactory::getCidadeDAO()->load($doador->cidade)->cidade ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Contrato:</td>
                <td><?= $doador->contrato ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Motivo:</td>
                <td><?= $desistencia->motivo ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Valor:</td>
                <td><?= Utils::formatarValor($doador->valorDoacao) ?></td>            
            </tr>
            <tr bgcolor="#FFFFFF">
                <td colspan="1">Data De Cancelamento:</td>
                <td><?= $data ?></td>            
            </tr>
        </tbody>
    </table>
</form>

<?php
$html = ob_get_clean();
$html = utf8_encode($html);
include('MPDF/mpdf.php');
$mpdf = new mPDF('c', 'A4');
$mpdf->WriteHTML($html);

$mpdf->SetHtmlFooter($footer);
$mpdf->Output("ficha_cancelamento_" . $doador->iddoador . ".pdf", 'D');
exit;
?>

