<?php
include './verificaSessao.php';
$usuario = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"]);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <? require_once './header.php'; ?>
    <body>
        <div id="bg">
            <!--estrutura-->
            <div id="estrutura">
                <!--menu-->
                <? require_once './menu_topo.php'; ?>
                <div id="conteudo">
                    <h3>Seja bem vindo(a) <? echo $usuario->nome; ?> ao sistema administrativo!</h3><br/>
                    <?php
                    require_once 'menu.php';
                    ?> 
                    <form name="formTarefa">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Cadastro de Par&oacute;quia <a href="listarParoquia.php">Listar</a></th></tr>
                                <tr>
                                    <td>Par&oacute;quia: </td><td>
                                        <input type="text" id="paroquia" onKeyUp ="maiuscula(this);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Zonal: </td><td>
                                        <select id="zonal">
                                            <option value="<?= $paroquia->zonal ?>"><?= DAOFactory::getZonalDAO()->load($paroquia->zonal)->zonal ?></option>
                                            <?php
                                            $arrayZonal = DAOFactory::getZonalDAO()->queryAll();
                                            foreach ($arrayZonal as $zonal) {
                                                ?>
                                                <option value="<?= $zonal->id ?>"><?= $zonal->zonal ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
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
                                </tr>                                  
                                <tr>
                                    <td>Telefone: </td><td>
                                        <input id="telefone" type="text" onKeyUp="this.value=mascara_telefone(this.value);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Respons&oacute;vel: </td><td>
                                        <input id="responsavel" type="text">
                                    </td>
                                </tr>
                                <tr><td colspan="2" align="center"><input type="button" onClick="cadastrarParoquia();"  value="Cadastrar"></td></tr>
                                <tr class="rodape_form">
                                    <td colspan="15" id="respostaParoquia"></td>
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