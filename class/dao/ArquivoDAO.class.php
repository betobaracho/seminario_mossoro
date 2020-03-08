<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-04-07 12:18
 */
interface ArquivoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Arquivo 
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
 	 * @param arquivo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Arquivo arquivo
 	 */
	public function insert($arquivo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Arquivo arquivo
 	 */
	public function update($arquivo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByData($value);

	public function queryByValorTotal($value);

	public function queryByConferenciaValor($value);

	public function queryByDataProcessamento($value);

	public function queryByNumeroDoacoes($value);

	public function queryByConfDoacoes($value);


	public function deleteByNome($value);

	public function deleteByData($value);

	public function deleteByValorTotal($value);

	public function deleteByConferenciaValor($value);

	public function deleteByDataProcessamento($value);

	public function deleteByNumeroDoacoes($value);

	public function deleteByConfDoacoes($value);


}
?>