<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2019-04-07 12:18
 */
interface NumeroArquivoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return NumeroArquivo 
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
 	 * @param numeroArquivo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NumeroArquivo numeroArquivo
 	 */
	public function insert($numeroArquivo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param NumeroArquivo numeroArquivo
 	 */
	public function update($numeroArquivo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByData($value);

	public function queryBySequencial($value);


	public function deleteByData($value);

	public function deleteBySequencial($value);


}
?>