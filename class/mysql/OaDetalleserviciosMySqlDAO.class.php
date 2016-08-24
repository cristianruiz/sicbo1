<?php
/**
 * Class that operate on table 'oa_detalleservicios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 21:12
 */
class OaDetalleserviciosMySqlDAO implements OaDetalleserviciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OaDetalleserviciosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM oa_detalleservicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM oa_detalleservicios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param oaDetalleservicio primary key
 	 */
	public function delete($iddetalle){
		$sql = 'DELETE FROM oa_detalleservicios WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetalle);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaDetalleserviciosMySql oaDetalleservicio
 	 */
	public function insert($oaDetalleservicio){
		$sql = 'INSERT INTO oa_detalleservicios (codigoseccion, nrocargo, periodo, codigodetalle, preciounitario, cantidadentregada, recargo, foliocargo, idpaquete) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaDetalleservicio->codigoseccion);
		$sqlQuery->setNumber($oaDetalleservicio->nrocargo);
		$sqlQuery->setNumber($oaDetalleservicio->periodo);
		$sqlQuery->setNumber($oaDetalleservicio->codigodetalle);
		$sqlQuery->setNumber($oaDetalleservicio->preciounitario);
		$sqlQuery->setNumber($oaDetalleservicio->cantidadentregada);
		$sqlQuery->setNumber($oaDetalleservicio->recargo);
		$sqlQuery->setNumber($oaDetalleservicio->foliocargo);
		$sqlQuery->setNumber($oaDetalleservicio->idpaquete);

		$id = $this->executeInsert($sqlQuery);	
		$oaDetalleservicio->iddetalle = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaDetalleserviciosMySql oaDetalleservicio
 	 */
	public function update($oaDetalleservicio){
		$sql = 'UPDATE oa_detalleservicios SET codigoseccion = ?, nrocargo = ?, periodo = ?, codigodetalle = ?, preciounitario = ?, cantidadentregada = ?, recargo = ?, foliocargo = ?, idpaquete = ? WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaDetalleservicio->codigoseccion);
		$sqlQuery->setNumber($oaDetalleservicio->nrocargo);
		$sqlQuery->setNumber($oaDetalleservicio->periodo);
		$sqlQuery->setNumber($oaDetalleservicio->codigodetalle);
		$sqlQuery->setNumber($oaDetalleservicio->preciounitario);
		$sqlQuery->setNumber($oaDetalleservicio->cantidadentregada);
		$sqlQuery->setNumber($oaDetalleservicio->recargo);
		$sqlQuery->setNumber($oaDetalleservicio->foliocargo);
		$sqlQuery->setNumber($oaDetalleservicio->idpaquete);

		$sqlQuery->setNumber($oaDetalleservicio->iddetalle);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM oa_detalleservicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNrocargo($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodo($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigodetalle($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE codigodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciounitario($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidadentregada($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE cantidadentregada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRecargo($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE recargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoliocargo($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdpaquete($value){
		$sql = 'SELECT * FROM oa_detalleservicios WHERE idpaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNrocargo($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigodetalle($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE codigodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciounitario($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidadentregada($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE cantidadentregada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRecargo($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE recargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoliocargo($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdpaquete($value){
		$sql = 'DELETE FROM oa_detalleservicios WHERE idpaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OaDetalleserviciosMySql 
	 */
	protected function readRow($row){
		$oaDetalleservicio = new OaDetalleservicio();
		
		$oaDetalleservicio->codigoseccion = $row['codigoseccion'];
		$oaDetalleservicio->nrocargo = $row['nrocargo'];
		$oaDetalleservicio->periodo = $row['periodo'];
		$oaDetalleservicio->codigodetalle = $row['codigodetalle'];
		$oaDetalleservicio->preciounitario = $row['preciounitario'];
		$oaDetalleservicio->cantidadentregada = $row['cantidadentregada'];
		$oaDetalleservicio->recargo = $row['recargo'];
		$oaDetalleservicio->foliocargo = $row['foliocargo'];
		$oaDetalleservicio->iddetalle = $row['iddetalle'];
		$oaDetalleservicio->idpaquete = $row['idpaquete'];

		return $oaDetalleservicio;
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
	 * @return OaDetalleserviciosMySql 
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