<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-04-07 12:18
 */
interface FuncionariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Funcionarios 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param funcionario primary key
 	 */
	public function delete($Codigo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Funcionarios funcionario
 	 */
	public function insert($funcionario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Funcionarios funcionario
 	 */
	public function update($funcionario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByCPF($value);

	public function queryByRG($value);

	public function queryByDTNasc($value);

	public function queryByAdmissao($value);

	public function queryByEndereco($value);

	public function queryByNumero($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByCEP($value);

	public function queryByTelefone($value);

	public function queryByEmail($value);

	public function queryByEnsinoMedio($value);

	public function queryByObservacoes($value);

	public function queryByDataSaida($value);

	public function queryByFuncaoADEOutros($value);

	public function queryByTipoSanguinio($value);

	public function queryByUsuario($value);

	public function queryBySenha($value);


	public function deleteByNome($value);

	public function deleteByCPF($value);

	public function deleteByRG($value);

	public function deleteByDTNasc($value);

	public function deleteByAdmissao($value);

	public function deleteByEndereco($value);

	public function deleteByNumero($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByCEP($value);

	public function deleteByTelefone($value);

	public function deleteByEmail($value);

	public function deleteByEnsinoMedio($value);

	public function deleteByObservacoes($value);

	public function deleteByDataSaida($value);

	public function deleteByFuncaoADEOutros($value);

	public function deleteByTipoSanguinio($value);

	public function deleteByUsuario($value);

	public function deleteBySenha($value);


}
?>