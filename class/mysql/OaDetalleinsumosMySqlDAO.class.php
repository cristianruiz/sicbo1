<?php
/**
 * Class that operate on table 'oa_detalleinsumos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
class OaDetalleinsumosMySqlDAO implements OaDetalleinsumosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OaDetalleinsumosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM oa_detalleinsumos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM oa_detalleinsumos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param oaDetalleinsumo primary key
 	 */
	public function delete($iddetalle){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetalle);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaDetalleinsumosMySql oaDetalleinsumo
 	 */
	public function insert($oaDetalleinsumo){
		$sql = 'INSERT INTO oa_detalleinsumos (codigoinsumo, codigoseccion, nrocargo, periodo, preciounitario, cantidadentregada, recargo, foliocargo, abastecido, idpaquete) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaDetalleinsumo->codigoinsumo);
		$sqlQuery->setNumber($oaDetalleinsumo->codigoseccion);
		$sqlQuery->setNumber($oaDetalleinsumo->nrocargo);
		$sqlQuery->setNumber($oaDetalleinsumo->periodo);
		$sqlQuery->setNumber($oaDetalleinsumo->preciounitario);
		$sqlQuery->setNumber($oaDetalleinsumo->cantidadentregada);
		$sqlQuery->setNumber($oaDetalleinsumo->recargo);
		$sqlQuery->setNumber($oaDetalleinsumo->foliocargo);
		$sqlQuery->set($oaDetalleinsumo->abastecido);
		$sqlQuery->setNumber($oaDetalleinsumo->idpaquete);

		$id = $this->executeInsert($sqlQuery);	
		$oaDetalleinsumo->iddetalle = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaDetalleinsumosMySql oaDetalleinsumo
 	 */
	public function update($oaDetalleinsumo){
		$sql = 'UPDATE oa_detalleinsumos SET codigoinsumo = ?, codigoseccion = ?, nrocargo = ?, periodo = ?, preciounitario = ?, cantidadentregada = ?, recargo = ?, foliocargo = ?, abastecido = ?, idpaquete = ? WHERE iddetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaDetalleinsumo->codigoinsumo);
		$sqlQuery->setNumber($oaDetalleinsumo->codigoseccion);
		$sqlQuery->setNumber($oaDetalleinsumo->nrocargo);
		$sqlQuery->setNumber($oaDetalleinsumo->periodo);
		$sqlQuery->setNumber($oaDetalleinsumo->preciounitario);
		$sqlQuery->setNumber($oaDetalleinsumo->cantidadentregada);
		$sqlQuery->setNumber($oaDetalleinsumo->recargo);
		$sqlQuery->setNumber($oaDetalleinsumo->foliocargo);
		$sqlQuery->set($oaDetalleinsumo->abastecido);
		$sqlQuery->setNumber($oaDetalleinsumo->idpaquete);

		$sqlQuery->setNumber($oaDetalleinsumo->iddetalle);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM oa_detalleinsumos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigoinsumo($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNrocargo($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodo($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciounitario($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidadentregada($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE cantidadentregada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRecargo($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE recargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoliocargo($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbastecido($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE abastecido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdpaquete($value){
		$sql = 'SELECT * FROM oa_detalleinsumos WHERE idpaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigoinsumo($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNrocargo($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciounitario($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidadentregada($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE cantidadentregada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRecargo($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE recargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoliocargo($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbastecido($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE abastecido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdpaquete($value){
		$sql = 'DELETE FROM oa_detalleinsumos WHERE idpaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OaDetalleinsumosMySql 
	 */
	protected function readRow($row){
		$oaDetalleinsumo = new OaDetalleinsumo();
		
		$oaDetalleinsumo->iddetalle = $row['iddetalle'];
		$oaDetalleinsumo->codigoinsumo = $row['codigoinsumo'];
		$oaDetalleinsumo->codigoseccion = $row['codigoseccion'];
		$oaDetalleinsumo->nrocargo = $row['nrocargo'];
		$oaDetalleinsumo->periodo = $row['periodo'];
		$oaDetalleinsumo->preciounitario = $row['preciounitario'];
		$oaDetalleinsumo->cantidadentregada = $row['cantidadentregada'];
		$oaDetalleinsumo->recargo = $row['recargo'];
		$oaDetalleinsumo->foliocargo = $row['foliocargo'];
		$oaDetalleinsumo->abastecido = $row['abastecido'];
		$oaDetalleinsumo->idpaquete = $row['idpaquete'];

		return $oaDetalleinsumo;
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
	 * @return OaDetalleinsumosMySql 
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