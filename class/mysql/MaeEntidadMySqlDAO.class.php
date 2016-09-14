<?php
/**
 * Class that operate on table 'mae_entidad'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class MaeEntidadMySqlDAO implements MaeEntidadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeEntidadMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_entidad WHERE codigoentidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_entidad';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_entidad ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeEntidad primary key
 	 */
	public function delete($codigoentidad){
		$sql = 'DELETE FROM mae_entidad WHERE codigoentidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigoentidad);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeEntidadMySql maeEntidad
 	 */
	public function insert($maeEntidad){
		$sql = 'INSERT INTO mae_entidad (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeEntidad->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$maeEntidad->codigoentidad = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeEntidadMySql maeEntidad
 	 */
	public function update($maeEntidad){
		$sql = 'UPDATE mae_entidad SET descripcion = ? WHERE codigoentidad = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeEntidad->descripcion);

		$sqlQuery->setNumber($maeEntidad->codigoentidad);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_entidad';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_entidad WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_entidad WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeEntidadMySql 
	 */
	protected function readRow($row){
		$maeEntidad = new MaeEntidad();
		
		$maeEntidad->codigoentidad = $row['codigoentidad'];
		$maeEntidad->descripcion = $row['descripcion'];

		return $maeEntidad;
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
	 * @return MaeEntidadMySql 
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