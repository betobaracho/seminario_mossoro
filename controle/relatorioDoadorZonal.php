<?php
include '../verificaSessao.php';
ini_set("display_errors", "On");
error_reporting(E_ERROR);
//require_once '../header.php';
header('Content-Type: text/html; charset=UTF-8');
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
   <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
        <tbody>
            <tr>
                <td align="center">Doador </td>                            
                <td align="center">Ades&atilde;o </td>                                                               
                <td align="center">Paroquia </td>                            
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
                    <td align="left">&nbsp;<?= $row["nome"] ?> </td>                                               
                    <td align="center"><?= Utils::converteData($row["data_adesao"]) ?> </td>  
                    <td align="left">&nbsp;<?= DAOFactory::getParoquiaDAO()->load($row["paroquia"])->paroquia ?> </td>                                                                                         
                    <td align="center"><?= $row["zonal"] ?> </td>                                                            
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
            <tr>
                <td align="center" colspan="6">
                    <input type="button" value="Gerar PDF" 
                           onClick="location.href = 'controle/gerarPDFZonal.php?status=<?= $status ?>&adesao=<?= $adesao ?>&zonal=<?= $zonal ?>';">
                </td>                                               

            </tr>
        </tbody>
    </table>
    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
