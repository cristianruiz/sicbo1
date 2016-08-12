<?php
/**
 * Class that operate on table 'mae_cargos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
class MaeCargosMySqlDAO implements MaeCargosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeCargosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_cargos WHERE idcargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_cargos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_cargos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeCargo primary key
 	 */
	public function delete($idcargo){
		$sql = 'DELETE FROM mae_cargos WHERE idcargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idcargo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeCargosMySql maeCargo
 	 */
	public function insert($maeCargo){
		$sql = 'INSERT INTO mae_cargos (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeCargo->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$maeCargo->idcargo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeCargosMySql maeCargo
 	 */
	public function update($maeCargo){
		$sql = 'UPDATE mae_cargos SET descripcion = ? WHERE idcargo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeCargo->descripcion);

		$sqlQuery->setNumber($maeCargo->idcargo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_cargos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_cargos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_cargos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeCargosMySql 
	 */
	protected function readRow($row){
		$maeCargo = new MaeCargo();
		
		$maeCargo->idcargo = $row['idcargo'];
		$maeCargo->descripcion = $row['descripcion'];

		return $maeCargo;
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
	 * @return MaeCargosMySql 
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