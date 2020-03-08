<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
interface UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Usuario 
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
	
        public function validarUsuario($usuario,$senha);
        
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($idusuario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Usuario usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Usuario usuario
 	 */
	public function update($usuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByEmail($value);

	public function queryByLogin($value);

	public function queryBySenha($value);

	public function queryByParoquia($value);

	public function queryByAtivo($value);


	public function deleteByNome($value);

	public function deleteByEmail($value);

	public function deleteByLogin($value);

	public function deleteBySenha($value);

	public function deleteByParoquia($value);

	public function deleteByAtivo($value);


}
?>