<?php
/**
 * Class that operate on table 'oa_cargo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-06-14 21:44
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
		$sql = 'INSERT INTO oa_cargo (codigoseccion, nrocargo, periodo, fecha, nroficha, hora, minuto, rutfinanciador, rutpaciente, tipopaciente, tipo, tipopago, idtoth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaCargo->codigoseccion);
		$sqlQuery->setNumber($oaCargo->nrocargo);
		$sqlQuery->setNumber($oaCargo->periodo);
		$sqlQuery->set($oaCargo->fecha);
		$sqlQuery->setNumber($oaCargo->nroficha);
		$sqlQuery->setNumber($oaCargo->hora);
		$sqlQuery->setNumber($oaCargo->minuto);
		$sqlQuery->setNumber($oaCargo->rutfinanciador);
		$sqlQuery->setNumber($oaCargo->rutpaciente);
		$sqlQuery->setNumber($oaCargo->tipopaciente);
		$sqlQuery->set($oaCargo->tipo);
		$sqlQuery->set($oaCargo->tipopago);
		$sqlQuery->setNumber($oaCargo->idtoth);

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
		$sql = 'UPDATE oa_cargo SET codigoseccion = ?, nrocargo = ?, periodo = ?, fecha = ?, nroficha = ?, hora = ?, minuto = ?, rutfinanciador = ?, rutpaciente = ?, tipopaciente = ?, tipo = ?, tipopago = ?, idtoth = ? WHERE folio = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaCargo->codigoseccion);
		$sqlQuery->setNumber($oaCargo->nrocargo);
		$sqlQuery->setNumber($oaCargo->periodo);
		$sqlQuery->set($oaCargo->fecha);
		$sqlQuery->setNumber($oaCargo->nroficha);
		$sqlQuery->setNumber($oaCargo->hora);
		$sqlQuery->setNumber($oaCargo->minuto);
		$sqlQuery->setNumber($oaCargo->rutfinanciador);
		$sqlQuery->setNumber($oaCargo->rutpaciente);
		$sqlQuery->setNumber($oaCargo->tipopaciente);
		$sqlQuery->set($oaCargo->tipo);
		$sqlQuery->set($oaCargo->tipopago);
		$sqlQuery->setNumber($oaCargo->idtoth);

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

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM oa_cargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNrocargo($value){
		$sql = 'SELECT * FROM oa_cargo WHERE nrocargo = ?';
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

	public function queryByRutfinanciador($value){
		$sql = 'SELECT * FROM oa_cargo WHERE rutfinanciador = ?';
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

	public function queryByTipopaciente($value){
		$sql = 'SELECT * FROM oa_cargo WHERE tipopaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM oa_cargo WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipopago($value){
		$sql = 'SELECT * FROM oa_cargo WHERE tipopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdtoth($value){
		$sql = 'SELECT * FROM oa_cargo WHERE idtoth = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM oa_cargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNrocargo($value){
		$sql = 'DELETE FROM oa_cargo WHERE nrocargo = ?';
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

	public function deleteByRutfinanciador($value){
		$sql = 'DELETE FROM oa_cargo WHERE rutfinanciador = ?';
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

	public function deleteByTipopaciente($value){
		$sql = 'DELETE FROM oa_cargo WHERE tipopaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM oa_cargo WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipopago($value){
		$sql = 'DELETE FROM oa_cargo WHERE tipopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdtoth($value){
		$sql = 'DELETE FROM oa_cargo WHERE idtoth = ?';
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
		$oaCargo->codigoseccion = $row['codigoseccion'];
		$oaCargo->nrocargo = $row['nrocargo'];
		$oaCargo->periodo = $row['periodo'];
		$oaCargo->fecha = $row['fecha'];
		$oaCargo->nroficha = $row['nroficha'];
		$oaCargo->hora = $row['hora'];
		$oaCargo->minuto = $row['minuto'];
		$oaCargo->rutfinanciador = $row['rutfinanciador'];
		$oaCargo->rutpaciente = $row['rutpaciente'];
		$oaCargo->tipopaciente = $row['tipopaciente'];
		$oaCargo->tipo = $row['tipo'];
		$oaCargo->tipopago = $row['tipopago'];
		$oaCargo->idtoth = $row['idtoth'];

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