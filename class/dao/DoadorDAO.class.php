<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
interface DoadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Doador 
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
 	 * @param doador primary key
 	 */
	public function delete($iddoador);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Doador doador
 	 */
	public function insert($doador);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Doador doador
 	 */
	public function update($doador);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByCpf($value);

	public function queryByRg($value);

	public function queryByContrato($value);
        
        public function queryByContratoLike($padrao);
        
	public function queryByRua($value);

	public function queryByBairro($value);

	public function queryByCep($value);

	public function queryByCidade($value);

	public function queryByValorDoacao($value);

	public function queryByParoquia($value);

	public function queryByDataCancelamento($value);

	public function queryByStatus($value);


	public function deleteByNome($value);

	public function deleteByCpf($value);

	public function deleteByRg($value);

	public function deleteByContrato($value);

	public function deleteByRua($value);

	public function deleteByBairro($value);

	public function deleteByCep($value);

	public function deleteByCidade($value);

	public function deleteByValorDoacao($value);

	public function deleteByParoquia($value);

	public function deleteByDataCancelamento($value);

	public function deleteByStatus($value);


}
?>