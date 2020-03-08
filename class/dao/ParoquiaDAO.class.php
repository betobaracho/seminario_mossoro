<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
interface ParoquiaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Paroquia 
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
 	 * @param paroquia primary key
 	 */
	public function delete($idparoquia);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Paroquia paroquia
 	 */
	public function insert($paroquia);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Paroquia paroquia
 	 */
	public function update($paroquia);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByParoquia($value);

	public function queryByCidade($value);

	public function queryByTelefone($value);

	public function queryByResponsavel($value);


	public function deleteByParoquia($value);

	public function deleteByCidade($value);

	public function deleteByTelefone($value);

	public function deleteByResponsavel($value);


}
?>