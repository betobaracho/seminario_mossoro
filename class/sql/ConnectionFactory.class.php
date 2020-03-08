<?php
/*
 * Class return connection to database
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class ConnectionFactory{
	
	/**
	 * Zwrocenie polaczenia
	 *
	 * @return polaczenie
	 */
	static public function getConnection(){
		//$conn = mysql_connect("mysql.seminariosaopedro.org.br", "seminariosaope", "Asspedro19");
		//mysql_select_db("seminariosaope");
            
           // private static $host = 'localhost';
	//private static $user = 'personal_mossoro';
	//private static $password = 'saca-lo@cerbero';
	//private static $database = 'personal_seminariomossoro';
          //  private static $user = 'personalcuidad';//'personal_mossoro';
	//private static $password = 'gambit1';
                $conn =  mysqli_connect("localhost", "perso797_seminar", "s0GYY4Qo","perso797_seminariost");
		//mysqli_select_db("perso797_seminariost");
		if(!$conn){
			throw new Exception('Não conectado ao banco');
		}
		return $conn;
	}

	/**
	 * Zamkniecie polaczenia
	 *
	 * @param connection polaczenie do bazy
	 */
	static public function close($connection){
		mysqli_close($connection);
	}
}
?>
