<?php
include '../verificaSessao.php';
error_reporting(E_ERROR);
require_once '../header.php';
//header('Content-Type: text/html; charset=UTF-8');
$status = $_GET["status"];

$paroquia = $_GET["paroquia"];
$agruparParoquia = $_GET["agruparParoquia"];
$adesao = $_GET["adesao"];
list($ano, $mes, $dia) = explode("-", $adesao);
$conexao = new Connection();
try {    

    $sql = "select count(d.iddoador) as qtde,d.paroquia as paroquia,"
            . "sum(valor_doacao) as valor from doador d where 1=1";
    $sql .= $status != "" ? " and status='$status' " : "";
    $sql .= $paroquia != "" ? " and paroquia='$paroquia' " : "";
    $sql .= $adesao != "" ? " and data_adesao between '$ano-$mes-01' and '$ano-$mes-31'" : "";
    $sql .= $agruparParoquia == "1" ? " group by paroquia " : "";
    //echo $sql;
    $result = $conexao->executeQuery($sql);
    ?>
    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
        <tbody>
            <tr>
                <td align="center">Paroquia </td>                            
                <td align="center">Qtde </td>                                                
                <td align="center">Valor </td>  
            </tr>

            <?php
            $valorTotal = 0;
            $qtde = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $qtde++;
                $valorTotal += $row["valor"];
                ?>
                <tr>
                                             
                    <td align="left">&nbsp;<?= utf8_decode(DAOFactory::getParoquiaDAO()->load($row["paroquia"])->paroquia) ?> </td>                                               
                    <td align="center"><?= $row["qtde"] ?> </td>                    
                    <td align="right"><?= Utils::formatarValor($row["valor"]) ?> </td>     
                    
                </tr>
                <?php
            }
            ?>
            <tr>
                                           
                <td align="center">Quantidade: <?= $qtde ?> </td>                                               
                <td align="center">Valor Total</td>                    
                <td align="right"><?= Utils::formatarValor($valorTotal) ?> </td>     
                <td>&nbsp;</td> 
            </tr>
            <tr>
                <td align="center" colspan="5">
                    <input type="button" value="Gerar PDF" 
                           onClick="location.href = 'controle/gerarPDF.php?status=<?= $status ?>&cidade=<?= $cidade ?>&paroquia=<?= $paroquia ?>';">
                    </td>                                               

            </tr>
        </tbody>
    </table>
    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
