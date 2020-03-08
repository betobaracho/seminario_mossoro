<?php
include '../verificaSessao.php';
$paroquia = new Paroquia();
$paroquia->paroquia = $_GET["paroquia"];
$paroquia->cidade = $_GET["cidade"];
$paroquia->telefone = $_GET["telefone"];
$paroquia->responsavel = $_GET["responsavel"];
try{
    echo DAOFactory::getParoquiaDAO()->insert($paroquia);    
}  catch (Exception $e){
    echo $e->getMessage();
}
?>
