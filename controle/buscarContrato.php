<?php
session_start();
require_once '../include_dao.php';
$idcontrato = $_REQUEST["contrato"];
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