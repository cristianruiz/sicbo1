<?php
/**
 * Class that operate on table 'oa_detallecargo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-06-14 16:58
 */
class OaDetallecargoMySqlDAO implements OaDetallecargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OaDetallecargoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM oa_detallecargo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM oa_detallecargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM oa_detallecargo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param oaDetallecargo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM oa_detallecargo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaDetallecargoMySql oaDetallecargo
 	 */
	public function insert($oaDetallecargo){
		$sql = 'INSERT INTO oa_detallecargo (codigoseccion, nrocargo, periodo, codigodetalle, tipodetalle, preciounitario, cantidadentregada, recargo, foliocargo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaDetallecargo->codigoseccion);
		$sqlQuery->setNumber($oaDetallecargo->nrocargo);
		$sqlQuery->setNumber($oaDetallecargo->periodo);
		$sqlQuery->setNumber($oaDetallecargo->codigodetalle);
		$sqlQuery->set($oaDetallecargo->tipodetalle);
		$sqlQuery->setNumber($oaDetallecargo->preciounitario);
		$sqlQuery->set($oaDetallecargo->cantidadentregada);
		$sqlQuery->setNumber($oaDetallecargo->recargo);
		$sqlQuery->setNumber($oaDetallecargo->foliocargo);

		$id = $this->executeInsert($sqlQuery);	
		$oaDetallecargo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaDetallecargoMySql oaDetallecargo
 	 */
	public function update($oaDetallecargo){
		$sql = 'UPDATE oa_detallecargo SET codigoseccion = ?, nrocargo = ?, periodo = ?, codigodetalle = ?, tipodetalle = ?, preciounitario = ?, cantidadentregada = ?, recargo = ?, foliocargo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaDetallecargo->codigoseccion);
		$sqlQuery->setNumber($oaDetallecargo->nrocargo);
		$sqlQuery->setNumber($oaDetallecargo->periodo);
		$sqlQuery->setNumber($oaDetallecargo->codigodetalle);
		$sqlQuery->set($oaDetallecargo->tipodetalle);
		$sqlQuery->setNumber($oaDetallecargo->preciounitario);
		$sqlQuery->set($oaDetallecargo->cantidadentregada);
		$sqlQuery->setNumber($oaDetallecargo->recargo);
		$sqlQuery->setNumber($oaDetallecargo->foliocargo);

		$sqlQuery->setNumber($oaDetallecargo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM oa_detallecargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNrocargo($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodo($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigodetalle($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE codigodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipodetalle($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE tipodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciounitario($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidadentregada($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE cantidadentregada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRecargo($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE recargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoliocargo($value){
		$sql = 'SELECT * FROM oa_detallecargo WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNrocargo($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigodetalle($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE codigodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipodetalle($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE tipodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciounitario($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidadentregada($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE cantidadentregada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRecargo($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE recargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoliocargo($value){
		$sql = 'DELETE FROM oa_detallecargo WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OaDetallecargoMySql 
	 */
	protected function readRow($row){
		$oaDetallecargo = new OaDetallecargo();
		
		$oaDetallecargo->codigoseccion = $row['codigoseccion'];
		$oaDetallecargo->nrocargo = $row['nrocargo'];
		$oaDetallecargo->periodo = $row['periodo'];
		$oaDetallecargo->codigodetalle = $row['codigodetalle'];
		$oaDetallecargo->tipodetalle = $row['tipodetalle'];
		$oaDetallecargo->preciounitario = $row['preciounitario'];
		$oaDetallecargo->cantidadentregada = $row['cantidadentregada'];
		$oaDetallecargo->recargo = $row['recargo'];
		$oaDetallecargo->foliocargo = $row['foliocargo'];
		$oaDetallecargo->id = $row['id'];

		return $oaDetallecargo;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return OaDetallecargoMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>