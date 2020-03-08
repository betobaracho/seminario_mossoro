<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-06-11 21:21
 */
interface Arquivo03DAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Arquivo03 
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
 	 * @param arquivo03 primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Arquivo03 arquivo03
 	 */
	public function insert($arquivo03);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Arquivo03 arquivo03
 	 */
	public function update($arquivo03);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDataArquivo($value);

	public function queryByCliente($value);

	public function queryByCodigo($value);

	public function queryByArquivo($value);

	public function queryByDataProcessamento($value);

	public function queryByUsuario($value);


	public function deleteByDataArquivo($value);

	public function deleteByCliente($value);

	public function deleteByCodigo($value);

	public function deleteByArquivo($value);

	public function deleteByDataProcessamento($value);

	public function deleteByUsuario($value);


}
?>