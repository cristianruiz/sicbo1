<?php
/**
 * Class that operate on table 'hm_honorarioconsolidado'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
class HmHonorarioconsolidadoMySqlDAO implements HmHonorarioconsolidadoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HmHonorarioconsolidadoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hm_honorarioconsolidado';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hm_honorarioconsolidado ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hmHonorarioconsolidado primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmHonorarioconsolidadoMySql hmHonorarioconsolidado
 	 */
	public function insert($hmHonorarioconsolidado){
		$sql = 'INSERT INTO hm_honorarioconsolidado (id_honorariosicbo, rutpersonatural) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmHonorarioconsolidado->idHonorariosicbo);
		$sqlQuery->setNumber($hmHonorarioconsolidado->rutpersonatural);

		$id = $this->executeInsert($sqlQuery);	
		$hmHonorarioconsolidado->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmHonorarioconsolidadoMySql hmHonorarioconsolidado
 	 */
	public function update($hmHonorarioconsolidado){
		$sql = 'UPDATE hm_honorarioconsolidado SET id_honorariosicbo = ?, rutpersonatural = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmHonorarioconsolidado->idHonorariosicbo);
		$sqlQuery->setNumber($hmHonorarioconsolidado->rutpersonatural);

		$sqlQuery->setNumber($hmHonorarioconsolidado->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hm_honorarioconsolidado';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdHonorariosicbo($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE id_honorariosicbo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutpersonatural($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE rutpersonatural = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdHonorariosicbo($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE id_honorariosicbo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutpersonatural($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE rutpersonatural = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HmHonorarioconsolidadoMySql 
	 */
	protected function readRow($row){
		$hmHonorarioconsolidado = new HmHonorarioconsolidado();
		
		$hmHonorarioconsolidado->id = $row['id'];
		$hmHonorarioconsolidado->idHonorariosicbo = $row['id_honorariosicbo'];
		$hmHonorarioconsolidado->rutpersonatural = $row['rutpersonatural'];

		return $hmHonorarioconsolidado;
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
	 * @return HmHonorarioconsolidadoMySql 
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