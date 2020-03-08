<?php
include './verificaSessao.php';
$usuario = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"]);
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
                    <form name="formDoador">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Ficha de Cancelamento <a href="listarCancelados.php">listar</a></th></tr>
                                <tr>
                                    <td>Conta Contrato: </td><td>
                                        <input type="text" value="" id="contrato" onkeyup="completarDoador(this.value)">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Doador: </td><td>
                                        <select id="doador">
                                            <option value="">Selecione o Doador</option>
                                            <?php
                                            ini_set("display_errors", 1); 
                                            error_reporting(E_ERROR); 
                                             $doadores = DAOFactory::getDoadorDAO()->queryByStatus(0);
                                             foreach ($doadores as $doador) {
                                              ?>
                                              <option value="<?= $doador->iddoador ?>"><?= $doador->nome ?></option>
                                              <?php
                                              } 
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Motivo: </td><td>
                                        <textArea id="motivoCancelamento" rows="10" cols="50"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data: </td><td>
                                        <input type="date" id="dataCancelamento"/> 
                                    </td>
                                </tr>
                                
                                <!---->
                                <tr><td colspan="2" align="center"><input type="button" onClick="fichaCancelamento();"  value="Cadastrar"></td></tr>
                                <tr class="rodape_form">
                                    <td colspan="15" id="respostaDoador"></td>
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