<?php
ini_set('memory_limit', -1);
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
require_once '../include_dao.php';
ob_start();

header('Content-Type: text/html; charset=ISO-8859-1');
$status = $_GET["status"];
$cidade = $_GET["cidade"];
$paroquia = $_GET["paroquia"];

$conexao = new Connection();
try {

    $sql = "select nome,contrato,valor_doacao,status from doador where 1=1";
    $sql .= $status != "" ? " and status='$status' " : "";
    $sql .= $cidade != "" ? " and cidade='$cidade' " : "";
    $sql .= $paroquia != "" ? " and paroquia='$paroquia' " : "";
    //$sql .= " limit 2000";
    $result = $conexao->executeQuery($sql);
    ?>
    <table width='100%' cellpadding="0" cellspacing="0" border="0" 
           id="table" class="tinytable" style="background-color:#eee">                        
        <tbody>
            <!--<tr>
                <td align="left">
                    <?php
                    if($paroquia!=""){
                        echo "Par&oacute;quia: ".DAOFactory::getParoquiaDAO()->load($paroquia)->paroquia."<br>";
                    }
                    if($cidade!=""){
                        echo "Cidade: ".DAOFactory::getCidadeDAO()->load($cidade)->cidade."<br>";
                    }
                    if($status!=""){
                        echo "Situa&ccedil;&atilde;o: ";
                        echo $status=="0"?"Ativo":"Inativo";
                        echo "<br>";
                    }
                    ?>
                </td>
            </tr>-->
            <tr>
                <td align="center">Nome </td>                            
                <!--<td align="center">CPF </td>        -->                                   
                <td align="center">Contrato </td>                                                            
                <td align="center">Valor </td> 
                <!--<td align="center">Status</td>-->
            </tr>

    <?php
    $valorTotal = 0;
    $qtde = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $qtde++;
        $valorTotal += $row["valor_doacao"];
        ?>
                <tr>
                    <td><?= utf8_decode($row["nome"]) ?> </td>                            
                    <!--<td align="center">&nbsp;<?= $row["cpf"] ?> </td>    -->                                           
                    <td align="center"><?= $row["contrato"] ?> </td>                   
                    <td align="right"><?= Utils::formatarValor($row["valor_doacao"]) ?> </td>     
                   <!-- <td align="center"><?php echo $row["status"] == 0 ? "Ativo" : "Inativo"; ?> </td> -->
                </tr>
        <?php
    }
    ?>
            <tr>
                <!--<td align="right">Quantidade: </td>   -->                         
                <td align="center">Quantidade: <?= $qtde ?> </td>                                               
                <td align="center">Valor Total</td>                    
                <td align="right"><?= Utils::formatarValor($valorTotal) ?> </td>     
                <!--<td>&nbsp;</td> -->
            </tr>            
        </tbody>
    </table>
    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}

$html = ob_get_clean();
$html = utf8_encode($html);
include('../mpdf/mpdf.php');
$mpdf = new mPDF('c', 'A4');
$mpdf->WriteHTML($html);
$mpdf->packTableData = true;
$mpdf->SetHtmlFooter($footer);
$mpdf->Output("relatorio.pdf", 'D');
exit;
?>
