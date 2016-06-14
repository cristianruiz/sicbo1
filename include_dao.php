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
 	
	require_once('class/dao/OaCargoDAO.class.php');
	require_once('class/dto/OaCargo.class.php');
	require_once('class/mysql/OaCargoMySqlDAO.class.php');
	require_once('class/mysql/ext/OaCargoMySqlExtDAO.class.php');
	require_once('class/dao/OaDetallecargoDAO.class.php');
	require_once('class/dto/OaDetallecargo.class.php');
	require_once('class/mysql/OaDetallecargoMySqlDAO.class.php');
	require_once('class/mysql/ext/OaDetallecargoMySqlExtDAO.class.php');
	require_once('class/dao/OaServiciosDAO.class.php');
	require_once('class/dto/OaServicio.class.php');
	require_once('class/mysql/OaServiciosMySqlDAO.class.php');
	require_once('class/mysql/ext/OaServiciosMySqlExtDAO.class.php');

?>