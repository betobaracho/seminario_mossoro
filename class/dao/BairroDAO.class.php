<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-09-25 21:28
 */
interface BairroDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Bairro 
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
 	 * @param bairro primary key
 	 */
	public function delete($idbairro);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Bairro bairro
 	 */
	public function insert($bairro);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Bairro bairro
 	 */
	public function update($bairro);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByBairro($value);

	public function queryByCidade($value);


	public function deleteByBairro($value);

	public function deleteByCidade($value);


}
?>