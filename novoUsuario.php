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
                    <form name="formUsuario">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Cadastro de usu&aacute;rio <a href="usuarios.php">Listar</a></th></tr>
                                <tr>
                                    <td>Nome: </td><td>
                                        <input type="text" id="nome" onKeyUp ="maiuscula(this);">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email: </td><td>
                                        <input type="text" id="email" onKeyUp ="maiuscula(this);">
                                    </td>
                                </tr>                                  
                                <tr>
                                    <td>Login: </td><td>
                                        <input id="login" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Senha: </td><td>
                                        <input id="senha" type="password">
                                    </td>
                                </tr>
                                <tr><td colspan="2" align="center"><input type="button" onClick="cadastrarUsuario();"  value="Cadastrar"></td></tr>
                                <tr class="rodape_form">
                                    <td colspan="15" id="respostaUsuario"></td>
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