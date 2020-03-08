<?php

/**
 * Class that operate on table 'desistencia'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
class DesistenciaMySqlDAO implements DesistenciaDAO {

    /**
     * Get Domain object by primry key
     *
     * @param String $id primary key
     * @return DesistenciaMySql 
     */
    public function load($id) {
        $sql = 'SELECT * FROM desistencia WHERE iddesistencia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
     * Get all records from table
     */
    public function queryAll() {
        $sql = 'SELECT * FROM desistencia';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Get all records from table ordered by field
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM desistencia ORDER BY ' . $orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Delete record from table
     * @param desistencia primary key
     */
    public function delete($iddesistencia) {
        $sql = 'DELETE FROM desistencia WHERE iddesistencia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($iddesistencia);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Insert record to table
     *
     * @param DesistenciaMySql desistencia
     */
    public function insert($desistencia) {
        $sql = 'INSERT INTO desistencia (doador, data,motivo,arquivo,usuario) VALUES (?, ?,?,?,?)';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->setNumber($desistencia->doador);
        $sqlQuery->set($desistencia->data);
        $sqlQuery->set($desistencia->motivo);
        $sqlQuery->set($desistencia->arquivo);
        $sqlQuery->set($desistencia->usuario);
        $id = $this->executeInsert($sqlQuery);
        $desistencia->iddesistencia = $id;
        return $id;
    }

    /**
     * Update record in table
     *
     * @param DesistenciaMySql desistencia
     */
    public function update($desistencia) {
        $sql = 'UPDATE desistencia SET doador = ?, data = ?, motivo = ? WHERE iddesistencia = ?';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->setNumber($desistencia->doador);
        $sqlQuery->set($desistencia->data);
        $sqlQuery->set($desistencia->motivo);
        $sqlQuery->setNumber($desistencia->iddesistencia);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM desistencia';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

    public function queryByDoador($value) {
        $sql = 'SELECT * FROM desistencia WHERE doador = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryByData($value) {
        $sql = 'SELECT * FROM desistencia WHERE data = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByArquivo($arquivo) {
        $sql = 'SELECT * FROM desistencia WHERE arquivo = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($arquivo);
        return $this->getList($sqlQuery);
    }

    public function deleteByDoador($value) {
        $sql = 'DELETE FROM desistencia WHERE doador = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByData($value) {
        $sql = 'DELETE FROM desistencia WHERE data = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Read row
     *
     * @return DesistenciaMySql 
     */
    protected function readRow($row) {
        $desistencia = new Desistencia();

        $desistencia->iddesistencia = $row['iddesistencia'];
        $desistencia->doador = $row['doador'];
        $desistencia->data = $row['data'];
        $desistencia->motivo = $row['motivo'];
        $desistencia->arquivo = $row['arquivo'];
        $desistencia->usuario = $row['usuario'];
        return $desistencia;
    }

    protected function getList($sqlQuery) {
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();
        for ($i = 0; $i < count($tab); $i++) {
            $ret[$i] = $this->readRow($tab[$i]);
        }
        return $ret;
    }

    /**
     * Get row
     *
     * @return DesistenciaMySql 
     */
    protected function getRow($sqlQuery) {
        $tab = QueryExecutor::execute($sqlQuery);
        if (count($tab) == 0) {
            return null;
        }
        return $this->readRow($tab[0]);
    }

    /**
     * Execute sql query
     */
    protected function execute($sqlQuery) {
        return QueryExecutor::execute($sqlQuery);
    }

    /**
     * Execute sql query
     */
    protected function executeUpdate($sqlQuery) {
        return QueryExecutor::executeUpdate($sqlQuery);
    }

    /**
     * Query for one row and one column
     */
    protected function querySingleResult($sqlQuery) {
        return QueryExecutor::queryForString($sqlQuery);
    }

    /**
     * Insert row to table
     */
    protected function executeInsert($sqlQuery) {
        return QueryExecutor::executeInsert($sqlQuery);
    }

}

?>