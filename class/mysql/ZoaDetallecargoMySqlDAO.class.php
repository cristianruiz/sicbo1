<?php
/**
 * Class that operate on table 'zoa_detallecargo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
class ZoaDetallecargoMySqlDAO implements ZoaDetallecargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ZoaDetallecargoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM zoa_detallecargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM zoa_detallecargo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param zoaDetallecargo primary key
 	 */
	public function delete($iddetalle){
		$sql = 'DELETE FROM zoa_detallecargo WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetalle);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ZoaDetallecargoMySql zoaDetallecargo
 	 */
	public function insert($zoaDetallecargo){
		$sql = 'INSERT INTO zoa_detallecargo (codigoseccion, nrocargo, periodo, codigodetalle, tipodetalle, preciounitario, cantidadentregada, recargo, foliocargo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($zoaDetallecargo->codigoseccion);
		$sqlQuery->setNumber($zoaDetallecargo->nrocargo);
		$sqlQuery->setNumber($zoaDetallecargo->periodo);
		$sqlQuery->setNumber($zoaDetallecargo->codigodetalle);
		$sqlQuery->set($zoaDetallecargo->tipodetalle);
		$sqlQuery->setNumber($zoaDetallecargo->preciounitario);
		$sqlQuery->set($zoaDetallecargo->cantidadentregada);
		$sqlQuery->setNumber($zoaDetallecargo->recargo);
		$sqlQuery->setNumber($zoaDetallecargo->foliocargo);

		$id = $this->executeInsert($sqlQuery);	
		$zoaDetallecargo->iddetalle = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ZoaDetallecargoMySql zoaDetallecargo
 	 */
	public function update($zoaDetallecargo){
		$sql = 'UPDATE zoa_detallecargo SET codigoseccion = ?, nrocargo = ?, periodo = ?, codigodetalle = ?, tipodetalle = ?, preciounitario = ?, cantidadentregada = ?, recargo = ?, foliocargo = ? WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($zoaDetallecargo->codigoseccion);
		$sqlQuery->setNumber($zoaDetallecargo->nrocargo);
		$sqlQuery->setNumber($zoaDetallecargo->periodo);
		$sqlQuery->setNumber($zoaDetallecargo->codigodetalle);
		$sqlQuery->set($zoaDetallecargo->tipodetalle);
		$sqlQuery->setNumber($zoaDetallecargo->preciounitario);
		$sqlQuery->set($zoaDetallecargo->cantidadentregada);
		$sqlQuery->setNumber($zoaDetallecargo->recargo);
		$sqlQuery->setNumber($zoaDetallecargo->foliocargo);

		$sqlQuery->setNumber($zoaDetallecargo->iddetalle);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM zoa_detallecargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNrocargo($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodo($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigodetalle($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE codigodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipodetalle($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE tipodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciounitario($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidadentregada($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE cantidadentregada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRecargo($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE recargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoliocargo($value){
		$sql = 'SELECT * FROM zoa_detallecargo WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNrocargo($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigodetalle($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE codigodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipodetalle($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE tipodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciounitario($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidadentregada($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE cantidadentregada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRecargo($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE recargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoliocargo($value){
		$sql = 'DELETE FROM zoa_detallecargo WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ZoaDetallecargoMySql 
	 */
	protected function readRow($row){
		$zoaDetallecargo = new ZoaDetallecargo();
		
		$zoaDetallecargo->codigoseccion = $row['codigoseccion'];
		$zoaDetallecargo->nrocargo = $row['nrocargo'];
		$zoaDetallecargo->periodo = $row['periodo'];
		$zoaDetallecargo->codigodetalle = $row['codigodetalle'];
		$zoaDetallecargo->tipodetalle = $row['tipodetalle'];
		$zoaDetallecargo->preciounitario = $row['preciounitario'];
		$zoaDetallecargo->cantidadentregada = $row['cantidadentregada'];
		$zoaDetallecargo->recargo = $row['recargo'];
		$zoaDetallecargo->foliocargo = $row['foliocargo'];
		$zoaDetallecargo->iddetalle = $row['iddetalle'];

		return $zoaDetallecargo;
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
	 * @return ZoaDetallecargoMySql 
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