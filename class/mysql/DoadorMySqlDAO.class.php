<?php

/**
 * Class that operate on table 'doador'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-08-28 11:38
 */
class DoadorMySqlDAO implements DoadorDAO {

    /**
     * Get Domain object by primry key
     *
     * @param String $id primary key
     * @return DoadorMySql 
     */
    public function load($id) {
        $sql = 'SELECT * FROM doador WHERE iddoador = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
     * Get all records from table
     */
    public function queryAll() {
        $sql = 'SELECT * FROM doador where status = ? order by nome limit 0,200';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set(0);
        return $this->getList($sqlQuery);
    }

    /**
     * Get all records from table ordered by field
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM doador ORDER BY ' . $orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Delete record from table
     * @param doador primary key
     */
    public function delete($iddoador) {
        $sql = 'DELETE FROM doador WHERE iddoador = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($iddoador);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Insert record to table
     *
     * @param DoadorMySql doador
     */
    public function insert($doador) {
        $sql = 'INSERT INTO doador (nome, cpf, rg, contrato, rua, bairro, cep, 
            cidade, valor_doacao, paroquia, status,telefone,nascimento,email,data_adesao,obs) VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->set($doador->nome);
        $sqlQuery->set($doador->cpf);
        $sqlQuery->set($doador->rg);
        $sqlQuery->set($doador->contrato);
        $sqlQuery->set($doador->rua);
        $sqlQuery->set($doador->bairro);
        $sqlQuery->set($doador->cep);
        $sqlQuery->setNumber($doador->cidade);
        $sqlQuery->set($doador->valorDoacao);
        $sqlQuery->set($doador->paroquia);
        //$sqlQuery->set($doador->dataCancelamento);
        $sqlQuery->set(0);
        $sqlQuery->set($doador->telefone);
        $sqlQuery->set($doador->nascimento);
        $sqlQuery->set($doador->email);
        $sqlQuery->set($doador->dataAdesao);
        $sqlQuery->set($doador->obs);
       // ini_set("display", "On");
       // error_reporting(E_ALL);
        
        $id = $this->executeInsert($sqlQuery);

        $doador->iddoador = $id;
      //  echo "id: ".$id;
      //  var_dump($doador);
        return $id;
    }

    /**
     * Update record in table
     *
     * @param DoadorMySql doador
     */
    public function update($doador) {
        $sql = 'UPDATE doador SET nome = ?, cpf = ?, rg = ?, contrato = ?, rua = ?, 
        bairro = ?, cep = ?, cidade = ?, valor_doacao = ?, paroquia = ?, data_cancelamento = ?,
        motivo_cancelamento = ?,
        status = ?,telefone=?,nascimento=?,email=?,data_adesao=?,obs=? WHERE iddoador = ?';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->set($doador->nome);
        $sqlQuery->set($doador->cpf);
        $sqlQuery->set($doador->rg);
        $sqlQuery->set($doador->contrato);
        $sqlQuery->set($doador->rua);
        $sqlQuery->set($doador->bairro);
        $sqlQuery->set($doador->cep);
        $sqlQuery->setNumber($doador->cidade);
        $sqlQuery->set($doador->valorDoacao);
        $sqlQuery->setNumber($doador->paroquia);
        $sqlQuery->set($doador->dataCancelamento);
        $sqlQuery->set($doador->motivoCancelamento);
        $sqlQuery->setNumber($doador->status);
        $sqlQuery->set($doador->telefone);
        $sqlQuery->set($doador->nascimento);
        $sqlQuery->set($doador->email);
        $sqlQuery->set($doador->dataAdesao);
        $sqlQuery->set($doador->obs);
        $sqlQuery->setNumber($doador->iddoador);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM doador';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

    public function queryByNome($value) {
        $sql = 'SELECT * FROM doador WHERE nome like %?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByCpf($value) {
        $sql = 'SELECT * FROM doador WHERE cpf = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByRg($value) {
        $sql = 'SELECT * FROM doador WHERE rg = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByContrato($value) {
        $sql = 'SELECT * FROM doador WHERE contrato = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getRow($sqlQuery);
        //return $this->getList($sqlQuery);
    }

    public function queryByContratoLike($padrao) {
        $sql = 'SELECT * FROM doador WHERE contrato like ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($padrao);
        return $this->getList($sqlQuery);
    }

    public function queryByRua($value) {
        $sql = 'SELECT * FROM doador WHERE rua = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByBairro($value) {
        $sql = 'SELECT * FROM doador WHERE bairro = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByCep($value) {
        $sql = 'SELECT * FROM doador WHERE cep = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByCidade($value) {
        $sql = 'SELECT * FROM doador WHERE cidade = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryByValorDoacao($value) {
        $sql = 'SELECT * FROM doador WHERE valor_doacao = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByParoquia($value) {
        $sql = 'SELECT * FROM doador WHERE paroquia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryByDataCancelamento($value) {
        $sql = 'SELECT * FROM doador WHERE data_cancelamento = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->getList($sqlQuery);
    }

    public function queryByStatus($value) {
        $sql = 'SELECT * FROM doador WHERE status = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function deleteByNome($value) {
        $sql = 'DELETE FROM doador WHERE nome = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByCpf($value) {
        $sql = 'DELETE FROM doador WHERE cpf = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByRg($value) {
        $sql = 'DELETE FROM doador WHERE rg = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByContrato($value) {
        $sql = 'DELETE FROM doador WHERE contrato = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByRua($value) {
        $sql = 'DELETE FROM doador WHERE rua = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByBairro($value) {
        $sql = 'DELETE FROM doador WHERE bairro = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByCep($value) {
        $sql = 'DELETE FROM doador WHERE cep = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByCidade($value) {
        $sql = 'DELETE FROM doador WHERE cidade = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByValorDoacao($value) {
        $sql = 'DELETE FROM doador WHERE valor_doacao = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByParoquia($value) {
        $sql = 'DELETE FROM doador WHERE paroquia = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByDataCancelamento($value) {
        $sql = 'DELETE FROM doador WHERE data_cancelamento = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByStatus($value) {
        $sql = 'DELETE FROM doador WHERE status = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Read row
     *
     * @return DoadorMySql 
     */
    protected function readRow($row) {
        $doador = new Doador();

        $doador->iddoador = $row['iddoador'];
        $doador->nome = $row['nome'];
        $doador->cpf = $row['cpf'];
        $doador->rg = $row['rg'];
        $doador->contrato = $row['contrato'];
        $doador->rua = $row['rua'];
        $doador->bairro = $row['bairro'];
        $doador->cep = $row['cep'];
        $doador->cidade = $row['cidade'];
        $doador->valorDoacao = $row['valor_doacao'];
        $doador->paroquia = $row['paroquia'];
        $doador->dataCancelamento = $row['data_cancelamento'];
        $doador->status = $row['status'];
        $doador->telefone = $row['telefone'];
        $doador->nascimento = $row["nascimento"];
        $doador->email = $row["email"];
        $doador->dataAdesao = $row["data_adesao"];
        $doador->motivoCancelamento = $row["motivo_cancelamento"];
        return $doador;
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
     * @return DoadorMySql 
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