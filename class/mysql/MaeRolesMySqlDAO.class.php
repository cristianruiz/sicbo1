<?php
/**
 * Class that operate on table 'mae_roles'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 20:53
 */
class MaeRolesMySqlDAO implements MaeRolesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeRolesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_roles WHERE codigofuncion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_roles';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_roles ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeRole primary key
 	 */
	public function delete($codigofuncion){
		$sql = 'DELETE FROM mae_roles WHERE codigofuncion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigofuncion);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeRolesMySql maeRole
 	 */
	public function insert($maeRole){
		$sql = 'INSERT INTO mae_roles (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeRole->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$maeRole->codigofuncion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeRolesMySql maeRole
 	 */
	public function update($maeRole){
		$sql = 'UPDATE mae_roles SET descripcion = ? WHERE codigofuncion = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeRole->descripcion);

		$sqlQuery->setNumber($maeRole->codigofuncion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_roles';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_roles WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_roles WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeRolesMySql 
	 */
	protected function readRow($row){
		$maeRole = new MaeRole();
		
		$maeRole->codigofuncion = $row['codigofuncion'];
		$maeRole->descripcion = $row['descripcion'];

		return $maeRole;
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
	 * @return MaeRolesMySql 
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