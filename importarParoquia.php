<?php

require_once 'include_dao.php';

$ponteiro = fopen("Paroquias.txt", "r");
$paroquia = new Paroquia();
$i = 0;
while (!feof($ponteiro)) {
    $linha = fgets($ponteiro, 4096);
    echo $linha."<br><br>";
    //if ($i++ > 0) {
        $parametros = explode(";", $linha);
       // var_dump($parametros);
        $paroquia->idparoquia = $parametros[0];
        $paroquia->paroquia = $parametros[1];
        /*$doador->contrato = abs(trim(str_replace("\"", "", $parametros[1])));
        $doador->nome = trim(str_replace("\"", "", $parametros[2]));
        $doador->rua = trim(str_replace("\"", "", $parametros[3]));
        $doador->bairro = trim(str_replace("\"", "", $parametros[4]));
        $doador->cidade = trim(str_replace("\"", "", $parametros[5]));
        $doador->cep = trim(str_replace("\"", "", $parametros[7]));
        $doador->telefone = trim(str_replace("\"", "", $parametros[8]));
        $doador->valorDoacao = Utils::formatarValorBanco(trim(str_replace("\"", "", $parametros[10])));
        $doador->status = $parametros[11];      
        echo "<br><br>";*/
        try {
            DAOFactory::getParoquiaDAO()->insert($paroquia);
        } catch (Exception $e) {
            echo $e->getTraceAsString();
            echo "<br><br>";
        }   
        $i++;
    }
//}
echo "i: " . $i;
fclose($ponteiro);
?>
