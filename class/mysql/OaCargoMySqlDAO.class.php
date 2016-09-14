<?php
/**
 * Class that operate on table 'oa_cargo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class OaCargoMySqlDAO implements OaCargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OaCargoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM oa_cargo WHERE folio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM oa_cargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM oa_cargo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param oaCargo primary key
 	 */
	public function delete($folio){
		$sql = 'DELETE FROM oa_cargo WHERE folio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($folio);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaCargoMySql oaCargo
 	 */
	public function insert($oaCargo){
		$sql = 'INSERT INTO oa_cargo (nrocargo, codigoseccion, periodo, fecha, nroficha, hora, minuto, tipoventa, tipopago, idtoth, rutfinanciador, codigoestadocargo, codigoentidad, rutoperador, saldo, totalcargo, rutpaciente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaCargo->nrocargo);
		$sqlQuery->setNumber($oaCargo->codigoseccion);
		$sqlQuery->setNumber($oaCargo->periodo);
		$sqlQuery->set($oaCargo->fecha);
		$sqlQuery->setNumber($oaCargo->nroficha);
		$sqlQuery->setNumber($oaCargo->hora);
		$sqlQuery->setNumber($oaCargo->minuto);
		$sqlQuery->setNumber($oaCargo->tipoventa);
		$sqlQuery->setNumber($oaCargo->tipopago);
		$sqlQuery->setNumber($oaCargo->idtoth);
		$sqlQuery->setNumber($oaCargo->rutfinanciador);
		$sqlQuery->setNumber($oaCargo->codigoestadocargo);
		$sqlQuery->setNumber($oaCargo->codigoentidad);
		$sqlQuery->setNumber($oaCargo->rutoperador);
		$sqlQuery->setNumber($oaCargo->saldo);
		$sqlQuery->setNumber($oaCargo->totalcargo);
		$sqlQuery->setNumber($oaCargo->rutpaciente);

		$id = $this->executeInsert($sqlQuery);	
		$oaCargo->folio = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaCargoMySql oaCargo
 	 */
	public function update($oaCargo){
		$sql = 'UPDATE oa_cargo SET nrocargo = ?, codigoseccion = ?, periodo = ?, fecha = ?, nroficha = ?, hora = ?, minuto = ?, tipoventa = ?, tipopago = ?, idtoth = ?, rutfinanciador = ?, codigoestadocargo = ?, codigoentidad = ?, rutoperador = ?, saldo = ?, totalcargo = ?, rutpaciente = ? WHERE folio = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaCargo->nrocargo);
		$sqlQuery->setNumber($oaCargo->codigoseccion);
		$sqlQuery->setNumber($oaCargo->periodo);
		$sqlQuery->set($oaCargo->fecha);
		$sqlQuery->setNumber($oaCargo->nroficha);
		$sqlQuery->setNumber($oaCargo->hora);
		$sqlQuery->setNumber($oaCargo->minuto);
		$sqlQuery->setNumber($oaCargo->tipoventa);
		$sqlQuery->setNumber($oaCargo->tipopago);
		$sqlQuery->setNumber($oaCargo->idtoth);
		$sqlQuery->setNumber($oaCargo->rutfinanciador);
		$sqlQuery->setNumber($oaCargo->codigoestadocargo);
		$sqlQuery->setNumber($oaCargo->codigoentidad);
		$sqlQuery->setNumber($oaCargo->rutoperador);
		$sqlQuery->setNumber($oaCargo->saldo);
		$sqlQuery->setNumber($oaCargo->totalcargo);
		$sqlQuery->setNumber($oaCargo->rutpaciente);

		$sqlQuery->setNumber($oaCargo->folio);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM oa_cargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNrocargo($value){
		$sql = 'SELECT * FROM oa_cargo WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM oa_cargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodo($value){
		$sql = 'SELECT * FROM oa_cargo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM oa_cargo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNroficha($value){
		$sql = 'SELECT * FROM oa_cargo WHERE nroficha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHora($value){
		$sql = 'SELECT * FROM oa_cargo WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMinuto($value){
		$sql = 'SELECT * FROM oa_cargo WHERE minuto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoventa($value){
		$sql = 'SELECT * FROM oa_cargo WHERE tipoventa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipopago($value){
		$sql = 'SELECT * FROM oa_cargo WHERE tipopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdtoth($value){
		$sql = 'SELECT * FROM oa_cargo WHERE idtoth = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutfinanciador($value){
		$sql = 'SELECT * FROM oa_cargo WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoestadocargo($value){
		$sql = 'SELECT * FROM oa_cargo WHERE codigoestadocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoentidad($value){
		$sql = 'SELECT * FROM oa_cargo WHERE codigoentidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutoperador($value){
		$sql = 'SELECT * FROM oa_cargo WHERE rutoperador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySaldo($value){
		$sql = 'SELECT * FROM oa_cargo WHERE saldo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotalcargo($value){
		$sql = 'SELECT * FROM oa_cargo WHERE totalcargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutpaciente($value){
		$sql = 'SELECT * FROM oa_cargo WHERE rutpaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNrocargo($value){
		$sql = 'DELETE FROM oa_cargo WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM oa_cargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM oa_cargo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM oa_cargo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNroficha($value){
		$sql = 'DELETE FROM oa_cargo WHERE nroficha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHora($value){
		$sql = 'DELETE FROM oa_cargo WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMinuto($value){
		$sql = 'DELETE FROM oa_cargo WHERE minuto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoventa($value){
		$sql = 'DELETE FROM oa_cargo WHERE tipoventa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipopago($value){
		$sql = 'DELETE FROM oa_cargo WHERE tipopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdtoth($value){
		$sql = 'DELETE FROM oa_cargo WHERE idtoth = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutfinanciador($value){
		$sql = 'DELETE FROM oa_cargo WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoestadocargo($value){
		$sql = 'DELETE FROM oa_cargo WHERE codigoestadocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoentidad($value){
		$sql = 'DELETE FROM oa_cargo WHERE codigoentidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutoperador($value){
		$sql = 'DELETE FROM oa_cargo WHERE rutoperador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySaldo($value){
		$sql = 'DELETE FROM oa_cargo WHERE saldo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotalcargo($value){
		$sql = 'DELETE FROM oa_cargo WHERE totalcargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutpaciente($value){
		$sql = 'DELETE FROM oa_cargo WHERE rutpaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OaCargoMySql 
	 */
	protected function readRow($row){
		$oaCargo = new OaCargo();
		
		$oaCargo->folio = $row['folio'];
		$oaCargo->nrocargo = $row['nrocargo'];
		$oaCargo->codigoseccion = $row['codigoseccion'];
		$oaCargo->periodo = $row['periodo'];
		$oaCargo->fecha = $row['fecha'];
		$oaCargo->nroficha = $row['nroficha'];
		$oaCargo->hora = $row['hora'];
		$oaCargo->minuto = $row['minuto'];
		$oaCargo->tipoventa = $row['tipoventa'];
		$oaCargo->tipopago = $row['tipopago'];
		$oaCargo->idtoth = $row['idtoth'];
		$oaCargo->rutfinanciador = $row['rutfinanciador'];
		$oaCargo->codigoestadocargo = $row['codigoestadocargo'];
		$oaCargo->codigoentidad = $row['codigoentidad'];
		$oaCargo->rutoperador = $row['rutoperador'];
		$oaCargo->saldo = $row['saldo'];
		$oaCargo->totalcargo = $row['totalcargo'];
		$oaCargo->rutpaciente = $row['rutpaciente'];

		return $oaCargo;
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
	 * @return OaCargoMySql 
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