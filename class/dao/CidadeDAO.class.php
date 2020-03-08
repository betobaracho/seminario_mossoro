<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
interface CidadeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cidade 
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
 	 * @param cidade primary key
 	 */
	public function delete($idcidade);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cidade cidade
 	 */
	public function insert($cidade);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cidade cidade
 	 */
	public function update($cidade);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCidade($value);

	public function queryByEstado($value);


	public function deleteByCidade($value);

	public function deleteByEstado($value);


}
?>