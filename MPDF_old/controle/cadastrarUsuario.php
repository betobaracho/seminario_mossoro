<?php
include '../verificaSessao.php';
$paroquia = new Usuario();
$paroquia->nome = $_GET["nome"];
$paroquia->email = $_GET["email"];
$paroquia->login = $_GET["login"];
$paroquia->senha = $_GET["senha"];
try{
    echo DAOFactory::getUsuarioDAO()->insert($paroquia);    
}  catch (Exception $e){
    echo $e->getMessage();
}
?>
