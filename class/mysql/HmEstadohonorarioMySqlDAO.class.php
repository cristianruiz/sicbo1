<?php
/**
 * Class that operate on table 'hm_estadohonorario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class HmEstadohonorarioMySqlDAO implements HmEstadohonorarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HmEstadohonorarioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hm_estadohonorario WHERE idestado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hm_estadohonorario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hm_estadohonorario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hmEstadohonorario primary key
 	 */
	public function delete($idestado){
		$sql = 'DELETE FROM hm_estadohonorario WHERE idestado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idestado);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmEstadohonorarioMySql hmEstadohonorario
 	 */
	public function insert($hmEstadohonorario){
		$sql = 'INSERT INTO hm_estadohonorario (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($hmEstadohonorario->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$hmEstadohonorario->idestado = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmEstadohonorarioMySql hmEstadohonorario
 	 */
	public function update($hmEstadohonorario){
		$sql = 'UPDATE hm_estadohonorario SET descripcion = ? WHERE idestado = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($hmEstadohonorario->descripcion);

		$sqlQuery->setNumber($hmEstadohonorario->idestado);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hm_estadohonorario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM hm_estadohonorario WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM hm_estadohonorario WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HmEstadohonorarioMySql 
	 */
	protected function readRow($row){
		$hmEstadohonorario = new HmEstadohonorario();
		
		$hmEstadohonorario->idestado = $row['idestado'];
		$hmEstadohonorario->descripcion = $row['descripcion'];

		return $hmEstadohonorario;
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
	 * @return HmEstadohonorarioMySql 
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