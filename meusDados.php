<?php
include './verificaSessao.php';
$id = $_SESSION["usuario"];
$paroquia = DAOFactory::getUsuarioDAO()->load($id);
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
                    <form name="formDados">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr><th colspan="2" align="center">Seus Dados de Usu&aacute;rio (Modifique sua senha)</th></tr>
                                <tr>
                                    <td>Nome: </td><td><input type='text' onKeyup='maiuscula(this);' disabled="disabled" value="<?= $paroquia->nome ?>" name='nome' id='nome' size='60'>
                                    </td>
                                </tr>                                       
                                <tr>
                                    <td>Login: </td><td><input type='text' name='login' disabled="disabled"  value="<?= $paroquia->login ?>" id='login' size='60'></td>
                                </tr>                                
                                <tr>
                                    <td>Senha: </td><td><input type='password' name='senha' id='senha' value="<?= $paroquia->senha ?>" size='60'></td>
                                </tr>                                
                                <tr>
                                    <td>E-mail: </td><td><input type='text' name='email' value="<?= $paroquia->email ?>" id='email' size='60'>
                                    </td>
                                </tr>                                                         
                                <tr><td colspan="2" align="center"> <input type="button" onClick="modificarDados(<?=$id?>);"  value="Ajustar"></td></tr>
                                <tr class="rodape_form">
                                    <td colspan="15" id="respostaSenha"></td>
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