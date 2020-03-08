<?php
session_start();
require_once '../include_dao.php';
$id = $_SESSION["usuario"];

$paroquia = DAOFactory::getUsuarioDAO()->load($id);
$paroquia->senha = $_GET["senha"];
$paroquia->email = $_GET["email"];
try{
    echo DAOFactory::getUsuarioDAO()->update($paroquia);    
}  catch (Exception $e){
    echo $e->getMessage();
}
?>
