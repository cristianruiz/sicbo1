<?php
/**
 * Class that operate on table 'mae_departamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 17:01
 */
class MaeDepartamentoMySqlDAO implements MaeDepartamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeDepartamentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_departamento WHERE iddepartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_departamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_departamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeDepartamento primary key
 	 */
	public function delete($iddepartamento){
		$sql = 'DELETE FROM mae_departamento WHERE iddepartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddepartamento);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeDepartamentoMySql maeDepartamento
 	 */
	public function insert($maeDepartamento){
		$sql = 'INSERT INTO mae_departamento (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeDepartamento->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$maeDepartamento->iddepartamento = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeDepartamentoMySql maeDepartamento
 	 */
	public function update($maeDepartamento){
		$sql = 'UPDATE mae_departamento SET descripcion = ? WHERE iddepartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeDepartamento->descripcion);

		$sqlQuery->setNumber($maeDepartamento->iddepartamento);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_departamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_departamento WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_departamento WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeDepartamentoMySql 
	 */
	protected function readRow($row){
		$maeDepartamento = new MaeDepartamento();
		
		$maeDepartamento->iddepartamento = $row['iddepartamento'];
		$maeDepartamento->descripcion = $row['descripcion'];

		return $maeDepartamento;
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
	 * @return MaeDepartamentoMySql 
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