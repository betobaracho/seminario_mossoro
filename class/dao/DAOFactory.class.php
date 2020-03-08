<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return ArquivoDAO
	 */
	public static function getArquivoDAO(){
		return new ArquivoMySqlExtDAO();
	}

	/**
	 * @return Arquivo03DAO
	 */
	public static function getArquivo03DAO(){
		return new Arquivo03MySqlExtDAO();
	}

	/**
	 * @return BairroDAO
	 */
	public static function getBairroDAO(){
		return new BairroMySqlExtDAO();
	}

	/**
	 * @return CidadeDAO
	 */
	public static function getCidadeDAO(){
		return new CidadeMySqlExtDAO();
	}

	/**
	 * @return DesistenciaDAO
	 */
	public static function getDesistenciaDAO(){
		return new DesistenciaMySqlExtDAO();
	}

	/**
	 * @return DoacaoDAO
	 */
	public static function getDoacaoDAO(){
		return new DoacaoMySqlExtDAO();
	}

	/**
	 * @return DoadorDAO
	 */
	public static function getDoadorDAO(){
		return new DoadorMySqlExtDAO();
	}

	/**
	 * @return FuncionariosDAO
	 */
	public static function getFuncionariosDAO(){
		return new FuncionariosMySqlExtDAO();
	}

	/**
	 * @return IrmaosDAO
	 */
	public static function getIrmaosDAO(){
		return new IrmaosMySqlExtDAO();
	}

	/**
	 * @return NumeroArquivoDAO
	 */
	public static function getNumeroArquivoDAO(){
		return new NumeroArquivoMySqlExtDAO();
	}

	/**
	 * @return ParoquiaDAO
	 */
	public static function getParoquiaDAO(){
		return new ParoquiaMySqlExtDAO();
	}

	/**
	 * @return SeminaristaDAO
	 */
	public static function getSeminaristaDAO(){
		return new SeminaristaMySqlExtDAO();
	}

	/**
	 * @return UsuarioDAO
	 */
	public static function getUsuarioDAO(){
		return new UsuarioMySqlExtDAO();
	}

        public static function getZonalDAO(){
		return new ZonalMySqlExtDAO();
	}
}
?>