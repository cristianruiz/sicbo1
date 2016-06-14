<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return OaCargoDAO
	 */
	public static function getOaCargoDAO(){
		return new OaCargoMySqlExtDAO();
	}

	/**
	 * @return OaDetallecargoDAO
	 */
	public static function getOaDetallecargoDAO(){
		return new OaDetallecargoMySqlExtDAO();
	}

	/**
	 * @return OaServiciosDAO
	 */
	public static function getOaServiciosDAO(){
		return new OaServiciosMySqlExtDAO();
	}


}
?>