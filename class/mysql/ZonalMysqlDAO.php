<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ZonalMysqlDAO
 *
 * @author betobaracho
 */
class ZonalMysqlDAO implements ZonalDAO{
    //put your code here
    public function load($id) {
        $sql = 'SELECT * FROM zonal WHERE id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    public function queryAll() {
        $sql = 'SELECT * FROM zonal';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Read row
     *
     * @return UsuarioMySql 
     */
    protected function readRow($row) {
        $zonal = new Zonal();

        $zonal->id = $row['id'];
        $zonal->zonal = $row['zonal'];        
        return $zonal;
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
     * @return UsuarioMySql 
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
