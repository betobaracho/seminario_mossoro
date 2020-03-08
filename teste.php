<?php

//echo "teste";
//ini_set("display_errors", "On");
//error_reporting(E_ALL);
$conn = mysqli_connect("localhost", "perso797_seminar", "s0GYY4Qo");
$db = mysqli_select_db($conn,"perso797_seminariost");
var_dump($db);
$erro = mysqli_error($conn);
//var_dump($conn);
//var_dump($erro);
/*$conn = mysql_connect("localhost", "personal_mossoro", "saca-lo@cerbero");
mysql_select_db("personal_seminariomossoro", $conn);

var_dump($conn);
echo "dddd";*/
/*private static $host = 'localhost';
private static $user = 'seminariosaope1';
private static $password = 'saca-lo@cerbero';
private static $database = 'personal_seminariomossoro';*/
