<?php

error_reporting(E_ERROR);
require_once 'include_dao.php';

$ponteiro = fopen("Doadores.txt", "r");
$doador = new Doador();
$i = 0;
while (!feof($ponteiro)) {    
        if ($i > 17147)
            die();
        $linha = fgets($ponteiro, 4096);
        //echo $linha."<br><br>";
        //if ($i++ > 0) {
        $parametros = explode(";", $linha);
        //    var_dump($parametros);
        $doador->contrato = abs(trim(str_replace("\"", "", $parametros[1])));
        $doador->nome = trim(str_replace("\"", "", $parametros[2]));
        $doador->rua = trim(str_replace("\"", "", $parametros[3]));
        $doador->bairro = trim(str_replace("\"", "", $parametros[4]));
        $doador->cidade = trim(str_replace("\"", "", $parametros[5]));
        if ($doador->cidade == "")
            $doador->cidade = '112';
        $doador->cep = trim(str_replace("\"", "", $parametros[7]));
        $doador->telefone = trim(str_replace("\"", "", $parametros[8]));
        $doador->valorDoacao = Utils::formatarValorBanco(trim(str_replace("\"", "", $parametros[10])));
        $doador->status = $parametros[11];
        $doador->paroquia = $parametros[18];
        try {
            DAOFactory::getDoadorDAO()->insert($doador);
            echo $parametros[0] . "<br><br>";
            $i++;
        } catch (Exception $e) {
            echo $linha . "<br><br>";
            echo $e->getMessage() . "<br>";
            echo $e->getTraceAsString();
            echo "<br><br>";
        }
    }
echo "i: " . $i;
fclose($ponteiro);
?>
