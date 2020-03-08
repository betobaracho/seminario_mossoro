<?php

//include all DAO files
//include all DAO files
require_once('class/sql/Connection.class.php');
require_once('class/sql/ConnectionFactory.class.php');
require_once('class/sql/ConnectionProperty.class.php');
require_once('class/sql/QueryExecutor.class.php');
require_once('class/sql/Transaction.class.php');
require_once('class/sql/SqlQuery.class.php');
require_once('class/core/ArrayList.class.php');
require_once('class/dao/DAOFactory.class.php');

require_once('class/dao/ArquivoDAO.class.php');
require_once('class/dto/Arquivo.class.php');
require_once('class/mysql/ArquivoMySqlDAO.class.php');
require_once('class/mysql/ext/ArquivoMySqlExtDAO.class.php');
require_once('class/dao/Arquivo03DAO.class.php');
require_once('class/dto/Arquivo03.class.php');
require_once('class/mysql/Arquivo03MySqlDAO.class.php');
require_once('class/mysql/ext/Arquivo03MySqlExtDAO.class.php');
require_once('class/dao/BairroDAO.class.php');
require_once('class/dto/Bairro.class.php');
require_once('class/mysql/BairroMySqlDAO.class.php');
require_once('class/mysql/ext/BairroMySqlExtDAO.class.php');
require_once('class/dao/CidadeDAO.class.php');
require_once('class/dto/Cidade.class.php');
require_once('class/mysql/CidadeMySqlDAO.class.php');
require_once('class/mysql/ext/CidadeMySqlExtDAO.class.php');
require_once('class/dao/DesistenciaDAO.class.php');
require_once('class/dto/Desistencia.class.php');
require_once('class/mysql/DesistenciaMySqlDAO.class.php');
require_once('class/mysql/ext/DesistenciaMySqlExtDAO.class.php');
require_once('class/dao/DoacaoDAO.class.php');
require_once('class/dto/Doacao.class.php');
require_once('class/mysql/DoacaoMySqlDAO.class.php');
require_once('class/mysql/ext/DoacaoMySqlExtDAO.class.php');
require_once('class/dao/DoadorDAO.class.php');
require_once('class/dto/Doador.class.php');
require_once('class/mysql/DoadorMySqlDAO.class.php');
require_once('class/mysql/ext/DoadorMySqlExtDAO.class.php');
require_once('class/dao/FuncionariosDAO.class.php');
require_once('class/dto/Funcionario.class.php');
require_once('class/mysql/FuncionariosMySqlDAO.class.php');
require_once('class/mysql/ext/FuncionariosMySqlExtDAO.class.php');
/*require_once('class/dao/IrmaosDAO.class.php');
require_once('class/dto/Irmao.class.php');
require_once('class/mysql/IrmaosMySqlDAO.class.php');
require_once('class/mysql/ext/IrmaosMySqlExtDAO.class.php');*/
require_once('class/dao/NumeroArquivoDAO.class.php');
require_once('class/dto/NumeroArquivo.class.php');
require_once('class/mysql/NumeroArquivoMySqlDAO.class.php');
require_once('class/mysql/ext/NumeroArquivoMySqlExtDAO.class.php');
require_once('class/dao/ParoquiaDAO.class.php');
require_once('class/dto/Paroquia.class.php');
require_once('class/mysql/ParoquiaMySqlDAO.class.php');
require_once('class/mysql/ext/ParoquiaMySqlExtDAO.class.php');

require_once('class/dao/UsuarioDAO.class.php');
require_once('class/dto/Usuario.class.php');
require_once('class/mysql/UsuarioMySqlDAO.class.php');
require_once('class/mysql/ext/UsuarioMySqlExtDAO.class.php');

require_once('class/dao/ZonalDAO.class.php');
require_once('class/dto/Zonal.class.php');
require_once('class/mysql/ZonalMysqlDAO.php');
require_once('class/mysql/ext/ZonalMySqlExtDAO.class.php');

require_once 'Utils.php';
?>
