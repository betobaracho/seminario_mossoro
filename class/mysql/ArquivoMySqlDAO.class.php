<?php
/**
 * Class that operate on table 'arquivo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-04-07 12:18
 */
class ArquivoMySqlDAO implements ArquivoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ArquivoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM arquivo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM arquivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM arquivo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param arquivo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM arquivo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ArquivoMySql arquivo
 	 */
	public function insert($arquivo){
		$sql = 'INSERT INTO arquivo (nome, data, valor_total, conferencia_valor, data_processamento, numero_doacoes, conf_doacoes) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($arquivo->nome);
		$sqlQuery->setNumber($arquivo->data);
		$sqlQuery->set($arquivo->valorTotal);
		$sqlQuery->set($arquivo->conferenciaValor);
		$sqlQuery->set($arquivo->dataProcessamento);
		$sqlQuery->setNumber($arquivo->numeroDoacoes);
		$sqlQuery->setNumber($arquivo->confDoacoes);

		$id = $this->executeInsert($sqlQuery);	
		$arquivo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ArquivoMySql arquivo
 	 */
	public function update($arquivo){
		$sql = 'UPDATE arquivo SET nome = ?, data = ?, valor_total = ?, conferencia_valor = ?, data_processamento = ?, numero_doacoes = ?, conf_doacoes = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($arquivo->nome);
		$sqlQuery->setNumber($arquivo->data);
		$sqlQuery->set($arquivo->valorTotal);
		$sqlQuery->set($arquivo->conferenciaValor);
		$sqlQuery->set($arquivo->dataProcessamento);
		$sqlQuery->setNumber($arquivo->numeroDoacoes);
		$sqlQuery->setNumber($arquivo->confDoacoes);

		$sqlQuery->setNumber($arquivo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM arquivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM arquivo WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM arquivo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorTotal($value){
		$sql = 'SELECT * FROM arquivo WHERE valor_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConferenciaValor($value){
		$sql = 'SELECT * FROM arquivo WHERE conferencia_valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataProcessamento($value){
		$sql = 'SELECT * FROM arquivo WHERE data_processamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumeroDoacoes($value){
		$sql = 'SELECT * FROM arquivo WHERE numero_doacoes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConfDoacoes($value){
		$sql = 'SELECT * FROM arquivo WHERE conf_doacoes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM arquivo WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM arquivo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorTotal($value){
		$sql = 'DELETE FROM arquivo WHERE valor_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConferenciaValor($value){
		$sql = 'DELETE FROM arquivo WHERE conferencia_valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataProcessamento($value){
		$sql = 'DELETE FROM arquivo WHERE data_processamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumeroDoacoes($value){
		$sql = 'DELETE FROM arquivo WHERE numero_doacoes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConfDoacoes($value){
		$sql = 'DELETE FROM arquivo WHERE conf_doacoes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ArquivoMySql 
	 */
	protected function readRow($row){
		$arquivo = new Arquivo();
		
		$arquivo->id = $row['id'];
		$arquivo->nome = $row['nome'];
		$arquivo->data = $row['data'];
		$arquivo->valorTotal = $row['valor_total'];
		$arquivo->conferenciaValor = $row['conferencia_valor'];
		$arquivo->dataProcessamento = $row['data_processamento'];
		$arquivo->numeroDoacoes = $row['numero_doacoes'];
		$arquivo->confDoacoes = $row['conf_doacoes'];

		return $arquivo;
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
	 * @return ArquivoMySql 
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