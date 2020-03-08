<?php
require_once 'include_dao.php';
$ponteiro = fopen("bairro.TXT", "r");
$conexao = new Connection();
$i = 0;
while (!feof($ponteiro)) {
    $linha = fgets($ponteiro, 4096);
    echo $linha."<br><br>";
    if ($i++ > 0) {
        $parametros = explode(",", $linha);
        $codigoBairro = $parametros[0];
        $bairro = str_replace("\"", "", $parametros[1]);
        $sql = "insert into bairro (idbairro,bairro,cidade) values ('$codigoBairro','$bairro',1)";
        $conexao->executeQuery($sql);
        //var_dump($parametros);
        /*$doador->rua = $parametros[3];
        $doador->bairro = str_replace("\"", "", $parametros[4]);
        $doador->cidade = str_replace("\"", "", $parametros[5]);
        $doador->cep = $parametros[8];
        $doador->telefone = $parametros[9];
        $doador->valorDoacao = $parametros[11];*/
        /*try {
            DAOFactory::getDoadorDAO()->insert($doador);
        } catch (Exception $e) {
            echo $e->getTraceAsString();
            echo "<br><br>";
        }*/
    } else {        
    }
}
?>
