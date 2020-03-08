<?php
/**
 * Class that operate on table 'arquivo_03'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-06-11 21:21
 */
class Arquivo03MySqlDAO implements Arquivo03DAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return Arquivo03MySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM arquivo_03 WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM arquivo_03';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM arquivo_03 ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param arquivo03 primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM arquivo_03 WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Arquivo03MySql arquivo03
 	 */
	public function insert($arquivo03){
		$sql = 'INSERT INTO arquivo_03 (data_arquivo, cliente, codigo, arquivo, usuario) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($arquivo03->dataArquivo);
		$sqlQuery->set($arquivo03->cliente);
		$sqlQuery->set($arquivo03->codigo);
		$sqlQuery->set($arquivo03->arquivo);
		//$sqlQuery->set($arquivo03->dataProcessamento);
		$sqlQuery->setNumber($arquivo03->usuario);

		$id = $this->executeInsert($sqlQuery);	
		$arquivo03->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param Arquivo03MySql arquivo03
 	 */
	public function update($arquivo03){
		$sql = 'UPDATE arquivo_03 SET data_arquivo = ?, cliente = ?, codigo = ?, arquivo = ?, data_processamento = ?, usuario = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($arquivo03->dataArquivo);
		$sqlQuery->set($arquivo03->cliente);
		$sqlQuery->set($arquivo03->codigo);
		$sqlQuery->set($arquivo03->arquivo);
		$sqlQuery->set($arquivo03->dataProcessamento);
		$sqlQuery->setNumber($arquivo03->usuario);

		$sqlQuery->setNumber($arquivo03->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM arquivo_03';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDataArquivo($value){
		$sql = 'SELECT * FROM arquivo_03 WHERE data_arquivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCliente($value){
		$sql = 'SELECT * FROM arquivo_03 WHERE cliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM arquivo_03 WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByArquivo($value){
		$sql = 'SELECT * FROM arquivo_03 WHERE arquivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataProcessamento($value){
		$sql = 'SELECT * FROM arquivo_03 WHERE data_processamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuario($value){
		$sql = 'SELECT * FROM arquivo_03 WHERE usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDataArquivo($value){
		$sql = 'DELETE FROM arquivo_03 WHERE data_arquivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCliente($value){
		$sql = 'DELETE FROM arquivo_03 WHERE cliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM arquivo_03 WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByArquivo($value){
		$sql = 'DELETE FROM arquivo_03 WHERE arquivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataProcessamento($value){
		$sql = 'DELETE FROM arquivo_03 WHERE data_processamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuario($value){
		$sql = 'DELETE FROM arquivo_03 WHERE usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return Arquivo03MySql 
	 */
	protected function readRow($row){
		$arquivo03 = new Arquivo03();
		
		$arquivo03->id = $row['id'];
		$arquivo03->dataArquivo = $row['data_arquivo'];
		$arquivo03->cliente = $row['cliente'];
		$arquivo03->codigo = $row['codigo'];
		$arquivo03->arquivo = $row['arquivo'];
		$arquivo03->dataProcessamento = $row['data_processamento'];
		$arquivo03->usuario = $row['usuario'];

		return $arquivo03;
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
	 * @return Arquivo03MySql 
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