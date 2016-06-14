<?php
/**
 * Class that operate on table 'oa_servicios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-06-14 21:44
 */
class OaServiciosMySqlDAO implements OaServiciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OaServiciosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM oa_servicios WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM oa_servicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM oa_servicios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param oaServicio primary key
 	 */
	public function delete($codigoservicio){
		$sql = 'DELETE FROM oa_servicios WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigoservicio);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaServiciosMySql oaServicio
 	 */
	public function insert($oaServicio){
		$sql = 'INSERT INTO oa_servicios (grupo, descripcion, codigoseccion, vigente) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaServicio->grupo);
		$sqlQuery->set($oaServicio->descripcion);
		$sqlQuery->setNumber($oaServicio->codigoseccion);
		$sqlQuery->setNumber($oaServicio->vigente);

		$id = $this->executeInsert($sqlQuery);	
		$oaServicio->codigoservicio = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaServiciosMySql oaServicio
 	 */
	public function update($oaServicio){
		$sql = 'UPDATE oa_servicios SET grupo = ?, descripcion = ?, codigoseccion = ?, vigente = ? WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaServicio->grupo);
		$sqlQuery->set($oaServicio->descripcion);
		$sqlQuery->setNumber($oaServicio->codigoseccion);
		$sqlQuery->setNumber($oaServicio->vigente);

		$sqlQuery->setNumber($oaServicio->codigoservicio);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM oa_servicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGrupo($value){
		$sql = 'SELECT * FROM oa_servicios WHERE grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM oa_servicios WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM oa_servicios WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM oa_servicios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGrupo($value){
		$sql = 'DELETE FROM oa_servicios WHERE grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM oa_servicios WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM oa_servicios WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM oa_servicios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OaServiciosMySql 
	 */
	protected function readRow($row){
		$oaServicio = new OaServicio();
		
		$oaServicio->codigoservicio = $row['codigoservicio'];
		$oaServicio->grupo = $row['grupo'];
		$oaServicio->descripcion = $row['descripcion'];
		$oaServicio->codigoseccion = $row['codigoseccion'];
		$oaServicio->vigente = $row['vigente'];

		return $oaServicio;
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
	 * @return OaServiciosMySql 
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