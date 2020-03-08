<?php
include 'verificaSessao.php';
require_once 'header.php';
$conexao = new Connection();
$sql = "select iddoacao,data_arquivo from doacao where data_arquivo <> ''";
echo $sql;
$result = $conexao->executeQuery($sql);

while($row = mysql_fetch_assoc($result)){
    echo $row["iddoacao"] . " ".$row["data_arquivo"]."<br>";
}