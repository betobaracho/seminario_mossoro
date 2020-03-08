<?php
include './verificaSessao.php';
$usuario = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"]);
error_reporting(E_ERROR);
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
                    <h3>Seja bem vindo(a) <?php echo $usuario->nome; ?> ao sistema administrativo!</h3><br/>
                    <?php
                    require_once 'menu.php';
                    ?> 
                    <form name="formRelatorioDoadores">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Filtros para lista de doadores</th></tr>
                                <tr>
                                    <td>Status: </td><td>
                                        <select id="status">
                                            <option value="">-Selecione-</option>
                                            <option value="0">Ativo</option>
                                            <option value="1">Inativo</option>
                                        </select>
                                    </td>
                                </tr>   
                                <!--<tr>
                                    <td>Cidade: </td><td>
                                        <select id="cidade">
                                            <option value="">-Selecione-</option>
                                            <?php
                                            $arrayCidades = DAOFactory::getCidadeDAO()->queryAll();
                                            foreach ($arrayCidades as $cidade) {
                                                ?>
                                                <option value="<?= $cidade->idcidade ?>"><?= $cidade->cidade ?></option>            
                                                <?php
                                            }
                                            ?>                                            
                                        </select>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td>Paroquia: </td><td>
                                        <select id="paroquia">
                                            <option value="">-Selecione-</option>
                                            <?php
                                            $arrayParoquias = DAOFactory::getParoquiaDAO()->queryAll();
                                            foreach ($arrayParoquias as $paroquia) {
                                                ?>
                                                <option value="<?= $paroquia->idparoquia ?>"><?= $paroquia->paroquia ?></option>            
                                                <?php
                                            }
                                            ?>                                            
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>M&ecirc;s De Ades&atilde;o: </td><td>
                                        <input type="date" id="adesao"> 
                                    </td> 
                                </tr> 
                                <!--<tr>
                                    <td>
                                        Agrupar por par&oacute;quia
                                    </td>
                                    <td>
                                        <select id="agruparParoquia">
                                            <option value="0">N&atilde;o</option>
                                            <option value="1">Sim</option> 
                                        </select>
                                    </td> 
                                </tr>-->
                        <!--<tr>
                            <td>Anivers&aacute;rio: </td><td>
                                <input type="date" id="aniversario">
                            </td>
                        </tr>-->
                                <tr><td colspan="2" align="center">
                                        <input type="button" value="Enviar" onClick="relatorioDoadores();">
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