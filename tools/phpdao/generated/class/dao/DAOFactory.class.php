<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CargoDAO
	 */
	public static function getCargoDAO(){
		return new CargoMySqlExtDAO();
	}

	/**
	 * @return DetallecargoDAO
	 */
	public static function getDetallecargoDAO(){
		return new DetallecargoMySqlExtDAO();
	}

	/**
	 * @return ServiciosDAO
	 */
	public static function getServiciosDAO(){
		return new ServiciosMySqlExtDAO();
	}


}
?>