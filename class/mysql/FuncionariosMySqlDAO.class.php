<?php
/**
 * Class that operate on table 'funcionarios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2019-04-07 12:18
 */
class FuncionariosMySqlDAO implements FuncionariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FuncionariosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM funcionarios WHERE Codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM funcionarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM funcionarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param funcionario primary key
 	 */
	public function delete($Codigo){
		$sql = 'DELETE FROM funcionarios WHERE Codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($Codigo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FuncionariosMySql funcionario
 	 */
	public function insert($funcionario){
		$sql = 'INSERT INTO funcionarios (Nome, CPF, RG, DTNasc, Admissao, Endereco, numero, Bairro, Cidade, CEP, Telefone, Email, EnsinoMedio, Observacoes, DataSaida, FuncaoADEOutros, TipoSanguinio, usuario, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($funcionario->nome);
		$sqlQuery->set($funcionario->cPF);
		$sqlQuery->set($funcionario->rG);
		$sqlQuery->set($funcionario->dTNasc);
		$sqlQuery->set($funcionario->admissao);
		$sqlQuery->set($funcionario->endereco);
		$sqlQuery->set($funcionario->numero);
		$sqlQuery->set($funcionario->bairro);
		$sqlQuery->set($funcionario->cidade);
		$sqlQuery->set($funcionario->cEP);
		$sqlQuery->set($funcionario->telefone);
		$sqlQuery->set($funcionario->email);
		$sqlQuery->set($funcionario->ensinoMedio);
		$sqlQuery->set($funcionario->observacoes);
		$sqlQuery->set($funcionario->dataSaida);
		$sqlQuery->set($funcionario->funcaoADEOutros);
		$sqlQuery->set($funcionario->tipoSanguinio);
		$sqlQuery->set($funcionario->usuario);
		$sqlQuery->set($funcionario->senha);

		$id = $this->executeInsert($sqlQuery);	
		$funcionario->codigo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FuncionariosMySql funcionario
 	 */
	public function update($funcionario){
		$sql = 'UPDATE funcionarios SET Nome = ?, CPF = ?, RG = ?, DTNasc = ?, Admissao = ?, Endereco = ?, numero = ?, Bairro = ?, Cidade = ?, CEP = ?, Telefone = ?, Email = ?, EnsinoMedio = ?, Observacoes = ?, DataSaida = ?, FuncaoADEOutros = ?, TipoSanguinio = ?, usuario = ?, senha = ? WHERE Codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($funcionario->nome);
		$sqlQuery->set($funcionario->cPF);
		$sqlQuery->set($funcionario->rG);
		$sqlQuery->set($funcionario->dTNasc);
		$sqlQuery->set($funcionario->admissao);
		$sqlQuery->set($funcionario->endereco);
		$sqlQuery->set($funcionario->numero);
		$sqlQuery->set($funcionario->bairro);
		$sqlQuery->set($funcionario->cidade);
		$sqlQuery->set($funcionario->cEP);
		$sqlQuery->set($funcionario->telefone);
		$sqlQuery->set($funcionario->email);
		$sqlQuery->set($funcionario->ensinoMedio);
		$sqlQuery->set($funcionario->observacoes);
		$sqlQuery->set($funcionario->dataSaida);
		$sqlQuery->set($funcionario->funcaoADEOutros);
		$sqlQuery->set($funcionario->tipoSanguinio);
		$sqlQuery->set($funcionario->usuario);
		$sqlQuery->set($funcionario->senha);

		$sqlQuery->setNumber($funcionario->codigo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM funcionarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM funcionarios WHERE Nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCPF($value){
		$sql = 'SELECT * FROM funcionarios WHERE CPF = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRG($value){
		$sql = 'SELECT * FROM funcionarios WHERE RG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDTNasc($value){
		$sql = 'SELECT * FROM funcionarios WHERE DTNasc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAdmissao($value){
		$sql = 'SELECT * FROM funcionarios WHERE Admissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM funcionarios WHERE Endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM funcionarios WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM funcionarios WHERE Bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM funcionarios WHERE Cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCEP($value){
		$sql = 'SELECT * FROM funcionarios WHERE CEP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM funcionarios WHERE Telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM funcionarios WHERE Email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnsinoMedio($value){
		$sql = 'SELECT * FROM funcionarios WHERE EnsinoMedio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservacoes($value){
		$sql = 'SELECT * FROM funcionarios WHERE Observacoes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataSaida($value){
		$sql = 'SELECT * FROM funcionarios WHERE DataSaida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFuncaoADEOutros($value){
		$sql = 'SELECT * FROM funcionarios WHERE FuncaoADEOutros = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoSanguinio($value){
		$sql = 'SELECT * FROM funcionarios WHERE TipoSanguinio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuario($value){
		$sql = 'SELECT * FROM funcionarios WHERE usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM funcionarios WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM funcionarios WHERE Nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCPF($value){
		$sql = 'DELETE FROM funcionarios WHERE CPF = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRG($value){
		$sql = 'DELETE FROM funcionarios WHERE RG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDTNasc($value){
		$sql = 'DELETE FROM funcionarios WHERE DTNasc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAdmissao($value){
		$sql = 'DELETE FROM funcionarios WHERE Admissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM funcionarios WHERE Endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM funcionarios WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM funcionarios WHERE Bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM funcionarios WHERE Cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCEP($value){
		$sql = 'DELETE FROM funcionarios WHERE CEP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM funcionarios WHERE Telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM funcionarios WHERE Email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnsinoMedio($value){
		$sql = 'DELETE FROM funcionarios WHERE EnsinoMedio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservacoes($value){
		$sql = 'DELETE FROM funcionarios WHERE Observacoes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataSaida($value){
		$sql = 'DELETE FROM funcionarios WHERE DataSaida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFuncaoADEOutros($value){
		$sql = 'DELETE FROM funcionarios WHERE FuncaoADEOutros = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoSanguinio($value){
		$sql = 'DELETE FROM funcionarios WHERE TipoSanguinio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuario($value){
		$sql = 'DELETE FROM funcionarios WHERE usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM funcionarios WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FuncionariosMySql 
	 */
	protected function readRow($row){
		$funcionario = new Funcionario();
		
		$funcionario->codigo = $row['Codigo'];
		$funcionario->nome = $row['Nome'];
		$funcionario->cPF = $row['CPF'];
		$funcionario->rG = $row['RG'];
		$funcionario->dTNasc = $row['DTNasc'];
		$funcionario->admissao = $row['Admissao'];
		$funcionario->endereco = $row['Endereco'];
		$funcionario->numero = $row['numero'];
		$funcionario->bairro = $row['Bairro'];
		$funcionario->cidade = $row['Cidade'];
		$funcionario->cEP = $row['CEP'];
		$funcionario->telefone = $row['Telefone'];
		$funcionario->email = $row['Email'];
		$funcionario->ensinoMedio = $row['EnsinoMedio'];
		$funcionario->observacoes = $row['Observacoes'];
		$funcionario->dataSaida = $row['DataSaida'];
		$funcionario->funcaoADEOutros = $row['FuncaoADEOutros'];
		$funcionario->tipoSanguinio = $row['TipoSanguinio'];
		$funcionario->usuario = $row['usuario'];
		$funcionario->senha = $row['senha'];

		return $funcionario;
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
	 * @return FuncionariosMySql 
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