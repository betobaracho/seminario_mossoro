<?php
include './verificaSessao.php';
$paroquia = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"]);
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
                    <h3>Seja bem vindo(a) <?php echo $paroquia->nome; ?> ao sistema administrativo!</h3><br/>
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
                                            <option selected  value="0">Ativo</option>
                                            <option value="1">Inativo</option>
                                        </select>
                                    </td>
                                </tr>                                                                   
                                <tr>
                                    <td>M&ecirc;s De Ades&atilde;o: </td><td>
                                        <input type="date" id="adesao"> 
                                    </td> 
                                </tr> 
                                <tr>
                                    <td>
                                        Agrupar por par&oacute;quia
                                    </td>
                                    <td>
                                        <select id="agruparParoquia">
                                            <option value="0">N&atilde;o</option>
                                            <option selected value="1">Sim</option> 
                                        </select>
                                    </td> 
                                </tr>                        
                                <tr><td colspan="2" align="center">
                                        <input type="button" value="Enviar" onClick="relatorioDoadoresParoquia();">
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