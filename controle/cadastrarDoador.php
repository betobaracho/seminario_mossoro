<?php

include '../verificaSessao.php';
ini_set("display_error", "on");
error_reporting(E_ALL);
$doador = new Doador();
$doador->bairro = $_GET["bairro"];
$doador->cep = $_GET["cep"];
$cidadePost = $_GET["cidade"];

$arrayCidades = DAOFactory::getCidadeDAO()->queryByCidade($cidadePost);

$cidadeBanco = $arrayCidades[0];


if ($cidadeBanco == null) {
    $cidade = new Cidade();
    $cidade->cidade = $cidadePost;
    $cidade->estado = $_GET["estado"];
    try {
        $cidade->idcidade = DAOFactory::getCidadeDAO()->insert($cidade);
        $doador->cidade = $cidade->idcidade;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    $doador->cidade = $cidadeBanco->idcidade;
}

$doador->contrato = $_GET["contrato"];
$doador->cpf = $_GET["cpf"];
$doador->nome = $_GET["nome"];
$doador->rg = $_GET["rg"];
$doador->rua = $_GET["rua"];
$doador->telefone = $_GET["telefone"];
$doador->nascimento = $_GET["nascimento"] != "" ? Utils::converteDataBrasilAmerica($_GET["nascimento"]) : "";
$doador->valorDoacao = Utils::formatarValorBanco($_GET["valor"]);
$doador->email = $_GET["email"];
$doador->paroquia = $_GET["paroquia"];
$doador->dataAdesao = Utils::converteDataBrasilAmerica($_GET["dataAdesao"]);
$doador->obs = $_GET["obs"];

try {    
    echo DAOFactory::getDoadorDAO()->insert($doador);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
