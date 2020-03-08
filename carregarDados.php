<?php


error_reporting(1);
function carregarCidade() {
    $arquivo = fopen('doadores.csv', 'r');
$conexao = mysql_connect("localhost", "root", "102030");
mysql_select_db("seminario_mossoro");
$i=0;
    while (!feof($arquivo)) {
//if($i++==1) continue;
        $linha = fgets($arquivo, 1024);
        $dados = explode(';', $linha);
        $nome = $dados[0];
        $tipoEndereco = $dados[1];
        $rua = $dados[2];
        $numero = $dados[3];
        $complemento = $dados[4];
        $referencia = $dados[5];
        $cidade = mysql_real_escape_string($dados[6]);
        $estado = $dados[7];
        $cep = $dados[8];
        $ddd = $dados[9];
        $telefone = $dados[10];
        $sql_ = "select count(*) as n from cidade where cidade='$cidade' and estado='$estado'";
        
        $r_select = mysql_query($sql_, $conexao);
        $row = mysql_fetch_assoc($r_select);
        if ($row["n"] == 0) {
            $sql = "insert into cidade (cidade,estado) values ('$cidade','$estado')";
            $r = mysql_query($sql, $conexao);
            if(!$r){
                echo $sql . "<br>";
                echo "Não migrou: ".$nome." ".$cpf."<br>";
                var_dump(mysql_error());
            }else {$i++;}
        }

        /* 

          $r = mysql_query($sql, $conexao);
          //var_dump(mysql_error());
         */
        //echo $dados[0] . " | " . $dados[1] . " | " . $dados[2] . " | " . $dados[3] . " | " . $dados[4] .
        //" | " . $dados[5] . " | " . $dados[6] . " | " . $dados[7] . " | " . $dados[8] . " | " .
        //$dados[9] . " | " . $dados[10] . " | ";
       // echo '<br />';
    }
    echo $i ." registros migrados";
}

function carregarParoquia() {
    $arquivo = fopen('doadores.csv', 'r');
    $i = 0;
    $conexao = mysql_connect("localhost", "root", "102030");
    mysql_select_db("seminario_mossoro");
    while (!feof($arquivo)) {
        //if(($i++)==10) break;
        $linha = fgets($arquivo, 1024);
        $dados = explode(';', $linha);
        /*$nome = $dados[0];
        $tipoEndereco = $dados[1];
        $rua = $dados[2];
        $numero = $dados[3];
        $complemento = $dados[4];
        $referencia = $dados[5];
        $cidade = $dados[6];
        $estado = $dados[7];
        $cep = $dados[8];
        $ddd = $dados[9];
        $telefone = $dados[10];*/
        $paroquia = $dados[11];
        //$paroquia = $dados[12];
        //echo $paroquia."<br>";
        $sql_ = "select count(*) as n from paroquia where paroquia='$paroquia'";
        echo $sql_." <br>";
        $r_select = mysql_query($sql_, $conexao);
        $row = mysql_fetch_assoc($r_select);
        if ($row["n"] == 0) {
            $sql = "insert into paroquia (paroquia) values ('$paroquia')";
            $r = mysql_query($sql, $conexao);
        }

        /* echo $sql . "<br>";

          $r = mysql_query($sql, $conexao);
          //var_dump(mysql_error());
         */
      /*  echo $dados[0] . " | " . $dados[1] . " | " . $dados[2] . " | " . $dados[3] . " | " . $dados[4] .
        " | " . $dados[5] . " | " . $dados[6] . " | " . $dados[7] . " | " . $dados[8] . " | " .
        $dados[9] . " | " . $dados[10] . " | ";*/
        echo '<br />';
    }
}

