<?php

include './verificaSessao.php';
error_reporting(E_ERROR);

require_once 'include_dao.php';
$relatorioTemporario = $_FILES["arquivo"]["tmp_name"];
$relatorioReal = $_FILES["arquivo"]["name"];
$r = move_uploaded_file($relatorioTemporario, "arquivos/" . $relatorioReal);

function getData($linha) {
    return substr($linha, 65, 8);
}

function armazenarDoacoes($linha, $dataArquivo, $relatorioReal) {
    $doacao = new Doacao();
    $dataVencimento = substr($linha, 44, 8);
    $dataFatura = substr($linha, 135, 8);
    $dataReferencia = substr($linha, 143, 6);
    $doacao->dataVencimento = $dataVencimento;
    $doacao->dataFatura = $dataFatura;
    $doacao->dataReferencia = $dataReferencia;
    $doacao->data = $dataArquivo;
    $tipoArquivo = substr($linha, 0, 1);
    if ($tipoArquivo == "F") {
        $contrato = substr($linha, 30, 12);
        $valor = substr($linha, 52, 15);
        $doacao->doador = $contrato; //abs($contrato);
        $doacao->valor = Utils::formatarValorBanco($valor / 100);
        $doacao->dataArquivo = $dataArquivo;
        $doacao->arquivo = $relatorioReal;
        $codigoMovimento = substr($linha, 149, 1);
        $doacao->codMovimento = $codigoMovimento;
        try {
            $r = DAOFactory::getDoacaoDAO()->insert($doacao);
            return $valor;
        } catch (Exception $e) {
            echo $e->getTraceAsString() . "<br>";
            die();
        }
    }
}

function processarArquivo03($linha, $dataArquivo, $relatorioReal) {
    $arquivo03 = new Arquivo03();
    $arquivo03->dataArquivo = $dataArquivo;
    $tipoArquivo = substr($linha, 0, 1);
    if ($tipoArquivo == "F") {
        $contrato = substr($linha, 30, 12);
        $arquivo03->cliente = $contrato;
        $arquivo03->codigo = substr($linha, 67, 2);
        $arquivo03->arquivo = $relatorioReal;
        $arquivo03->usuario = DAOFactory::getUsuarioDAO()->load($_SESSION["usuario"])->idusuario;
        try {
            DAOFactory::getArquivo03DAO()->insert($arquivo03);
            cancelarDoador($arquivo03);
            //die();
        } catch (Exception $e) {
            echo $e->getTraceAsString() . "<br>";
            die();
        }
    }
}

function cancelarDoador(Arquivo03 $arquivo03) {
    try {
        if ($arquivo03->codigo == "20") {
            $doador = DAOFactory::getDoadorDAO()->queryByContrato($arquivo03->cliente);
            $doador->status = 1;
            $doador->dataCancelamento = Utils::getDataAtual();
            //var_dump($doador);echo "<br><br>";
            
            //if ($doador->status == "0") {
                DAOFactory::getDoadorDAO()->update($doador);
                $desistencia = new Desistencia();
                $desistencia->data = $arquivo03->dataArquivo;
                $desistencia->doador = $doador->iddoador;
                $desistencia->usuario = $_SESSION["usuario"];
                $desistencia->motivo = utf8_decode("Solicatação na Cosern");
                $desistencia->arquivo = $arquivo03->arquivo;
                DAOFactory::getDesistenciaDAO()->insert($desistencia);
            //}
        }
    } catch (Exception $e) {
        echo $e->getTraceAsString() . "<br>";
        die();
    }
}

$i = 0;
$valor = 0;
$codigoRetorno = 0;
$numeroDoacoes = 0;
$dataArquivo = "";
//die();
if ($r == true) {
    $ponteiro = fopen("arquivos/" . $relatorioReal, "r");
    // $doacao = new Doacao();
    while (!feof($ponteiro)) {
        $linha = fgets($ponteiro, 4096);
        if ($i == 0) {
            $tipoArquivo = substr($linha, 0, 1);
            $dataArquivo = substr($linha, 65, 8);
            $codigoRetorno = substr($linha, 1, 1);
        }

        $tipoArquivo = substr($linha, 0, 1);
        $arquivo = new Arquivo();
        if ($tipoArquivo == "Z") {
            $qtdeRegistros = substr($linha, 1, 6);
            $valorTotalArquivo = substr($linha, 7, 23);
            $arquivo->nome = $relatorioReal;
            $arquivo->numeroDoacoes = abs($qtdeRegistros) - 2;
            $arquivo->valorTotal = Utils::formatarValorBanco($valorTotalArquivo / 100);
            $arquivo->conferenciaValor = Utils::formatarValorBanco($valor / 100);
            $arquivo->dataProcessamento = Utils::getDataHoraAtual();
            $arquivo->confDoacoes = $numeroDoacoes;
            $arquivo->data = $dataArquivo;

            try {
                DAOFactory::getArquivoDAO()->insert($arquivo);
            } catch (Exception $ex) {
                echo $ex->getMessage() . "<br>";
            }
        }

        if ($i++ == 0) {
            $data = getData($linha);
            $arrayData = DAOFactory::getDoacaoDAO()->queryByArquivo($relatorioReal);

            if (count($arrayData) > 0) {
                echo "Este arquivo: $relatorioReal já foi carregado!";
                echo "<a href='doacao.php'>Voltar</a>";
                die();
            }
        } else {
            if ($codigoRetorno == 2) {
                //die();
                $numeroDoacoes++;
                $valor += armazenarDoacoes($linha, $dataArquivo, $relatorioReal);
            } else if ($codigoRetorno == 3) {
                processarArquivo03($linha, $dataArquivo, $relatorioReal);
                //echo "Arquivo de informação! <br><br>";
                //echo "<a href='doacao.php'>Voltar</a>";
                //die();
            }
            /* try {
              if(DAOFactory::getDoacaoDAO()->insert($doacao)==1)
              echo "Arquivo carregado com sucesso";
              } catch (Exception $e) {
              echo $e->getTraceAsString() . "<br>";
              } */
        }
    }
    echo "Arquivo $relatorioReal carregado com sucesso!";
    echo "<a href='doacao.php'>Voltar</a>";
    fclose($ponteiro);
}
//echo $valor;
?>
