<?php
include '../verificaSessao.php';

$doador = new Doador();
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
try{
    echo DAOFactory::getDoadorDAO()->insert($doador);
}  catch (Exception $e){
    echo $e->getMessage();
}
?>
