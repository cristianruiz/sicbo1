<?php
/**
 * Class that operate on table 'mae_financiador'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
class MaeFinanciadorMySqlDAO implements MaeFinanciadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeFinanciadorMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_financiador WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_financiador';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_financiador ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeFinanciador primary key
 	 */
	public function delete($rutfinanciador){
		$sql = 'DELETE FROM mae_financiador WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($rutfinanciador);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeFinanciadorMySql maeFinanciador
 	 */
	public function insert($maeFinanciador){
		$sql = 'INSERT INTO mae_financiador (rutver, nombrefinanciador, direccion, telefono, codigociudad, razonsocial) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeFinanciador->rutver);
		$sqlQuery->set($maeFinanciador->nombrefinanciador);
		$sqlQuery->set($maeFinanciador->direccion);
		$sqlQuery->set($maeFinanciador->telefono);
		$sqlQuery->setNumber($maeFinanciador->codigociudad);
		$sqlQuery->set($maeFinanciador->razonsocial);

		$id = $this->executeInsert($sqlQuery);	
		$maeFinanciador->rutfinanciador = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeFinanciadorMySql maeFinanciador
 	 */
	public function update($maeFinanciador){
		$sql = 'UPDATE mae_financiador SET rutver = ?, nombrefinanciador = ?, direccion = ?, telefono = ?, codigociudad = ?, razonsocial = ? WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeFinanciador->rutver);
		$sqlQuery->set($maeFinanciador->nombrefinanciador);
		$sqlQuery->set($maeFinanciador->direccion);
		$sqlQuery->set($maeFinanciador->telefono);
		$sqlQuery->setNumber($maeFinanciador->codigociudad);
		$sqlQuery->set($maeFinanciador->razonsocial);

		$sqlQuery->setNumber($maeFinanciador->rutfinanciador);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_financiador';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRutver($value){
		$sql = 'SELECT * FROM mae_financiador WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombrefinanciador($value){
		$sql = 'SELECT * FROM mae_financiador WHERE nombrefinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM mae_financiador WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM mae_financiador WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigociudad($value){
		$sql = 'SELECT * FROM mae_financiador WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRazonsocial($value){
		$sql = 'SELECT * FROM mae_financiador WHERE razonsocial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRutver($value){
		$sql = 'DELETE FROM mae_financiador WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombrefinanciador($value){
		$sql = 'DELETE FROM mae_financiador WHERE nombrefinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM mae_financiador WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM mae_financiador WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigociudad($value){
		$sql = 'DELETE FROM mae_financiador WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRazonsocial($value){
		$sql = 'DELETE FROM mae_financiador WHERE razonsocial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeFinanciadorMySql 
	 */
	protected function readRow($row){
		$maeFinanciador = new MaeFinanciador();
		
		$maeFinanciador->rutfinanciador = $row['rutfinanciador'];
		$maeFinanciador->rutver = $row['rutver'];
		$maeFinanciador->nombrefinanciador = $row['nombrefinanciador'];
		$maeFinanciador->direccion = $row['direccion'];
		$maeFinanciador->telefono = $row['telefono'];
		$maeFinanciador->codigociudad = $row['codigociudad'];
		$maeFinanciador->razonsocial = $row['razonsocial'];

		return $maeFinanciador;
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
	 * @return MaeFinanciadorMySql 
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