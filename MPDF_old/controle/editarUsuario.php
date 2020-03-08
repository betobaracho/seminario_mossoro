<?php
include '../verificaSessao.php';
$paroquia = DAOFactory::getUsuarioDAO()->load($_GET["id"]);
$paroquia->nome = $_GET["nome"];
$paroquia->email = $_GET["email"];
$paroquia->login = $_GET["login"];
$paroquia->senha = $_GET["senha"];
$paroquia->ativo = $_GET["status"];
try{
    echo DAOFactory::getUsuarioDAO()->update($paroquia);    
}  catch (Exception $e){
    echo $e->getMessage();
}
?>
