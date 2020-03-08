<?php
//include_once './verificaSessao.php';
require_once 'include_dao.php';

/*if($_SESSION["usuario"]!="")
{
    Utils::redirect("home.php");
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="shortcut icon" href="img/icone.ico"/>
        <title>Cinte Design Cadastro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link type="text/css" rel="stylesheet" href="css/login.css" /> 
        <script src="js/AC_RunActiveContent.js" type="text/javascript"></script>
    </head>
    <body>
        <!--bg-->
        <div id="bg">
            <!--estrutura-->
            <div id="estrutura">   
                <!--link da cinte design-->
                <div id="link_cintedesign">
                    <a href="http://www.cintedesign.com.br" target="_blank"></a>
                </div>        
                <!--link do cliente-->
                <div id="link_cliente">
                    <a href="#" target="_blank"></a>
                </div>        
                <ul id="form_login">
                    <form method="post" action="controle/validarUsuario.php">
                        <li><input type="text" class="lac" name="login" value="" size="25" maxlength="14"/></li>
                        <li style="margin-top: 39px;"><input type="password" class="lac" value="" name="password" size="25"  /></li>
                        <li style="background: none; margin-top: 10px;">
                            <input type="submit" class="bt" value="" /></li>
                    </form>
                </ul>        
            </div>     
        </div>    
    </body>
</html>