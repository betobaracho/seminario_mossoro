<?php
/**
 * Class that operate on table 'bairro'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-09-25 21:28
 */
class BairroMySqlDAO implements BairroDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BairroMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM bairro WHERE idbairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM bairro';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM bairro ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param bairro primary key
 	 */
	public function delete($idbairro){
		$sql = 'DELETE FROM bairro WHERE idbairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idbairro);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BairroMySql bairro
 	 */
	public function insert($bairro){
		$sql = 'INSERT INTO bairro (bairro, cidade) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bairro->bairro);
		$sqlQuery->setNumber($bairro->cidade);

		$id = $this->executeInsert($sqlQuery);	
		$bairro->idbairro = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BairroMySql bairro
 	 */
	public function update($bairro){
		$sql = 'UPDATE bairro SET bairro = ?, cidade = ? WHERE idbairro = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bairro->bairro);
		$sqlQuery->setNumber($bairro->cidade);

		$sqlQuery->setNumber($bairro->idbairro);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM bairro';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM bairro WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
                return $this->getRow($sqlQuery);
		//return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM bairro WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByBairro($value){
		$sql = 'DELETE FROM bairro WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM bairro WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BairroMySql 
	 */
	protected function readRow($row){
		$bairro = new Bairro();
		
		$bairro->idbairro = $row['idbairro'];
		$bairro->bairro = $row['bairro'];
		$bairro->cidade = $row['cidade'];

		return $bairro;
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
	 * @return BairroMySql 
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