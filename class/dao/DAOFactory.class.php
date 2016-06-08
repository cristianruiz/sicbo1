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
	 * @return ServiciosDAO
	 */
	public static function getServiciosDAO(){
		return new ServiciosMySqlExtDAO();
	}


}
?>