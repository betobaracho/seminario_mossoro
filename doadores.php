<?php
error_reporting(all);
require_once './verificaSessao.php';
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
                    <h3>Seja bem vindo(a) <?php echo $_SESSION['nome']; ?> ao sistema administrativo!</h3><br/>
                    <?php
                    require_once 'menu.php';
                    ?> 
                    <div id="respostaDoador"> <!--onload="document.getElementById('padraoCliente').focus();" --> 
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="12" align="center">Lista de Doadores <a href="novoDoador.php">Cadastrar</a>  &nbsp;
                                    Buscar por nome,cpf ou n&uacute;mero do contrato 
                                    <input type="text" id="padrao"> 
                                    <input type="button" onclick="buscarPorPadrao()" value="Buscar"></th></tr>
                                <tr>
                                    <td>Nome </td>                            
                                    <td>CPF </td>                                
                                    <td>RG</td>  
                                    <td>Contrato </td>                            
                                    <td>Rua </td>
                                    <td>Bairro </td>                                
                                    <td>Cep</td>
                                    <td>Cidade </td>
                                    <td>Valor </td> 
                                    <td>Situa&ccedil;&atilde;o </td> 
                                    <td>&nbsp; </td>   
                                    <td>&nbsp; </td>   
                                </tr>                                
                                <?php
                                $arrayDoadores = DAOFactory::getDoadorDAO()->queryAll();
                                foreach ($arrayDoadores as $doador) {
                                    ?>
                                    <tr>
                                        <td><?= $doador->nome ?> </td>                            
                                        <td>&nbsp;<?= $doador->cpf ?> </td>
                                        <td>&nbsp;<?= $doador->rg ?> </td>                                
                                        <td><?= $doador->contrato ?> </td>
                                        <td><?= $doador->rua ?> </td>                            
                                        <td><?= $doador->bairro //Utils::getNomeBairro($doador->bairro) ?> </td>
                                        <td><?= $doador->cep ?> </td>                                
                                        <td><?= DAOFactory::getCidadeDAO()->load($doador->cidade)->cidade ?> </td>
                                        <td><?= Utils::formatarValor($doador->valorDoacao) ?> </td>
                                         <td><?= $doador->status==0?"Ativo":"Inativo" ?> </td>
                                        <td><a href="editarDoador.php?id=<?= $doador->iddoador ?>">Editar</a> </td>
                                        <td><a style="cursor:pointer"  onclick="removerDoador(<?= $doador->iddoador ?>)">Remover</a> </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div ></div>                 
                </div>
            </div>
        </div>
    </body>
</html>