function carregarDoador() {
    $arquivo = fopen('doadores.csv', 'r');
    $i = 0;
    $conexao = mysql_connect("localhost", "root", "102030");
    mysql_select_db("seminario_mossoro");
    while (!feof($arquivo)) {
        //if(($i++)==10) break;
        $linha = fgets($arquivo, 1024);
        $dados = explode(';', $linha);
        $nome = mysql_real_escape_string($dados[0]);
        $tipoEndereco = $dados[1];
        $rua = mysql_real_escape_string($dados[2]);
        $numero = $dados[3];
        $complemento = $dados[4];
        $bairro = $dados[5];
        $cidade = getCidade($dados[6]);
        $estado = $dados[7];
        $cep = $dados[8];
        $ddd = $dados[9];
        $telefone = $dados[10];
        $paroquia = getParoquia($dados[11]);
        $contrato = $dados[12];
        $valor_doacao = $dados[14];
        
        $cpf = $dados[16];
        $data_cancelamento = $dados[15];
        if($data_cancelamento!=""){
        $sqlDoador = "insert into doador(nome,cpf,contrato,rua,bairro,cep,cidade,valor_doacao,paroquia,telefone,data_cancelamento)
         values('$nome','$cpf','$contrato','$rua','$bairro','$cep','$cidade','$valor_doacao','$paroquia','$ddd-$telefone',
         '$data_cancelamento')";
         $i++;
        }else{
            $sqlDoador = "insert into doador(nome,cpf,contrato,rua,bairro,cep,cidade,valor_doacao,paroquia,telefone)
         values('$nome','$cpf','$contrato','$rua','$bairro','$cep','$cidade','$valor_doacao','$paroquia','$ddd-$telefone')";
        }
//        echo $sqlDoador."<br>";
        $r = mysql_query($sqlDoador, $conexao);
        if(!$r){
            echo "Não migrou: ".$nome." ".$cpf."<br>";
            var_dump(mysql_error());
        }
    }
    echo $i ." registros migrados";
}
function getParoquia($paroquia){
    $conexao = mysql_connect("localhost", "root", "102030");
    mysql_select_db("seminario_mossoro");
    $sql_ = "select idparoquia from paroquia where paroquia='$paroquia'";
    //echo $sql_." <br>";
    $r_select = mysql_query($sql_, $conexao);
    $row = mysql_fetch_assoc($r_select);
    return $row["idparoquia"];
}

function getCidade($cidade){
    $conexao = mysql_connect("localhost", "root", "102030");
    mysql_select_db("seminario_mossoro");
    $sql_ = "select idcidade from cidade where cidade='$cidade'";
    //echo $sql_." <br>";
    $r_select = mysql_query($sql_, $conexao);
    $row = mysql_fetch_assoc($r_select);
    if($row["idcidade"]>0){
       // echo "encontrou a cidade: ".$cidade."<br><br>";
        return $row["idcidade"];
    }
    else{
        echo "NÃO encontrou a cidade: ".$cidade."<br><br>";
        return 1;
    }
    
}

function getDoador($doador,$conexao){
    //$conexao = mysql_connect("localhost", "root", "102030");
    //mysql_select_db("seminario_mossoro");
    $sql_ = "select contrato from doador where nome='$doador'";

    $r_select = mysql_query($sql_, $conexao);
    $row = mysql_fetch_assoc($r_select);
    if($row["contrato"]>0){
       // echo "encontrou a cidade: ".$cidade."<br><br>";
        return $row["contrato"];
    }
    else{
        echo "NÃO encontrou o doador: ".$doador."<br><br>";
        return 1;
    }
}
function carregarDoacoes(){
    $arquivo = fopen('doacoes.csv', 'r');
    $conexao = mysql_connect("localhost", "root", "102030");
    mysql_select_db("seminario_mossoro");
    $i = 0;
    while (!feof($arquivo)) {
       // if($i==10) break;
        $linha = fgets($arquivo, 1024);
        
        $dados = explode(';', $linha);
        $nome = mysql_real_escape_string($dados[0]);
        $doador = getDoador($nome,$conexao);
        $valor = $dados[1];
        $data = $dados[2];
        
        $sql = "insert into doacao (valor,data,doador) value('$valor','$data','$doador')"  ;  
   
        $r = mysql_query($sql, $conexao);
        if(!$r){
            echo "Não migrou: ".$nome." ".$data."<br>";
            var_dump(mysql_error());
        }    
        $i++;
    }   
    echo $i ." registros migrados";
}
//carregarCidade();
//carregarParoquia();
//carregarDoador();   
carregarDoacoes(); 
fclose($arquivo);
?>

