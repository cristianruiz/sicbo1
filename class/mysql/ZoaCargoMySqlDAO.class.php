<?php
/**
 * Class that operate on table 'zoa_cargo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
class ZoaCargoMySqlDAO implements ZoaCargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ZoaCargoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM zoa_cargo WHERE folio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM zoa_cargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM zoa_cargo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param zoaCargo primary key
 	 */
	public function delete($folio){
		$sql = 'DELETE FROM zoa_cargo WHERE folio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($folio);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ZoaCargoMySql zoaCargo
 	 */
	public function insert($zoaCargo){
		$sql = 'INSERT INTO zoa_cargo (codigoseccion, nrocargo, periodo, fecha, nroficha, hora, minuto, rutfinanciador, rutpaciente, tipopaciente, tipo, tipopago, idtoth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($zoaCargo->codigoseccion);
		$sqlQuery->setNumber($zoaCargo->nrocargo);
		$sqlQuery->setNumber($zoaCargo->periodo);
		$sqlQuery->set($zoaCargo->fecha);
		$sqlQuery->setNumber($zoaCargo->nroficha);
		$sqlQuery->setNumber($zoaCargo->hora);
		$sqlQuery->setNumber($zoaCargo->minuto);
		$sqlQuery->setNumber($zoaCargo->rutfinanciador);
		$sqlQuery->setNumber($zoaCargo->rutpaciente);
		$sqlQuery->setNumber($zoaCargo->tipopaciente);
		$sqlQuery->set($zoaCargo->tipo);
		$sqlQuery->set($zoaCargo->tipopago);
		$sqlQuery->setNumber($zoaCargo->idtoth);

		$id = $this->executeInsert($sqlQuery);	
		$zoaCargo->folio = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ZoaCargoMySql zoaCargo
 	 */
	public function update($zoaCargo){
		$sql = 'UPDATE zoa_cargo SET codigoseccion = ?, nrocargo = ?, periodo = ?, fecha = ?, nroficha = ?, hora = ?, minuto = ?, rutfinanciador = ?, rutpaciente = ?, tipopaciente = ?, tipo = ?, tipopago = ?, idtoth = ? WHERE folio = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($zoaCargo->codigoseccion);
		$sqlQuery->setNumber($zoaCargo->nrocargo);
		$sqlQuery->setNumber($zoaCargo->periodo);
		$sqlQuery->set($zoaCargo->fecha);
		$sqlQuery->setNumber($zoaCargo->nroficha);
		$sqlQuery->setNumber($zoaCargo->hora);
		$sqlQuery->setNumber($zoaCargo->minuto);
		$sqlQuery->setNumber($zoaCargo->rutfinanciador);
		$sqlQuery->setNumber($zoaCargo->rutpaciente);
		$sqlQuery->setNumber($zoaCargo->tipopaciente);
		$sqlQuery->set($zoaCargo->tipo);
		$sqlQuery->set($zoaCargo->tipopago);
		$sqlQuery->setNumber($zoaCargo->idtoth);

		$sqlQuery->setNumber($zoaCargo->folio);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM zoa_cargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNrocargo($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodo($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNroficha($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE nroficha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHora($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMinuto($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE minuto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutfinanciador($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutpaciente($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE rutpaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipopaciente($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE tipopaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipopago($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE tipopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdtoth($value){
		$sql = 'SELECT * FROM zoa_cargo WHERE idtoth = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM zoa_cargo WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNrocargo($value){
		$sql = 'DELETE FROM zoa_cargo WHERE nrocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM zoa_cargo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM zoa_cargo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNroficha($value){
		$sql = 'DELETE FROM zoa_cargo WHERE nroficha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHora($value){
		$sql = 'DELETE FROM zoa_cargo WHERE hora = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMinuto($value){
		$sql = 'DELETE FROM zoa_cargo WHERE minuto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutfinanciador($value){
		$sql = 'DELETE FROM zoa_cargo WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutpaciente($value){
		$sql = 'DELETE FROM zoa_cargo WHERE rutpaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipopaciente($value){
		$sql = 'DELETE FROM zoa_cargo WHERE tipopaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM zoa_cargo WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipopago($value){
		$sql = 'DELETE FROM zoa_cargo WHERE tipopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdtoth($value){
		$sql = 'DELETE FROM zoa_cargo WHERE idtoth = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ZoaCargoMySql 
	 */
	protected function readRow($row){
		$zoaCargo = new ZoaCargo();
		
		$zoaCargo->folio = $row['folio'];
		$zoaCargo->codigoseccion = $row['codigoseccion'];
		$zoaCargo->nrocargo = $row['nrocargo'];
		$zoaCargo->periodo = $row['periodo'];
		$zoaCargo->fecha = $row['fecha'];
		$zoaCargo->nroficha = $row['nroficha'];
		$zoaCargo->hora = $row['hora'];
		$zoaCargo->minuto = $row['minuto'];
		$zoaCargo->rutfinanciador = $row['rutfinanciador'];
		$zoaCargo->rutpaciente = $row['rutpaciente'];
		$zoaCargo->tipopaciente = $row['tipopaciente'];
		$zoaCargo->tipo = $row['tipo'];
		$zoaCargo->tipopago = $row['tipopago'];
		$zoaCargo->idtoth = $row['idtoth'];

		return $zoaCargo;
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
	 * @return ZoaCargoMySql 
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