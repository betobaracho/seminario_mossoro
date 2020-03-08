<?php
session_start();
header( 'Content-Type: text/html; charset=iso-8859-1' );
require_once '../include_dao.php';

$usuario = DAOFactory::getUsuarioDAO()->validarUsuario($_POST["usuario"], $_POST["senha"]);
if($usuario!=null){
    $_SESSION["usuario"] = $usuario->idusuario;
    Utils::redirect("../home.php");
}else{
    Utils::alert("Não foi possível realizar sua autenticação! Verifique seu login e senha");
    Utils::redirect("../login.php");
}
die("Sessão encerrada");
?>
