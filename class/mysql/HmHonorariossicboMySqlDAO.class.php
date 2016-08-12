<?php
/**
 * Class that operate on table 'hm_honorariossicbo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 17:01
 */
class HmHonorariossicboMySqlDAO implements HmHonorariossicboDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HmHonorariossicboMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hm_honorariossicbo WHERE idhonorario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hm_honorariossicbo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hm_honorariossicbo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hmHonorariossicbo primary key
 	 */
	public function delete($idhonorario){
		$sql = 'DELETE FROM hm_honorariossicbo WHERE idhonorario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idhonorario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmHonorariossicboMySql hmHonorariossicbo
 	 */
	public function insert($hmHonorariossicbo){
		$sql = 'INSERT INTO hm_honorariossicbo (fecha, usuario, periodo, estado) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($hmHonorariossicbo->fecha);
		$sqlQuery->set($hmHonorariossicbo->usuario);
		$sqlQuery->setNumber($hmHonorariossicbo->periodo);
		$sqlQuery->setNumber($hmHonorariossicbo->estado);

		$id = $this->executeInsert($sqlQuery);	
		$hmHonorariossicbo->idhonorario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmHonorariossicboMySql hmHonorariossicbo
 	 */
	public function update($hmHonorariossicbo){
		$sql = 'UPDATE hm_honorariossicbo SET fecha = ?, usuario = ?, periodo = ?, estado = ? WHERE idhonorario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($hmHonorariossicbo->fecha);
		$sqlQuery->set($hmHonorariossicbo->usuario);
		$sqlQuery->setNumber($hmHonorariossicbo->periodo);
		$sqlQuery->setNumber($hmHonorariossicbo->estado);

		$sqlQuery->setNumber($hmHonorariossicbo->idhonorario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hm_honorariossicbo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM hm_honorariossicbo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuario($value){
		$sql = 'SELECT * FROM hm_honorariossicbo WHERE usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPeriodo($value){
		error_log("kiii");
		$sql = 'SELECT * FROM hm_honorariossicbo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM hm_honorariossicbo WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFecha($value){
		$sql = 'DELETE FROM hm_honorariossicbo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuario($value){
		$sql = 'DELETE FROM hm_honorariossicbo WHERE usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM hm_honorariossicbo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM hm_honorariossicbo WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HmHonorariossicboMySql 
	 */
	protected function readRow($row){
		$hmHonorariossicbo = new HmHonorariossicbo();
		
		$hmHonorariossicbo->idhonorario = $row['idhonorario'];
		$hmHonorariossicbo->fecha = $row['fecha'];
		$hmHonorariossicbo->usuario = $row['usuario'];
		$hmHonorariossicbo->periodo = $row['periodo'];
		$hmHonorariossicbo->estado = $row['estado'];

		return $hmHonorariossicbo;
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
	 * @return HmHonorariossicboMySql 
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