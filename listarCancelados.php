<?php
//ini_set("display_errors","On");
error_reporting(E_ALL);
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
                    <!--<div id="respostaCliente" onload="document.getElementById('padraoCliente').focus();" >-->
                    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
                        <tbody>
                            <tr><th colspan="11" align="center">Lista de Doadores Cancelados <a href="fichaCancelamento.php">Cadastrar</a></th></tr>
                            <tr>
                                <td>Doador </td>                            
                                <td>Cidade </td>
                                <td>Par&oacute;quia </td>                                
                                <td>Arquivo</td>
                                <td>Data</td>  
                                 <td>&nbsp;</td>              
                            </tr>                                

                            <?php
                            $arrayDesistencia = DAOFactory::getDesistenciaDAO()->queryAll();
                            foreach ($arrayDesistencia as $desistencia) {
                                $doador = DAOFactory::getDoadorDAO()->load($desistencia->doador);
                               
                                ?>
                                <tr>
                                    <td><a href="editarDoador.php?id=<?=$doador->iddoador?>" ><?= $doador->nome ?></a> </td>                            
                                    <td><?= DAOFactory::getCidadeDAO()->load($doador->cidade)->cidade ?> </td>
                                    <td><?= DAOFactory::getParoquiaDAO()->load($doador->paroquia)->paroquia ?> </td>                                
                                    <td><?= $desistencia->arquivo ?> </td>   
                                    <td><?php try{
                                        Utils::converteData($desistencia->data);
                                        
                                    }
                                    catch(Exception $e){
                                        echo "sem data";
                                        
                                    } ?> </td>
                                    <td><a href="verFichaCancelamento.php?ficha=<?= $desistencia->iddesistencia ?>">Ficha</a>  </td>
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