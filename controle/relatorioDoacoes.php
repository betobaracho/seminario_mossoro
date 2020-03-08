<?php
include '../verificaSessao.php';
require_once '../header.php';
//ini_set("display_errors", "On");
header('Content-Type: text/html; charset=ISO-8859-1');
$mes = $_GET["mes"];
$ano = $_GET["ano"];
$inicio = "$ano-$mes-01";
$final = "$ano-$mes-31 23:59:00";
$paroquia = $_GET["paroquia"];
$agrupar = $_GET["agrupar"];
$agruparData = $_GET["agrupar_data"];
$zonal = $_GET["zonal"];
$agrupar_zonal = $_GET["agrupar_zonal"];
$conexao = new Connection();

if ($agrupar == 1) {
    try {

        $sql = "select count(do.iddoador) as qtde,sum(d.valor) as valor, p.paroquia from "
                . "doacao d inner join doador do on do.contrato=d.doador  ";
        $sql .= "inner join paroquia p on p.idparoquia = do.paroquia ";
        $sql .= ($inicio != "" && $final != "" ) ? " and d.data between '" . @Utils::converteDataBrasilAmerica($inicio) . "' and '" . @Utils::converteDataBrasilAmerica($final) . "'" : "";
        $sql .= $paroquia != "" ? " and do.paroquia = '$paroquia'" : "";
        $sql .= ($agruparData != "") ? " and data = '$agruparData' " : "";
        $sql .= ($zonal != "") ? " and zonal='$zonal' ":"";
        $sql .= " and d.cod_movimento=6  group by p.idparoquia order by do.paroquia";


        // echo $sql;
        // die();
        $conexao->executeQuery("SET SQL_BIG_SELECTS=1");
        $result = $conexao->executeQuery($sql);
        ?>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
            <tbody>
                <tr>                                 
                    <td align="left">Par&oacute;quia </td>  
                    <td align="center">Qtde </td> 

                    <td align="center">Valor </td> 
                    <td align="center">M&eacute;dia </td>
                </tr>

                <?php
                $valorTotal = 0;
                $qtde = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $qtde += $row["qtde"];
                    $valorTotal += $row["valor"];
                    $media = $row["valor"] / $row["qtde"];
                    ?>
                    <tr>                             
                        <td align="left"><?= $row["paroquia"] ?> </td> 
                        <td align="right"><?= $row["qtde"] ?> </td> 

                        <td align="right"><?= Utils::formatarValor($row["valor"]) ?> </td>  
                        <td align="right"><?= Utils::formatarValor($media) ?> </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>                                                                                                           
                    <td align="center" colspan="1">Valor Total</td>   
                    <td align="right" colspan="1"><?= $qtde ?></td> 
                    <td align="right"><?= Utils::formatarValor($valorTotal) ?> </td>  
                    <td align="right"><?php
                        if ($qtde != 0) {
                            try {
                                echo Utils::formatarValor($valorTotal / $qtde);
                            } catch (Exception $ex) {
                                echo $qtde;
                            }
                        }
                        ?> </td> 
                </tr>
            </tbody>
        </table>
        <?php
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else
if ($agruparData != "") {
    try {

        $sql = "SELECT data, sum(valor) as valor,count(*) as qtde FROM `doacao` "
                . "WHERE data = '$agruparData'"
                . " and cod_movimento=6 group by data ";


        //echo $sql;
        //die();
        $conexao->executeQuery("SET SQL_BIG_SELECTS=1");
        $result = $conexao->executeQuery($sql);
        ?>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
            <tbody>
                <tr>                                 
                    <td align="left">Data </td>  
                    <td align="center">Qtde </td> 

                    <td align="center">Valor </td> 
                    <td align="center">M&eacute;dia </td>
                </tr>

                <?php
                $valorTotal = 0;
                $qtde = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $qtde++;
                    $valorTotal += $row["valor"];
                    ?>
                    <tr>                             
                        <td align="left"><?= Utils::converteData($row["data"]) ?> </td> 
                        <td align="right"><?= $row["qtde"] ?> </td> 

                        <td align="right"><?= Utils::formatarValor($row["valor"]) ?> </td>  
                        <td align="right"><?= Utils::formatarValor($row["valor"] / $row["qtde"]) ?> </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>                                                                                                           
                    <td align="center" colspan="2">Valor Total</td>                    
                    <td align="right"><?= Utils::formatarValor($valorTotal) ?> </td>                     
                    <td>&nbsp;</td> 
                </tr>
            </tbody>
        </table>
        <?php
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else

if ($agrupar_zonal != "") {
    try {
       
        $sql = "select count(do.iddoador) as qtde,sum(d.valor) as valor, z.zonal as zonal from "
                . "doacao d inner join doador do on do.contrato=d.doador  ";
        $sql .= "inner join paroquia p on p.idparoquia = do.paroquia ";
        $sql .= "inner join zonal z on z.id = p.zonal ";
        $sql .= ($inicio != "" && $final != "" ) ? " and d.data between '" . @Utils::converteDataBrasilAmerica($inicio) . "' and '" . @Utils::converteDataBrasilAmerica($final) . "'" : "";
        $sql .= $paroquia != "" ? " and do.paroquia = '$paroquia'" : "";
        $sql .= ($zonal != "") ? " and zonal= 'zonal' " : "";
        //$sql .= ($agrupar_zonal != "") ? " group by p.zonal " : "";

        $sql .= " and d.cod_movimento=6  group by p.zonal order by p.zonal";

       // echo $sql;
       // die();
        $conexao->executeQuery("SET SQL_BIG_SELECTS=1");
        $result = $conexao->executeQuery($sql);
        ?>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
            <tbody>
                <tr>                                 
                    <td align="left">Zonal </td>  
                    <td align="center">Qtde </td> 

                    <td align="center">Valor </td> 
                    <td align="center">M&eacute;dia </td>
                </tr>

                <?php
                $valorTotal = 0;
                $qtde = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $qtde++;
                    $valorTotal += $row["valor"];
                    ?>
                    <tr>                             
                        <td align="left"><?= utf8_decode($row["zonal"]) ?> </td> 
                        <td align="right"><?= $row["qtde"] ?> </td> 

                        <td align="right"><?= Utils::formatarValor($row["valor"]) ?> </td>  
                        <td align="right"><?= Utils::formatarValor($row["valor"] / $row["qtde"]) ?> </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>                                                                                                           
                    <td align="center" colspan="2">Valor Total</td>                    
                    <td align="right"><?= Utils::formatarValor($valorTotal) ?> </td>                     
                    <td>&nbsp;</td> 
                </tr>
            </tbody>
        </table>
        <?php
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    try {

        $sql = "select d.data_vencimento,do.nome,d.valor,do.contrato from doacao d inner join doador do on do.contrato=d.doador  ";

        $sql .= ($inicio != "" && $final != "" ) ? " and d.data between '" . @Utils::converteDataBrasilAmerica($inicio) . "' and '" . @Utils::converteDataBrasilAmerica($final) . "'" : "";

        $sql .= " and d.cod_movimento=6  order by do.paroquia";

        /* $sql = "select * from doacao d where 1=1 ";
          $sql .= ($inicio != "" && $final != "" ) ? " and d.data between '" . @Utils::converteDataBrasilAmerica($inicio) . "' and '" . @Utils::converteDataBrasilAmerica($final) . "'" : "";
          $sql .= " and do.cod_movimento=5 "; */
        //echo $sql;
        //die();
        $conexao->executeQuery("SET SQL_BIG_SELECTS=1");
        $result = $conexao->executeQuery($sql);
        ?>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
            <tbody>
                <tr>
                    <td align="center">Data </td>                            
                    <td align="center">Doador </td>  
                    <td align="center">Contrato </td>  
                    <td align="center">Valor </td>  
                    <td align="center">Par&oacute;quia </td>                  
                </tr>

                <?php
                $valorTotal = 0;
                $qtde = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $qtde++;
                    $valorTotal += $row["valor"];
                    $doador = DAOFactory::getDoadorDAO()->queryByContrato($row["contrato"]);
                    //var_dump($row);
                    //echo "<br><br>";
                    // $lista = DAOFactory::getDoadorDAO()->queryByContrato($row["doador"]);
                    //var_dump($lista);
                    ?>
                    <tr>
                        <td><?= @Utils::converteData($row["data"]) ?> </td>                            
                        <td align="left"><?= $doador->nome ?> </td>                                                                   
                        <td align="right"><?= $doador->contrato ?> </td>                         
                        <td align="right"><?= Utils::formatarValor($row["valor"]) ?> </td>    
                        <td align="right"><?= DAOFactory::getParoquiaDAO()->load($doador->paroquia)->paroquia ?> </td>    
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td align="right" colspan="2">Quantidade: <?= $qtde ?></td>                                                                                        
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
}
?>
