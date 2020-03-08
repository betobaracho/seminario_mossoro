<?php
include './verificaSessao.php';
$paroquia = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"]);
$doador = DAOFactory::getDoadorDAO()->load($_GET["id"]);
ini_set("display_errors", "On");
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
                    <form name="formDoador">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr>
                                    <th colspan="2" align="center">Edi&ccedil;&atilde;o de Doador 
                                        <a href="doadores.php">Listar</a> - 
                                            <?php 
                                                if($doador->status==1){
                                                    ?>
                                        <a href="fichaCancelamento.php?id=<?= $doador->iddoador ?>">Ficha de Cancelamento</a>
                                                    <?php
                                                }
                                            ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Nome: </td><td>
                                        <input type="text" id="nome" size="60" value='<?= $doador->nome ?>' onKeyUp ="maiuscula(this);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPF: </td><td>
                                        <input type="text" id="cpf" size="60" value='<?= $doador->cpf ?>' onKeyUp ="this.value = mascara_cpf(this.value);">
                                    </td>
                                </tr>                                  
                                <tr>
                                    <td>RG: </td><td>
                                        <input id="rg" type="text" size="60" value='<?= $doador->rg ?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contrato: </td><td>
                                        <input id="contrato" type="contrato" size="60" value='<?= $doador->contrato ?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rua: </td><td>
                                        <input id="rua" type="text" size="60" onKeyUp ="maiuscula(this);" value='<?= $doador->rua ?>'>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bairro: </td><td>
                                        <select id="bairro">
                                            <option value='<?= $doador->bairro ?>'><?= Utils::getNomeBairro($doador->bairro) ?></option>
                                            <?php
                                            $conexao = new Connection();
                                            $sql = "select * from bairro order by bairro";
                                            $result = $conexao->executeQuery($sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?= $row["idbairro"] ?>"><?= $row["bairro"] ?></option>
                                                <?php
                                            }
                                            ?>


                                        </select>                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cep: </td><td>
                                        <input id="cep" type="text" size="60" value='<?= $doador->cep ?>' onKeyUp="this.value = mascara_cep(this.value);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cidade: </td><td>
                                        <select id="cidade">
                                            <option value='<?= $doador->cidade ?>'><?= DAOFactory::getCidadeDAO()->load($doador->cidade)->cidade ?></option>
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
                                    <td>Valor da Doa&ccedil;&atilde;o: </td><td>
                                        <input id="valor" type="text" value='<?= Utils::formatarValor($doador->valorDoacao) ?>' size="60" onKeyUp="this.value = mascara_dinheiro(this.value);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Telefone: </td><td>
                                        <input id="telefone" value='<?= $doador->telefone ?>' type="text" size="60" onKeyUp="this.value = mascara_telefone(this.value);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nascimento: </td><td>
                                        <?= Utils::converteData($doador->nascimento) ?>
                                        <input id="nascimento" type="text" onkeypress="mascaraData( this, event )" value='<?= Utils::converteData($doador->nascimento) ?>' value='' size="60">
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-mail: </td><td>
                                        <input id="email" type="text" value='<?= $doador->email ?>' size="60">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data de Ades&atilde;o: </td><td>
                                        <?= Utils::converteData($doador->dataAdesao) ?>
                                        <input id="dataAdesao" type="text" onkeypress="mascaraData( this, event )" value='<?= Utils::converteData($doador->dataAdesao) ?>' value='' size="60">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status: </td><td>
                                        <select id="status">
                                            <option value="0" <?= $doador->status == "0" ? "Selected" : "" ?>>Ativo</option>
                                            <option value="1" <?= $doador->status == "1" ? "Selected" : "" ?>>Inativo</option>                                                                                        
                                        </select>
                                    </td>
                                </tr>
                                <tr><td colspan="2" align="center"><input type="button" onClick="editarDoador(<?= $doador->iddoador ?>);" value="Editar"></td></tr>
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