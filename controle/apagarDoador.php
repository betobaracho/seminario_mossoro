<?php
include '../verificaSessao.php';
try{    
    $r = DAOFactory::getDoadorDAO()->delete($_GET["id"]);
    echo $r;
}  catch (Exception $e){
    echo $e->getMessage();
}