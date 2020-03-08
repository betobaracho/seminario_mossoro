<?php
include '../verificaSessao.php';
$paroquia = DAOFactory::getParoquiaDAO()->load($_GET["id"]);
$paroquia->paroquia = $_GET["paroquia"];
$paroquia->cidade = $_GET["cidade"];
$paroquia->telefone = $_GET["telefone"];
$paroquia->responsavel = $_GET["responsavel"];

try{
    echo DAOFactory::getParoquiaDAO()->update($paroquia);    
}  catch (Exception $e){
    echo $e->getMessage();
}
?>
