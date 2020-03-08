<?php
include '../verificaSessao.php';
require_once '../header.php';
header('Content-Type: text/html; charset=ISO-8859-1');
$inicio = $_GET["inicio"];
$final = $_GET["final"];
$conexao = new Connection();
try {

    $sql = "select * from doacao d inner join doador do on do.iddoador=d.doador  ";
    $sql .= ($inicio != "" && $final !="" )?" and d.data between '".Utils::converteDataBrasilAmerica($inicio)."' and '".Utils::converteDataBrasilAmerica($final)."'":"";
    $sql .= " order by do.nome";    
    $result = $conexao->executeQuery($sql);
    ?>
    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
        <tbody>
            <tr>
                <td align="center">Data </td>                            
                <td align="center">Doador </td>                                                
                <td align="center">Valor </td>   
                <td>&nbsp;</td>
            </tr>

            <?php
            $valorTotal = 0;
            $qtde = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $qtde++;
                $valorTotal += $row["valor"];
                ?>
                <tr>
                    <td><?= Utils::converteData($row["data"]) ?> </td>                            
                    <td align="left"><?= DAOFactory::getDoadorDAO()->load($row["doador"])->nome ?> </td>                                                                   
                    <td align="right"><?= Utils::formatarValor($row["valor"]) ?> </td>                         
                </tr>
                <?php
            }
            ?>
            <tr>
                <td align="right">Quantidade: <?= $qtde ?></td>                                                                                        
                <td align="center">Valor Total</td>                    
                <td align="right"><?= Utils::formatarValor($valorTotal) ?> </td>                     
                <td>&nbsp;</td> 
            </tr>
        </tbody>
    </table>
    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
