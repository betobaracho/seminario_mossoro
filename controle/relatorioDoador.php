<?php
include '../verificaSessao.php';

require_once '../header.php';
ini_set("display_erros", "On");
error_reporting(E_ALL);
header('Content-Type: text/html; charset=UTF-8');
$status = $_GET["status"];
$cidade = $_GET["cidade"];
$paroquia = $_GET["paroquia"];
$agruparParoquia = $_GET["agruparParoquia"];
$adesao = $_GET["adesao"];
list($ano,$mes,$dia) = explode("-",$adesao);

$conexao = new Connection();
try {

    $sql = "select * from doador where 1=1";
    $sql .= $status != "" ? " and status='$status' " : "";
    $sql .= $cidade != "" ? " and cidade='$cidade' " : "";
    $sql .= $paroquia != "" ? " and paroquia='$paroquia' " : "";
    //$sql .= $aniversario != "" ? " and nascimento='".Utils::converteDataBrasilAmerica($aniversario)."'":"";
    $sql .= $adesao != "" ? " and data_adesao between '$ano-$mes-01' and '$ano-$mes-31'" :"";
    $sql .= $agruparParoquia == "1" ? " group by paroquia ":"";
    //$sql .= " and (nome like 'a%' or nome like 'b%' or nome like 'c%')";
    $sql .= " order by nome";
//  /  echo $sql; die();
    $result = $conexao->executeQuery($sql);
    ?>
    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
        <tbody>
            <tr>
                <td align="center">Nome </td>                            
                <td align="center">CPF </td>                                                
                <td align="center">Contrato </td>                                                            
                <td align="center">Valor </td> 
                <td align="center">Status</td>
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
                    <td align="center">&nbsp;<?= $row["cpf"] ?> </td>                                               
                    <td align="center"><?= $row["contrato"] ?> </td>                    
                    <td align="right"><?= Utils::formatarValor($row["valor_doacao"]) ?> </td>     
                    <td align="center"><?php echo $row["status"] == 0 ? "Ativo" : "Inativo"; ?> </td> 
                </tr>
                <?php
            }
            ?>
            <tr>
                <td align="right">Quantidade: </td>                            
                <td align="center"><?= $qtde ?> </td>                                               
                <td align="center">Valor Total</td>                    
                <td align="right"><?= Utils::formatarValor($valorTotal) ?> </td>     
                <td>&nbsp;</td> 
            </tr>
            <tr>
                <td align="center" colspan="5">
                <input type="button" value="Gerar PDF" 
                onClick="location.href='controle/gerarPDF.php?status=<?= $status ?>&cidade=<?= $cidade ?>&paroquia=<?=$paroquia?>';">
                <input type="button" value="Gerar Arquivo Cosern" onClick="location.href='controle/gerarTXT.php?status=<?= $status ?>&cidade=<?= $cidade ?>&paroquia=<?=$paroquia?>';"></td>                                               
                
            </tr>
        </tbody>
    </table>
    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
