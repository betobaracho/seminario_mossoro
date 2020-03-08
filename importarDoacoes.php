<?php

require_once 'include_dao.php';

$ponteiro = fopen("doacao.txt", "r");
$doacao = new Doacao();
$i = 0;
while (!feof($ponteiro)) {
    $linha = fgets($ponteiro, 4096);
    
    //1,00;"0311001019";21/8/2009 00:00:00;9/9/2009 00:00:00;10,00;"200909";"Faturado 09/09/2009";1

    $parametros = explode(";", $linha);
    //$doacao->iddoacao = abs($parametros[0]);
    $doacao->valor = Utils::formatarValorBanco($parametros[4]);
    $cont = abs(str_replace('"', "", $parametros[1]));
    $arrayDoador = DAOFactory::getDoadorDAO()->queryByContrato($cont);
    //var_dump($arrayDoador);
    $doador = $arrayDoador[0];
    //echo $cont."<br><br>";
    $doacao->doador = $doador->iddoador;
    //var_dump($parametros);
    $doacao->data = Utils::converteDataBrasilAmerica($parametros[2]);
    //var_dump($doacao);
    try {
        DAOFactory::getDoacaoDAO()->insert($doacao);
    } catch (Exception $e) {
        echo $linha . "<br><br>";
        echo $e->getMessage();
        echo "<br><br>";
        echo $e->getTraceAsString();
        
    }//die();
    $i++;
}
//}
echo "i: " . $i;
fclose($ponteiro);
?>
