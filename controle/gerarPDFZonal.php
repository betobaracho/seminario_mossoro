<?php
ini_set('memory_limit', -1);
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
require_once '../include_dao.php';
ob_start();

header('Content-Type: text/html; charset=ISO-8859-1');
include '../verificaSessao.php';
ini_set("display_errors", "On");
error_reporting(E_ERROR);
//require_once '../header.php';
//header('Content-Type: text/html; charset=UTF-8');
$status = $_GET["status"];

$zonal = $_GET["zonal"];

$adesao = $_GET["adesao"];
list($ano, $mes, $dia) = explode("-", $adesao);
$conexao = new Connection();
try {

    $sql = "select d.*,z.zonal as zonal from doador d "
            . "inner join paroquia p on p.idparoquia = d.paroquia ";
    $sql .= " inner join zonal z on z.id = p.zonal ";

    $sql .= $status != "" ? " and d.status='$status' " : "";
    $sql .= $zonal != "" ? " and z.id='$zonal' " : "";
    $sql .= $adesao != "" ? " and data_adesao between '$ano-$mes-01' and '$ano-$mes-31'" : "";
    // $sql .= $agruparParoquia == "1" ? " group by paroquia " : "";
    //echo $sql;
    $result = $conexao->executeQuery($sql);
    ?>
    <table cellpadding="0" cellspacing="0" border="1" id="table" class="tinytable" style="font-size: 9;background-color:#eee">                        
        <tbody>
            <tr>
                <td align="center" nowrap>Doador </td>                            
                <td align="center">Ades&atilde;o </td>                                                               
                <td align="center">Par&oacute;quia </td>                            
                <td align="center">Zonal </td>                                                
                <td align="center">Valor </td>  
            </tr>

            <?php
            $valorTotal = 0;
            $qtde = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $qtde++;
                $valorTotal += $row["valor_doacao"];
                ?>
                <tr>                              
                    <td align="left">&nbsp;<?= utf8_decode($row["nome"]) ?> </td>                                               
                    <td align="center"><?= Utils::converteData($row["data_adesao"]) ?> </td>  
                    <td align="left" >&nbsp;<?= utf8_decode(DAOFactory::getParoquiaDAO()->load($row["paroquia"])->paroquia) ?> </td>                                                                                         
                    <td align="center"><?= utf8_decode($row["zonal"]) ?> </td>                                                            
                    <td align="right"><?= Utils::formatarValor($row["valor_doacao"]) ?> </td>   
                </tr>
                <?php
            }
            ?>
            <tr>
                <td>&nbsp;</td> <td>&nbsp;</td> 
                <td align="center">Quantidade: <?= $qtde ?> </td>                                               
                <td align="center">Valor Total</td>                    
                <td align="right"><?= Utils::formatarValor($valorTotal) ?> </td>     
            </tr>            
        </tbody>
    </table>
    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}

$html = ob_get_clean();
$html = utf8_encode($html);
//echo $html;
include('../mpdf/mpdf.php');
$mpdf = new mPDF('c', 'A4');
$mpdf->WriteHTML($html);
$mpdf->packTableData = true;
$mpdf->SetHtmlFooter($footer);
$mpdf->Output("relatorio_zonal.pdf", 'D');
exit;
?>
