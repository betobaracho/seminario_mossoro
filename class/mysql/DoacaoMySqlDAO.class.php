<?php

/**
 * Class that operate on table 'doacao'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
class DoacaoMySqlDAO implements DoacaoDAO {

    /**
     * Get Domain object by primry key
     *
     * @param String $id primary key
     * @return DoacaoMySql 
     */
    public function load($id) {
        $sql = 'SELECT * FROM doacao WHERE iddoacao = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
     * Get all records from table
     */
    public function queryAll() {
        $sql = 'SELECT * FROM doacao';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Get all records from table ordered by field
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM doacao ORDER BY ' . $orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Delete record from table
     * @param doacao primary key
     */
    public function delete($iddoacao) {
        $sql = 'DELETE FROM doacao WHERE iddoacao = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($iddoacao);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Insert record to table
     *
     * @param DoacaoMySql doacao
     */
    public function insert($doacao) {
        $sql = 'INSERT INTO doacao (valor, data, doador, paroquia,arquivo,data_arquivo,cod_movimento,data_vencimento,data_fatura,data_referencia) '
                . 'VALUES (?, ?, ?, ?,?,?,?,?,?,?)';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->set($doacao->valor);
        $sqlQuery->set($doacao->data);
        $sqlQuery->set($doacao->doador);
        $sqlQuery->set($doacao->paroquia);
        $sqlQuery->set($doacao->arquivo);
        $sqlQuery->set($doacao->dataArquivo);
        $sqlQuery->set($doacao->codMovimento);
        $sqlQuery->set($doacao->dataVencimento);
        $sqlQuery->set($doacao->dataFatura);
        $sqlQuery->set($doacao->dataReferencia);
        $id = $this->executeInsert($sqlQuery);
        $doacao->iddoacao = $id;
        return $id;
    }

    /**
     * Update record in table
     *
     * @param DoacaoMySql doacao
     */
    public function update($doacao) {
        $sql = 'UPDATE doacao SET valor = ?, data = ?, doador = ?, paroquia = ? WHERE iddoacao = ?';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->set($doacao->valor);
        $sqlQuery->set($doacao->data);
        $sqlQuery->setNumber($doacao->doador);
        $sqlQuery->setNumber($doacao->paroquia);

        $sqlQuery->setNumber($doacao->iddoacao);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM doacao';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

    public function queryByValor($value) {
        $sql = 'SELECT * FROM doacao WHERE valor = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByData($value) {
        $sql = 'SELECT * FROM doacao WHERE data = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }
    
    public function queryByDataArquivo($value) {
        $sql = 'SELECT * FROM doacao WHERE data_arquivo = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByArquivo($value) {
        $sql = 'SELECT * FROM doacao WHERE arquivo = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }
    
    public function queryByDoador($value) {
        $sql = 'SELECT * FROM doacao WHERE doador = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryByParoquia($value) {
        $sql = 'SELECT * FROM doacao WHERE paroquia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function deleteByValor($value) {
        $sql = 'DELETE FROM doacao WHERE valor = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByData($value) {
        $sql = 'DELETE FROM doacao WHERE data = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByDoador($value) {
        $sql = 'DELETE FROM doacao WHERE doador = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByParoquia($value) {
        $sql = 'DELETE FROM doacao WHERE paroquia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Read row
     *
     * @return DoacaoMySql 
     */
    protected function readRow($row) {
        $doacao = new Doacao();

        $doacao->iddoacao = $row['iddoacao'];
        $doacao->valor = $row['valor'];
        $doacao->data = $row['data'];
        $doacao->doador = $row['doador'];
        $doacao->paroquia = $row['paroquia'];
        $doacao->arquivo = $row["arquivo"];
        $doacao->dataArquivo = $row["data_arquivo"];
        $doacao->codMovimento = $row["cod_movimento"];
        $doacao->dataVencimento = $row["data_vencimento"];
        $doacao->dataFatura = $row["data_fatura"];
        $doacao->dataReferencia = $row["data_referencia"];
        return $doacao;
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
     * @return DoacaoMySql 
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