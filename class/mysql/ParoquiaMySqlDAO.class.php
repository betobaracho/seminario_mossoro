<?php

/**
 * Class that operate on table 'paroquia'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
class ParoquiaMySqlDAO implements ParoquiaDAO {

    /**
     * Get Domain object by primry key
     *
     * @param String $id primary key
     * @return ParoquiaMySql 
     */
    public function load($id) {
        $sql = 'SELECT * FROM paroquia WHERE idparoquia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($id);
        return $this->getRow($sqlQuery);
    }

    /**
     * Get all records from table
     */
    public function queryAll() {
        $sql = 'SELECT * FROM paroquia order by paroquia';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Get all records from table ordered by field
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM paroquia ORDER BY ' . $orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Delete record from table
     * @param paroquia primary key
     */
    public function delete($idparoquia) {
        $sql = 'DELETE FROM paroquia WHERE idparoquia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idparoquia);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Insert record to table
     *
     * @param ParoquiaMySql paroquia
     */
    public function insert($paroquia) {
        $sql = 'INSERT INTO paroquia (paroquia, cidade, telefone, responsavel,zonal) VALUES (?, ?, ?, ?,?)';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->set($paroquia->paroquia);
        $sqlQuery->setNumber($paroquia->cidade);
        $sqlQuery->set($paroquia->telefone);
        $sqlQuery->set($paroquia->responsavel);
        $sqlQuery->set($paroquia->zonal);
        $id = $this->executeInsert($sqlQuery);
        $paroquia->idparoquia = $id;
        return $id;
    }

    /**
     * Update record in table
     *
     * @param ParoquiaMySql paroquia
     */
    public function update($paroquia) {
        $sql = 'UPDATE paroquia SET paroquia = ?, cidade = ?, telefone = ?, responsavel = ?,zonal = ? WHERE idparoquia = ?';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->set($paroquia->paroquia);
        $sqlQuery->setNumber($paroquia->cidade);
        $sqlQuery->set($paroquia->telefone);
        $sqlQuery->set($paroquia->responsavel);
        $sqlQuery->set($paroquia->zonal);
        $sqlQuery->setNumber($paroquia->idparoquia);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM paroquia';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

    public function queryByParoquia($value) {
        $sql = 'SELECT * FROM paroquia WHERE paroquia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByCidade($value) {
        $sql = 'SELECT * FROM paroquia WHERE cidade = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryByTelefone($value) {
        $sql = 'SELECT * FROM paroquia WHERE telefone = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByResponsavel($value) {
        $sql = 'SELECT * FROM paroquia WHERE responsavel = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }
    
    public function queryByZonal($value) {
        $sql = 'SELECT * FROM paroquia WHERE zonal = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function deleteByParoquia($value) {
        $sql = 'DELETE FROM paroquia WHERE paroquia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByCidade($value) {
        $sql = 'DELETE FROM paroquia WHERE cidade = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByTelefone($value) {
        $sql = 'DELETE FROM paroquia WHERE telefone = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByResponsavel($value) {
        $sql = 'DELETE FROM paroquia WHERE responsavel = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Read row
     *
     * @return ParoquiaMySql 
     */
    protected function readRow($row) {
        $paroquia = new Paroquia();

        $paroquia->idparoquia = $row['idparoquia'];
        $paroquia->paroquia = $row['paroquia'];
        $paroquia->cidade = $row['cidade'];
        $paroquia->telefone = $row['telefone'];
        $paroquia->responsavel = $row['responsavel'];
        $paroquia->zonal = $row['zonal'];
        return $paroquia;
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
     * @return ParoquiaMySql 
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