<?php
/**
 * Class that operate on table 'hm_homocodigosformulas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class HmHomocodigosformulasMySqlDAO implements HmHomocodigosformulasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HmHomocodigosformulasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hm_homocodigosformulas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hm_homocodigosformulas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hm_homocodigosformulas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hmHomocodigosformula primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM hm_homocodigosformulas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmHomocodigosformulasMySql hmHomocodigosformula
 	 */
	public function insert($hmHomocodigosformula){
		$sql = 'INSERT INTO hm_homocodigosformulas (codigoservicio, descripcionsicbo, formula) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmHomocodigosformula->codigoservicio);
		$sqlQuery->set($hmHomocodigosformula->descripcionsicbo);
		$sqlQuery->setNumber($hmHomocodigosformula->formula);

		$id = $this->executeInsert($sqlQuery);	
		$hmHomocodigosformula->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmHomocodigosformulasMySql hmHomocodigosformula
 	 */
	public function update($hmHomocodigosformula){
		$sql = 'UPDATE hm_homocodigosformulas SET codigoservicio = ?, descripcionsicbo = ?, formula = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmHomocodigosformula->codigoservicio);
		$sqlQuery->set($hmHomocodigosformula->descripcionsicbo);
		$sqlQuery->setNumber($hmHomocodigosformula->formula);

		$sqlQuery->setNumber($hmHomocodigosformula->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hm_homocodigosformulas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigoservicio($value){
		$sql = 'SELECT * FROM hm_homocodigosformulas WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcionsicbo($value){
		$sql = 'SELECT * FROM hm_homocodigosformulas WHERE descripcionsicbo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormula($value){
		$sql = 'SELECT * FROM hm_homocodigosformulas WHERE formula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigoservicio($value){
		$sql = 'DELETE FROM hm_homocodigosformulas WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcionsicbo($value){
		$sql = 'DELETE FROM hm_homocodigosformulas WHERE descripcionsicbo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormula($value){
		$sql = 'DELETE FROM hm_homocodigosformulas WHERE formula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HmHomocodigosformulasMySql 
	 */
	protected function readRow($row){
		$hmHomocodigosformula = new HmHomocodigosformula();
		
		$hmHomocodigosformula->id = $row['id'];
		$hmHomocodigosformula->codigoservicio = $row['codigoservicio'];
		$hmHomocodigosformula->descripcionsicbo = $row['descripcionsicbo'];
		$hmHomocodigosformula->formula = $row['formula'];

		return $hmHomocodigosformula;
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
	 * @return HmHomocodigosformulasMySql 
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