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
                    <form name="formCarregarDoacao" action="carregarArquivo.php" method="POST" enctype="multipart/form-data">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Carregar Arquivo de Doa&ccedil;&atilde;o </th></tr>
                                <tr>
                                    <td>Arquivo: </td><td>
                                        <input type="file" name="arquivo">
                                    </td>
                                </tr>                                
                                <tr><td colspan="2" align="center">
                                        <input type="submit" value="Carregar">
                                    </td>
                                </tr>
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