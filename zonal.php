<?php
error_reporting(E_ERROR);
require_once 'verificaSessao.php';

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
                    <!--<div id="respostaCliente" onload="document.getElementById('padraoCliente').focus();" >-->
                    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                        <tbody>
                            <tr><th colspan="11" align="center">Lista de Zonais <a href="novaParoquia.php">Cadastrar</a></th></tr>
                            <tr>
                                <td>Zonal </td>                                                            
                                <td>&nbsp; </td>                                
                            </tr>                                

                            <?php
                            ini_set("display_errors", 1); 
                            error_reporting(E_ERROR);                                           
                            $arrayZonal = DAOFactory::getZonalDAO()->queryAll();                           
                            foreach ($arrayZonal as $zonal) {                                                                                                
                                ?>
                                <tr>
                                    <td><?= $zonal->zonal ?> </td>                                                                
                                    <td><a href="editarZonal.php?id=<?= $zonal->id ?>">Editar</a> </td> 
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <!--</div>-->
                    <div ></div>                 
                </div>
            </div>
        </div>
    </body>
</html>