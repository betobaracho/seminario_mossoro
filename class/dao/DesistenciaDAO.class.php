<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
interface DesistenciaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Desistencia 
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
 	 * @param desistencia primary key
 	 */
	public function delete($iddesistencia);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Desistencia desistencia
 	 */
	public function insert($desistencia);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Desistencia desistencia
 	 */
	public function update($desistencia);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDoador($value);

	public function queryByData($value);

        public function queryByArquivo($arquivo);
        
	public function deleteByDoador($value);

	public function deleteByData($value);


}
?>