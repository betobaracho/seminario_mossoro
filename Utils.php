<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author beto
 */
class Utils {

    static $cadastrarUsuario = 2;
    static $listarClientes = 3;
    static $cargos = 4;
    static $tipotarefa = 5;
    static $atendimento = 6;
    static $contaFixa = 7;
    static $orcamento = 8;
    static $minhasTarefas = 9;
    static $tarefas = 10;

    public static function alert($msg) {
        echo "<script language='javascript'>alert('$msg')</script>";
    }

    public static function redirect($to) {
        echo "<script language='javascript'>location.href='$to';</script>";
    }

    public static function subtrairTimeStamp($tFinal, $tInicial) {
        return (strtotime($tFinal) - strtotime($tInicial));
    }

    public static function getMesExtenso($mes) {
        if ($mes == '1')
            return "Janeiro";
        if ($mes == '2')
            return "Fevereiro";
        if ($mes == '3')
            return "Março";
        if ($mes == '4')
            return "Abril";
        if ($mes == '5')
            return "Maio";
        if ($mes == '6')
            return "Junho";
        if ($mes == '7')
            return "Julho";
        if ($mes == '8')
            return "Agosto";
        if ($mes == '9')
            return "Setembro";
        if ($mes == '10')
            return "Outubro";
        if ($mes == '11')
            return "Novembro";
        if ($mes == '12')
            return "Dezembro";
    }

    public static function subtrairMes($data, $q) {
        $q = (-1) * $q;
        $sql = "select adddate('$data', INTERVAL $q MONTH) as novaData";
        include 'connecao.php';
        $result = mysqli_query($sql);
        while ($row = mysql_fetch_assoc($result)) {
            $novaData = $row["novaData"];
        }
        return $novaData;
    }

