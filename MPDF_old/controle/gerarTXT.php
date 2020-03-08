<?php

require_once '../include_dao.php';
header('Content-Type: text/plain');
$status = $_GET["status"];
$cidade = $_GET["cidade"];
$paroquia = $_GET["paroquia"];
$conexao = new Connection();
try {

    $sql = "select * from doador where 1=1";
    $sql .= $status != "" ? " and status='$status' " : "";
    $sql .= $cidade != "" ? " and cidade='$cidade' " : "";
    $sql .= $paroquia != "" ? " and paroquia='$paroquia' " : "";
    
    $result = $conexao->executeQuery($sql);
    $arquivo = "../arquivos/relatorio.txt";
    $fp = fopen($arquivo, "w+");
    $data = str_replace("-", "", Utils::getDataAtual());
    
    $linha1 = "A108262016000184DM02  SEMINARIO S PEDRO      COSERN              ".$data."00006305SEMINARIO S PEDRO                                                    ";
    $linha1.="\n";
 //   $linha1.= "A208262016000184DM02  SEMINARIO S PEDRO      COSERN              2014091900506805SEMINARIO S PEDRO                                                    |";
 //   $linha1.="\n";
    //echo $linha1;
    fwrite($fp, $linha1);

    $valorTotal = 0;
    $qtde = 0;
    $i=0;
    while ($row = mysqli_fetch_assoc($result)) {
        //E0000000000000000000000001    000311001019          000000000001000
        /*
         * A208262016000184DM02  SEMINARIO S PEDRO      COSERN              2014091900506805SEMINARIO S PEDRO                                                    
F0000000000000000000003033    000359685017  20140926000000000000100                                                                    201409192014095
F0000000000000000000016207    000713107018  20140918000000000000500                                                                    201409052014096
F0000000000000000000010304    000191207017  20140918000000000000200                                                                    201409092014096
F0000000000000000000003063    000359769016  20141001000000000000300                                                                    201409192014095
         */
        $qtde++;
        $valorTotal += $row["valor_doacao"];
        $contrato = preencherComZeros($row["contrato"], 12);
        $doacao = $data.preencherComZeros($row["valor_doacao"]."00",15);
        $inicio = preencherComZeros(++$i,25);
        //echo "|".$contrato." ".$doacao." ".$inicio."|\n\n";
        
        $linha = "F".$inicio."    ".$contrato."  ".$doacao."                                                                                  0";
        $linha .="\n";
       // $linha .= "F0000000000000000000003033    000359685017  20140926000000000000100                                                                    201409192014095";
       // $linha .="\n";
        fwrite($fp,$linha);
        //echo $linha;
    }
    fclose($fp);
    header("Content-Type: txt"); // informa o tipo do arquivo ao navegador
    header("Content-Length: " . filesize($arquivo)); // informa o tamanho do arquivo ao navegador
    header("Content-Disposition: attachment; filename=" . basename($arquivo)); // informa ao navegador que � tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
    readfile($arquivo); // l� o arquivo
    exit;    
} catch (Exception $e) {
    echo $e->getMessage();
}

function preencherComZeros($valor,$tamanho){
    $novoValor = $valor;
    for($i=0;$i<($tamanho-strlen($valor));$i++){
        $novoValor = "0".$novoValor; 
    }
    return $novoValor;
}
?>
