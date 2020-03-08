<?php
include './verificaSessao.php';
$paroquia = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"]);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php require_once './header.php'; ?>
    <body>
        <div id="bg">
            <!--estrutura-->
            <div id="estrutura">
                <!--menu-->
                <?php require_once './menu_topo.php'; ?>
                <div id="conteudo">
                    <h3>Seja bem vindo(a) <?php echo $paroquia->nome; ?> ao sistema administrativo!</h3><br/>
                    <?php
                    require_once 'menu.php';
                    ?> 
                    <form name="formRelatorioDoadores">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Filtros para lista de doa&ccedil;&otilde;es</th></tr>
                                <tr>
                                    <td>Periodo: </td><td>

                                        <select id="mes">
                                            <?php
                                            $mes = date("m");
                                            
                                            for ($i = 0; $i <= 12; $i++) {
                                                $select = $i == $mes - 1 ? "Selected" : "";
                                                ?>
                                                <option <?= $select ?> value="<?= $i ?>"> <?= Utils::getMesExtenso($i) ?> </option>    
                                                <?php
                                            }
                                            ?>
                                            <!--<option value="1"> Janeiro </option>
                                            <option value="2"> Fevereiro </option>
                                            <option value="3"> Mar&ccedil;o </option>
                                            <option value="4"> Abril </option>
                                            <option value="5"> Maio </option>
                                            <option value="6"> Junho </option>
                                            <option value="7"> Julho </option>
                                            <option value="8"> Agosto </option>
                                            <option value="9"> Setembro </option>
                                            <option value="10"> Outubro </option>
                                            <option value="11"> Novembro </option>
                                            <option value="12"> Dezembro </option>-->
                                        </select>
                                        -
                                        <?php
                                        $ano = date("Y");
                                        ?>
                                        <input type="ano" id="ano" value="<?=$ano?>" size="4">

                                    </td>
                                </tr>   
                                <tr>
                                    <td>Par&oacute;quia: </td>
                                    <td>
                                        <select name="" id="paroquia">
                                            <option value="">-Qualquer-</option>
                                            <?php
                                            $arrayParoquia = DAOFactory::getParoquiaDAO()->queryAll();
                                            foreach ($arrayParoquia as $paroquia) {
                                                ?>
                                                <option value="<?= $paroquia->idparoquia ?>" > <?= $paroquia->paroquia ?> </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Zonal: </td>
                                    <td>
                                        <select name="" id="zonal">
                                            <option value="">-Qualquer-</option>
                                            <?php
                                            $arrayZonal = DAOFactory::getZonalDAO()->queryAll();
                                            foreach ($arrayZonal as $zonal) {
                                                ?>
                                                <option value="<?= $zonal->id ?>" > <?= $zonal->zonal ?> </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>Agrupar por Par&oacute;quia: </td>
                                    <td>
                                        <select name="" id="agrupar">
                                            <option value="0">-N&atilde;o-</option>
                                            <option value="1">-Sim-</option>                                            
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>Agrupar por Zonal: </td>
                                    <td>
                                        <select name="" id="agrupar_zonal">
                                            <option value="0">-N&atilde;o-</option>
                                            <option value="1">-Sim-</option>                                            
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>Agrupar por Data: </td>
                                    <td>
                                        <input type="date" name="agrupar_data" id="agrupar_data">
                                        <!--<select name="" id="agrupar_data">
                                            <option value="0">-N&atilde;o-</option>
                                            <option value="1">-Sim-</option>                                            
                                        </select>-->
                                    </td>
                                </tr> 
                                <tr><td colspan="2" align="center">
                                        <input type="button" id="botaoEnviar" value="Enviar" onClick="relatorioDoacoes();">
                                    </td>
                                </tr>
                                <tr class="rodape_form">
                                    <td colspan="15" id="relatorio"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <div ></div>                 
                </div>
            </div>
        </div>
    </body>
</html>