    public static function adicionarDia($data, $q) {
        $sql = "select adddate('$data',INTERVAL $q DAY) as novaData";
        include 'connecao.php';
        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)) {
            $novaData = $row["novaData"];
        }
        return $novaData;
    }

    public static function adicionarMes($data, $q) {
        $sql = "select adddate('$data',INTERVAL $q MONTH) as novaData";
        include 'connecao.php';
        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)) {
            $novaData = $row["novaData"];
        }
        mysql_close();
        return $novaData;
    }

    public static function adicionarAno($data, $q) {
        $sql = "select adddate('$data',INTERVAL $q YEAR) as novaData";
        include 'connecao.php';
        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)) {
            $novaData = $row["novaData"];
        }
        return $novaData;
    }

    public static function converteDataBrasilAmerica($data) {
        //echo $data;
        if ($data == "")
            return "";
        list($Data, $hora) = explode(" ", $data);
        //  echo "<br>data: ".$Data." hora ".$hora."<br><br>";
        if (strstr($Data, "/")) {//verifica se tem a barra /
            $d = explode("/", $Data); //tira a barra
            if (strlen($d[0]) == 4)
                return $data; //jah estah no formato americano
            $rstData = "$d[2]-$d[1]-$d[0]"; //separa as datas $d[2] = ano $d[1] = mes etc...
            return $rstData . " " . $hora;
        } elseif (strstr($Data, "-")) {
            $d = explode("-", $Data);
            if (strlen($d[0]) == 4) {
                return $data;
                // echo "fodeu";
            } //jah estah no formato americano

            if (strlen($d[0]) == 4)
                return $data; //jah estah no formato americano
            $rstData = "$d[2]/$d[1]/$d[0]";
            //  echo "<br>" . $d[2] . " ";
            return $rstData . " " . $hora;
        }else {
            return "";
        }
    }

    public static function converteData($data) {
        list($Data, $hora) = explode(" ", $data);
        if (strstr($Data, "/")) {//verifica se tem a barra /
            $d = explode("/", $Data); //tira a barra
            if (strlen($d[2]) < 4)
                $rstData = "$d[2]-$d[1]-$d[0]"; //separa as datas $d[2] = ano $d[1] = mes etc...
            else
                return $data;
            return $rstData . " " . $hora;
        } elseif (strstr($Data, "-")) {
            $d = explode("-", $Data);
            if (strlen($d[2]) < 4)
                $rstData = "$d[2]/$d[1]/$d[0]";
            else
                return $data;
            return $rstData . " " . $hora;
        }else {
            return "";
        }
    }

    public static function enviarEmail($destino, $assunto, $mensagem) {
        //  $headers = "MIME-Version: 1.0\r\n";        
        //$headers .= "Content-type: text/html; charset=iso8859-1\r\n";
        //echo $mensagem."<br><br>";
        return mail($destino, $assunto, $mensagem, 'From: contato@infinitaimagem.com.br');
    }

    public static function formatarValor($valor) {
        return number_format($valor, 2, ',', '.');
    }

    public static function formatarValorBanco($valor) {
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }

    public static function getDataAtual() {
        return(date("Y-m-d"));
    }

    public static function getDataHoraAtual() {
        return(date("Y-m-d H:i:s"));
    }

    public static function hoje() {
        return(date("d-m-Y"));
    }

    public static function truncar($valor) {
        $f1 = explode(".", $valor);
        $f1 = $f1[0] . "." . substr($f1[1], 0, 2);
        return $f1;
    }

    function daysBetweenSysData($para, $de) {
        return $this->daysBetweenTimestamp($this->SysDate2timestamp($para), $this->SysDate2timestamp($de));
    }

    function daysBetweenTimestamp($timeend, $timeini) {
        $secs = $timeend - $timeini;
        $nodia = 60 * 60 * 24;
        return ((int) ($secs / $nodia));
    }

    function SysDate2timestamp($data) {
        list($y, $m, $d, $h, $me, $s) = sscanf($data, '%4d-%2d-%2d %2d:%2d:%2d');
        return(mktime($h, $me, $s, $m, $d, $y));
    }

    public static function getDiaSemana($data) {
        $ano = substr("$data", 0, 4);
        $mes = substr("$data", 5, -3);
        $dia = substr("$data", 8, 9);
        return date("w", mktime(0, 0, 0, $mes, $dia, $ano));
    }

    public static function getInicioSemana($data) {
        $diaSemana = Utils::getDiaSemana($data);
        switch ($diaSemana) {
            case"0": return Utils::adicionarDia($data, -6);
                break;
            case"1": return $data;
                break;
            case"2": return Utils::adicionarDia($data, -1);
                break;
            case"3": return Utils::adicionarDia($data, -2);
                break;
            case"4": return Utils::adicionarDia($data, -3);
                break;
            case"5": return Utils::adicionarDia($data, -4);
                break;
            case"6": return Utils::adicionarDia($data, -5);
                break;
        }
    }

    public static function getStatus($status) {
        switch ($status) {
            case 4:
                return "Cancelado";
                break;
            case 3:
                return "Adiado";
                break;
            case 2:
                return "Aprovado";
                break;
            case 1:
                return "Aguardando Cliente";
                break;
            case 0:
                return "Pendente";
                break;
            default:
                break;
        }
    }

    public static function getStatusTarefa($status) {
        switch ($status) {
            case 4:
                return "Cancelado";
                break;
            case 0:
                return "Aguardando";
                break;
            case 1:
                return "Em Execucao";
                break;
            case 2:
                return "Finalizado";
                break;
            case 5:
                return "Gerente";
                break;
            default:
                break;
        }
    }

    public static function getStatusProjeto($status) {
        switch ($status) {
            case 3:
                return "Cancelado";
                break;
            case 2:
                return "Parado";
                break;
            case 1:
                return "Finalizado";
                break;
            case 0:
                return "Em Andamento";
                break;
            default:
                break;
        }
    }

    public static function verificarSessao() {
        if (empty($_SESSION["usuario"])) {
            Utils::alert("Sess�o encerrada!");
            Utils::redirect("login.php");
        }
    }

    public static function getNomeBairro($idBairro) {
        $conexao = new Connection();
        $sql = "select bairro from bairro where idbairro='$idBairro'";
        $result = $conexao->executeQuery($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            return $row["bairro"];
        }
        return "Desconhecido";
    }

}

?>
