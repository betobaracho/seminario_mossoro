<?php

ini_set("display_error", "On");
error_reporting(E_ALL);

require_once '../include_dao.php';
header('Content-Type: text/plain; charset=ansi');
$status = $_GET["status"];
$cidade = $_GET["cidade"];
$paroquia = $_GET["paroquia"];
$conexao = new Connection();

$sql = "select sum(sequencial+1) as seq from numero_arquivo";
$res = $conexao->executeQuery($sql);
$row = mysqli_fetch_assoc($res);
$numero = preencherComZeros($row["seq"], 6);
if (!($numero > 0)) {
    die("Arquivo não gerado: ");
}

$sql = "update numero_arquivo set sequencial='" . $row["seq"] . "'";
$conexao->executeQuery($sql);
 
try {

    $sql = "select * from doador where 1=1";
    $sql .= $status != "" ? " and status='$status' " : "";
    $sql .= $cidade != "" ? " and cidade='$cidade' " : "";
    $sql .= $paroquia != "" ? " and paroquia='$paroquia' " : "";
    $data = str_replace("-", "", Utils::getDataAtual());

    $result = $conexao->executeQuery($sql);
    $arquivo = "../arquivos/DIO_COB_" . $data . ".TER";
    $fp = fopen($arquivo, "w+");
    if ($fp == null) {
        die("Não consigo escrever no arquivo");
    }
//echo "dddd"; 
    $filler1 = preencherComBrancos(" ", 52);
    $filer2 = preencherComBrancos(" ", 1);
    $filer3 = preencherComBrancos(" ", 15);
    $identificacao = "MENSALIDADE      ";
    //$linha1 = "A108262016000184DM02  SEMINARIO S PEDRO      COSERN              " . $data . $numero . "05" .$identificacao. $filler1 . $filer2 . $filer3;
    $linha1 = "A108262016000184DM01  DIOCESE DE MOSSORO     COSERN              " . $data . $numero . "05" .$identificacao. $filler1 . $filer2 . $filer3;
    $linha1.="\n";
    fwrite($fp, $linha1);
    $valorTotal = 0;
    $qtde = 1;
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        
        $valorTotal += $row["valor_doacao"];

        $documento = trim($row["cpf"]);
        //echo "|".$documento."|";echo "\n";
        $documento = str_replace(".", "", $documento);
        $documento = str_replace("-", "", $documento);
        $documento = str_replace("/", "", $documento);
        //$documento = trim($documento);
        //echo "|".$documento."|";echo "<br><br>";
        $documento = preencherComZeros($documento, 15);
        //echo "|".$documento."|";
        //die();

        $contrato = preencherComZeros($row["contrato"], 12);
        $doacao = preencherComZeros($row["valor_doacao"] . "00", 15);
        $inicio = preencherComZeros(++$i, 25);
      //  if ($row["cpf"] != "") {
            $tipoDocumento = strlen($row["cpf"]) == 14 ? "2" : "1";
            $qtde++;
            $linha = "E" . $inicio . "    " . $contrato . "          " . $doacao . "                                                                                  0" . $tipoDocumento . $documento;
            $linha .="\n";
            fwrite($fp, $linha);
        //}
        // $linha .= "F0000000000000000000003033    000359685017  20140926000000000000100                                                                    201409192014095";
        // $linha .="\n";
        //echo $linha;
    }
    //          Z01583600000000004123275
    $valorTotal*=100;
    $filer1 = preencherComBrancos(" ", 126);
    $filer2 = preencherComBrancos(" ", 1);
    $filer3 = preencherComBrancos(" ", 15);
    $trailer = "Z" . preencherComZeros(++$qtde, 6) . preencherComZeros($valorTotal, 17) . $filer1 . $filer2 . $filer3;
    fwrite($fp, $trailer);
    fclose($fp);
    header("Content-Type: txt"); // informa o tipo do arquivo ao navegador
    header("Content-Length: " . filesize($arquivo)); // informa o tamanho do arquivo ao navegador
    header("Content-Disposition: attachment; filename=" . basename($arquivo)); // informa ao navegador que � tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
    readfile($arquivo); // l� o arquivo
    exit;
} catch (Exception $e) {
    echo $e->getMessage();
}

function preencherComZeros($valor, $tamanho) {
    $novoValor = $valor;
    for ($i = 0; $i < ($tamanho - strlen($valor)); $i++) {
        $novoValor = "0" . $novoValor;
    }
    return $novoValor;
}

function preencherComBrancos($valor, $tamanho) {
    $novoValor = $valor;
    for ($i = 0; $i < ($tamanho - strlen($valor)); $i++) {
        $novoValor = " " . $novoValor;
    }
    return $novoValor;
}

?>
