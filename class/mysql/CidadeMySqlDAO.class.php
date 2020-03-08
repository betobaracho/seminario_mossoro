<?php
/**
 * Class that operate on table 'cidade'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
class CidadeMySqlDAO implements CidadeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CidadeMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cidade WHERE idcidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cidade order by cidade';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cidade ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cidade primary key
 	 */
	public function delete($idcidade){
		$sql = 'DELETE FROM cidade WHERE idcidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idcidade);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CidadeMySql cidade
 	 */
	public function insert($cidade){
		$sql = 'INSERT INTO cidade (idcidade,cidade, estado) VALUES (?,?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
                $sqlQuery->setNumber($cidade->idcidade);
		$sqlQuery->set($cidade->cidade);
		$sqlQuery->set($cidade->estado);

		$id = $this->executeInsert($sqlQuery);	
		$cidade->idcidade = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CidadeMySql cidade
 	 */
	public function update($cidade){
		$sql = 'UPDATE cidade SET cidade = ?, estado = ? WHERE idcidade = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cidade->cidade);
		$sqlQuery->set($cidade->estado);

		$sqlQuery->setNumber($cidade->idcidade);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cidade';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM cidade WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM cidade WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCidade($value){
		$sql = 'DELETE FROM cidade WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM cidade WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CidadeMySql 
	 */
	protected function readRow($row){
		$cidade = new Cidade();
		
		$cidade->idcidade = $row['idcidade'];
		$cidade->cidade = $row['cidade'];
		$cidade->estado = $row['estado'];

		return $cidade;
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
	 * @return CidadeMySql 
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