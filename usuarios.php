<?php
include './verificaSessao.php';
error_reporting(3);
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
                    <div id="respostaUsuario">
                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                            <tbody>
                                <tr>
                                    <th height="40" colspan="13" align="center">
                                        <div style="color: #000000;font-size: 12px;">Lista de Usu&aacute;rios&nbsp;<a href="novoUsuario.php">Novo</a></div>
                                    </th>
                                </tr>
                                <tr>
                                    <td><div style="color: #000000;font-size: 12px;">Nome </div></td>                                                               
                                    <td><div style="color: #000000;font-size: 12px;">Login </div></td>                                
                                    <td><div style="color: #000000;font-size: 12px;">E-mail </div></td>                                                                                                                             
                                    <td><div style="color: #000000;font-size: 12px;">Status </div></td>                                    
                                    <td><div style="color: #000000;font-size: 12px;">&nbsp; </div></td>                                    
                                </tr>                                

                                <?php
                                $arrayUsuarios = DAOFactory::getUsuarioDAO()->queryAll();
                                $paroquia = new Usuario();
                                foreach ($arrayUsuarios as $paroquia) {
                                    ?>
                                    <tr>
                                        <td><div style="color: #000000;font-size: 12px;"><?= $paroquia->nome ?> </div></td>                                        
                                        <td><div style="color: #000000;font-size: 12px;"><?= $paroquia->login ?> </div></td>                                
                                        <td><div style="color: #000000;font-size: 12px;"><?= $paroquia->email ?> </div></td>     
                                        <!--<td><div style="color: #000000;font-size: 12px;"><?= DAOFactory::getParoquiaDAO()->load($paroquia->paroquia)->paroquia ?> </div></td>-->                               
                                        <td><div style="color: #000000;font-size: 12px;"><?= $paroquia->ativo=="1"?"Ativo":"Inativo" ?> </div></td>
                                        <td><div style="color: #000000;font-size: 12px;"><a href="editarUsuario.php?id=<?= $paroquia->idusuario ?>">Editar</a> </div></td>                                        
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr class="rodape_form">
                                    <td colspan="15" id="respostaSenha"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div ></div>                 
                </div>
            </div>
        </div>
    </body>
</html>