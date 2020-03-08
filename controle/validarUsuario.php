<?php

session_start();
//ini_set("display_errors", "On");
//error_reporting(E_ALL);

header( 'Content-Type: text/html; charset=iso-8859-1' );
require_once '../include_dao.php';

$paroquia = DAOFactory::getUsuarioDAO()->validarUsuario($_REQUEST["login"], $_REQUEST["password"]);

if($paroquia!=null){
    $_SESSION["usuario"] = $paroquia->idusuario;
    Utils::redirect("../home.php");
}else{
    Utils::alert("Não foi possível realizar sua autenticação! Verifique seu login e senha");
    Utils::redirect("../login.php");
}
die("Sessão encerrada");
?>
