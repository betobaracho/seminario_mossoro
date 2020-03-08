<?php
include '../verificaSessao.php';

$bairro = new bairro();
$bairro->bairro = $_GET["bairro"];
$bairro->cidade = $_GET["cidade"];
try{
    echo DAOFactory::getBairroDAO()->insert($bairro);
}  catch (Exception $e){
    echo $e->getMessage();
}
?>
