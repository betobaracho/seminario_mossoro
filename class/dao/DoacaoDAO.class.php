<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
interface DoacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Doacao 
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
 	 * @param doacao primary key
 	 */
	public function delete($iddoacao);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Doacao doacao
 	 */
	public function insert($doacao);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Doacao doacao
 	 */
	public function update($doacao);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByValor($value);

	public function queryByData($value);

        public function queryByDataArquivo($value);
        
        public function queryByArquivo($value);
        
	public function queryByDoador($value);

	public function queryByParoquia($value);


	public function deleteByValor($value);

	public function deleteByData($value);

	public function deleteByDoador($value);

	public function deleteByParoquia($value);


}
?>