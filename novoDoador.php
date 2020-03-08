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
                    <form name="formDoador">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Cadastro de Doador <a href="doadores.php">Listar</a></th></tr>
                                <tr>
                                    <td>Contrato: </td><td>
                                        <input id="contrato" type="contrato" size="60" onblur="checarContrato()">
                                            <spam id="alerta"></spam>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nome: </td><td>
                                        <input type="text" id="nome" size="60" onKeyUp ="maiuscula(this);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPF: </td><td>
                                        <input type="text" id="cpf" size="60" onKeyUp ="this.value = mascara_cpf(this.value);">
                                    </td>
                                </tr>                                  
                                <tr>
                                    <td>RG: </td><td>
                                        <input id="rg" type="text" size="60">
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Cep: </td><td>
                                        <!--<input id="cep" type="text" size="60" onKeyUp="this.value = mascara_cep(this.value);">-->
                                        <input id="cep" type="text" size="60" onblur="pesquisacep(this.value);" onKeyUp="this.value = mascara_cep(this.value);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rua: </td><td>
                                        <input id="rua" type="text" size="60" onKeyUp ="maiuscula(this);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bairro: </td><td>

                                        <input id="bairro" type="text" size="60" onKeyUp ="maiuscula(this);">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Cidade: </td><td>

                                        <input id="cidade" type="text" size="60" onKeyUp ="maiuscula(this);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Estado: </td><td>
                                        <input id="estado" type="text" size="60">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Valor da Doa&ccedil;&atilde;o: </td><td>
                                        <input id="valor" type="text" size="60" onKeyUp="this.value = mascara_dinheiro(this.value);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Telefone: </td><td>
                                        <input id="telefone" type="text" size="60" onKeyUp="this.value = mascara_telefone(this.value);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nascimento: </td><td>
                                        <input id="nascimento" type="text" onkeyup="Formatadata(this, event);" value='' size="60">
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-mail: </td><td>
                                        <input id="email" type="text" value='' size="60">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data Ades&atilde;o: </td><td>
                                        <input id="dataAdesao" type="text" onkeypress="mascaraData( this, event )" value='' size="60">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Par&oacute;quia: </td><td>
                                        <select id="paroquia">
                                            <option value="">-Selecione-</option>
                                            <?php
                                            $arrayParoquia = DAOFactory::getParoquiaDAO()->queryAll();
                                            foreach ($arrayParoquia as $paroquia) {
                                                ?>
                                                <option value="<?= $paroquia->idparoquia ?>"><?= $paroquia->paroquia ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>Obs:</td>

                                    <td><input id="obs" type="text" value='' size="60">
                                    </td>
                                </tr>
                                <!---->
                                <tr><td colspan="2" align="center"><input type="button" onClick="cadastrarDoador();"  value="Cadastrar"></td></tr>
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