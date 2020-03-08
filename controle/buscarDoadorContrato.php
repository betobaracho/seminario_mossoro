<?php
session_start();
require_once '../include_dao.php';
$padraoContrato = $_REQUEST["contrato"];


try {
    $doadores = DAOFactory::getDoadorDAO()->queryByContratoLike("%" . $padraoContrato . "%");
    foreach ($doadores as $doador) {
        ?>
        <option value="<?= $doador->iddoador ?>"><?= $doador->nome ?></option>
        <?php
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

die();
