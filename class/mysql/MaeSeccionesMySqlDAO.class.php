<?php
/**
 * Class that operate on table 'mae_secciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-07-04 22:59
 */
class MaeSeccionesMySqlDAO implements MaeSeccionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeSeccionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_secciones WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_secciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_secciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeSeccione primary key
 	 */
	public function delete($codigoseccion){
		$sql = 'DELETE FROM mae_secciones WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigoseccion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeSeccionesMySql maeSeccione
 	 */
	public function insert($maeSeccione){
		$sql = 'INSERT INTO mae_secciones (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeSeccione->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$maeSeccione->codigoseccion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeSeccionesMySql maeSeccione
 	 */
	public function update($maeSeccione){
		$sql = 'UPDATE mae_secciones SET descripcion = ? WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeSeccione->descripcion);

		$sqlQuery->setNumber($maeSeccione->codigoseccion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_secciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_secciones WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_secciones WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeSeccionesMySql 
	 */
	protected function readRow($row){
		$maeSeccione = new MaeSeccione();
		
		$maeSeccione->codigoseccion = $row['codigoseccion'];
		$maeSeccione->descripcion = $row['descripcion'];

		return $maeSeccione;
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
	 * @return MaeSeccionesMySql 
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