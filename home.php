<?php
include_once 'verificaSessao.php';
error_reporting(E_ALL);
?>

<html xmlns="http://www.w3.org/1999/xhtml">

    <?php include 'header.php' ?>
    <body>
        <div id="bg">

            <!--estrutura-->
            <div id="estrutura">
                <?php include './menu_cima.php'; ?>
                <!--menu-->


                <div id="conteudo">

                    <?php  include 'menu.php';?>
                </div>
            </div>
        </div>
    </body>
</html>