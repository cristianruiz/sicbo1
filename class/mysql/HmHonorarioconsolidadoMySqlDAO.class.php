<?php
/**
 * Class that operate on table 'hm_honorarioconsolidado'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
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
		$sql = 'INSERT INTO hm_honorarioconsolidado (idhonorariosicbo, rutmed, formula, tiporeceptor, valor, rutrazonsocial, nombrerazonsocial) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmHonorarioconsolidado->idhonorariosicbo);
		$sqlQuery->setNumber($hmHonorarioconsolidado->rutmed);
		$sqlQuery->setNumber($hmHonorarioconsolidado->formula);
		$sqlQuery->setNumber($hmHonorarioconsolidado->tiporeceptor);
		$sqlQuery->setNumber($hmHonorarioconsolidado->valor);
		$sqlQuery->setNumber($hmHonorarioconsolidado->rutrazonsocial);
		$sqlQuery->set($hmHonorarioconsolidado->nombrerazonsocial);

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
		$sql = 'UPDATE hm_honorarioconsolidado SET idhonorariosicbo = ?, rutmed = ?, formula = ?, tiporeceptor = ?, valor = ?, rutrazonsocial = ?, nombrerazonsocial = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmHonorarioconsolidado->idhonorariosicbo);
		$sqlQuery->setNumber($hmHonorarioconsolidado->rutmed);
		$sqlQuery->setNumber($hmHonorarioconsolidado->formula);
		$sqlQuery->setNumber($hmHonorarioconsolidado->tiporeceptor);
		$sqlQuery->setNumber($hmHonorarioconsolidado->valor);
		$sqlQuery->setNumber($hmHonorarioconsolidado->rutrazonsocial);
		$sqlQuery->set($hmHonorarioconsolidado->nombrerazonsocial);

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

	public function queryByIdhonorariosicbo($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE idhonorariosicbo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutmed($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE rutmed = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFormula($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE formula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiporeceptor($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE tiporeceptor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutrazonsocial($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE rutrazonsocial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombrerazonsocial($value){
		$sql = 'SELECT * FROM hm_honorarioconsolidado WHERE nombrerazonsocial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdhonorariosicbo($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE idhonorariosicbo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutmed($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE rutmed = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFormula($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE formula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiporeceptor($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE tiporeceptor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutrazonsocial($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE rutrazonsocial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombrerazonsocial($value){
		$sql = 'DELETE FROM hm_honorarioconsolidado WHERE nombrerazonsocial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
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
		$hmHonorarioconsolidado->idhonorariosicbo = $row['idhonorariosicbo'];
		$hmHonorarioconsolidado->rutmed = $row['rutmed'];
		$hmHonorarioconsolidado->formula = $row['formula'];
		$hmHonorarioconsolidado->tiporeceptor = $row['tiporeceptor'];
		$hmHonorarioconsolidado->valor = $row['valor'];
		$hmHonorarioconsolidado->rutrazonsocial = $row['rutrazonsocial'];
		$hmHonorarioconsolidado->nombrerazonsocial = $row['nombrerazonsocial'];

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