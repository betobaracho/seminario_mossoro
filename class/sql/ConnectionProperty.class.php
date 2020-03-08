<?php
/**
 * Connection properties
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class ConnectionProperty{
	/*private static $host = 'localhost';
	private static $user = 'root';
	private static $password = '102030';
	private static $database = 'seminario_mossoro';
*/
    
       // $conn = mysql_connect("mysql.seminariosaopedro.org.br", "seminariosaope", "Asspedro19");
	//	mysql_select_db("seminariosaope");
        private static $host = 'localhost';
	private static $user = 'perso797_seminar';//'personal_mossoro';
	private static $password = 's0GYY4Qo';//'saca-lo@cerbero';
	private static $database = 'perso797_seminariost';//'personal_seminariomossoro';
        
	public static function getHost(){
		return ConnectionProperty::$host;
	}

	public static function getUser(){
		return ConnectionProperty::$user;
	}

	public static function getPassword(){
		return ConnectionProperty::$password;
	}

	public static function getDatabase(){
		return ConnectionProperty::$database;
	}
}
?>