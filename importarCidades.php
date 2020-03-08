<?php

require_once 'include_dao.php';
$ponteiro = fopen("cidade.TXT", "r");
$cidade = new Cidade();
$i = 0;
while (!feof($ponteiro)) {
    $linha = fgets($ponteiro, 4096);
    echo "<br>".$linha . "<br>";
    if ($i++ > 0) {
        $parametros = explode(",", $linha);
        $codigoCidade = $parametros[0];
        $nomeCidade = str_replace("\"", "", $parametros[1]);
        $cidade->idcidade = $codigoCidade;
        $cidade->cidade = $nomeCidade;
        $cidade->estado = "RN";
        try {
            DAOFactory::getCidadeDAO()->insert($cidade);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        
    }
}
?>
