<?php
session_start();
require_once 'include_dao.php';
if($_SESSION["usuario"]==""){
    Utils::alert("Sessão expirada");
    Utils::redirect("login.php");
}
?>
