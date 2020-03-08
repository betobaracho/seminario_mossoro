<?php
session_start();
require_once '../include_dao.php';
$bairroGet = $_REQUEST["bairro"];

$bairros = DAOFactory::getBairroDAO()->queryByBairro($bairroGet);

//$bairro = $bairros->idbairro;
var_dump($bairros);
$idBairro = $bairros->idbairro;
echo $idBairro;
die();
$contratos = DAOFactory::getDoadorDAO()->queryByContrato($idcontrato);
if(empty($contratos)){
    echo -1;
    die();
}else {
    foreach ($contratos as $contrato) {
        echo $contrato->iddoador;
        die();
    }
}
die();