<?php
/**
 * Class that operate on table 'numero_arquivo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-04-07 12:18
 */
class NumeroArquivoMySqlDAO implements NumeroArquivoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return NumeroArquivoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM numero_arquivo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM numero_arquivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM numero_arquivo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param numeroArquivo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM numero_arquivo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NumeroArquivoMySql numeroArquivo
 	 */
	public function insert($numeroArquivo){
		$sql = 'INSERT INTO numero_arquivo (data, sequencial) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($numeroArquivo->data);
		$sqlQuery->setNumber($numeroArquivo->sequencial);

		$id = $this->executeInsert($sqlQuery);	
		$numeroArquivo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param NumeroArquivoMySql numeroArquivo
 	 */
	public function update($numeroArquivo){
		$sql = 'UPDATE numero_arquivo SET data = ?, sequencial = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($numeroArquivo->data);
		$sqlQuery->setNumber($numeroArquivo->sequencial);

		$sqlQuery->setNumber($numeroArquivo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM numero_arquivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM numero_arquivo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySequencial($value){
		$sql = 'SELECT * FROM numero_arquivo WHERE sequencial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByData($value){
		$sql = 'DELETE FROM numero_arquivo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySequencial($value){
		$sql = 'DELETE FROM numero_arquivo WHERE sequencial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return NumeroArquivoMySql 
	 */
	protected function readRow($row){
		$numeroArquivo = new NumeroArquivo();
		
		$numeroArquivo->id = $row['id'];
		$numeroArquivo->data = $row['data'];
		$numeroArquivo->sequencial = $row['sequencial'];

		return $numeroArquivo;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return NumeroArquivoMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>