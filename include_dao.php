<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/CargoDAO.class.php');
	require_once('class/dto/Cargo.class.php');
	require_once('class/mysql/CargoMySqlDAO.class.php');
	require_once('class/mysql/ext/CargoMySqlExtDAO.class.php');
	require_once('class/dao/ServiciosDAO.class.php');
	require_once('class/dto/Servicio.class.php');
	require_once('class/mysql/ServiciosMySqlDAO.class.php');
	require_once('class/mysql/ext/ServiciosMySqlExtDAO.class.php');

?>