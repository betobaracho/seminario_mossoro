<?php
include '../verificaSessao.php';

$doador = DAOFactory::getDoadorDAO()->load($_GET["id"]);
$doador->bairro = $_GET["bairro"];
$doador->cep = $_GET["cep"];
$doador->cidade = $_GET["cidade"];
$doador->contrato = $_GET["contrato"];
$doador->cpf = $_GET["cpf"];
$doador->nome = $_GET["nome"];
$doador->rg = $_GET["rg"];
$doador->rua = $_GET["rua"];
$doador->telefone = $_GET["telefone"];
$doador->nascimento = $_GET["nascimento"]!=""?  Utils::converteDataBrasilAmerica($_GET["nascimento"]):"";
$doador->valorDoacao = Utils::formatarValorBanco($_GET["valor"]);
$doador->email = $_GET["email"];
$doador->status = $_GET["status"];
try{
    echo DAOFactory::getDoadorDAO()->update($doador);
}  catch (Exception $e){
    echo $e->getMessage();
}
?>
