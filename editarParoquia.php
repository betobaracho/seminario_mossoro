<?php
include './verificaSessao.php';
$usuario = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"]);
$paroquia = DAOFactory::getParoquiaDAO()->load($_GET["id"]);

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
                    <form name="formParoquia">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Editar Par&oacute;quia <?= $paroquia->paroquia ?><a href="listarParoquia.php">Listar</a></th></tr>
                                <tr>
                                    <td>Par&oacute;quia: </td><td>
                                        <input type="text" id="paroquia" size="80" value="<?= $paroquia->paroquia ?>" onKeyUp ="maiuscula(this);">
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
                                            <option value="<?= $paroquia->cidade ?>"><?= DAOFactory::getCidadeDAO()->load($paroquia->cidade)->cidade ?></option>
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
                                        <input id="telefone" type="text" value="<?= $paroquia->telefone ?>" onKeyUp="this.value = mascara_telefone(this.value);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Respons&aacute;vel: </td><td>
                                        <input id="responsavel" type="text" size="50" value="<?= $paroquia->responsavel ?>">
                                    </td>
                                </tr>
                                <tr><td colspan="2" align="center"><input type="button" onClick="editarParoquia(<?= $paroquia->idparoquia ?>);"  value="Editar"></td></tr>
                                <tr class="rodape_form">
                                    <td colspan="15" id="respostaParoquia"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <div ></div>     
                    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">
                        <tbody>
                            <tr><th align="center">&nbsp;</th><th align="center">Doador</th><th align="center">Situa&ccedil;&atilde;o</th><th>&nbsp;</th></tr>
                            <?php
                            $arrayDoadores = DAOFactory::getDoadorDAO()->queryByParoquia($paroquia->idparoquia);
                            $i = 1;
                            foreach ($arrayDoadores as $doador) {
                                $status = $doador->status == "0" ? "Ativo" : "Inativo";
                                $ficha = $doador->status == "1" ? "<a href='verFichaCancelamento.php?ficha=" . $doador->iddoador . "'>Ficha Cancelamento</a>" : "";
                                ?>
                                <tr><td><?= $i++ ?></td><td><?= $doador->nome ?></td><td><?php echo $status; ?></td><td><?php echo $ficha; ?></td></tr>
                                <?php
                            }
                            ?>
                            <tr class="rodape_form">

                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </body>
</html>