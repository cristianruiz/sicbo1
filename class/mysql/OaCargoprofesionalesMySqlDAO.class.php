<?php
/**
 * Class that operate on table 'oa_cargoprofesionales'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
class OaCargoprofesionalesMySqlDAO implements OaCargoprofesionalesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OaCargoprofesionalesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM oa_cargoprofesionales WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM oa_cargoprofesionales';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM oa_cargoprofesionales ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param oaCargoprofesionale primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM oa_cargoprofesionales WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaCargoprofesionalesMySql oaCargoprofesionale
 	 */
	public function insert($oaCargoprofesionale){
		$sql = 'INSERT INTO oa_cargoprofesionales (foliocargo, rutmedico, observacion, codigofuncionmedico) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaCargoprofesionale->foliocargo);
		$sqlQuery->setNumber($oaCargoprofesionale->rutmedico);
		$sqlQuery->set($oaCargoprofesionale->observacion);
		$sqlQuery->setNumber($oaCargoprofesionale->codigofuncionmedico);

		$id = $this->executeInsert($sqlQuery);	
		$oaCargoprofesionale->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaCargoprofesionalesMySql oaCargoprofesionale
 	 */
	public function update($oaCargoprofesionale){
		$sql = 'UPDATE oa_cargoprofesionales SET foliocargo = ?, rutmedico = ?, observacion = ?, codigofuncionmedico = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oaCargoprofesionale->foliocargo);
		$sqlQuery->setNumber($oaCargoprofesionale->rutmedico);
		$sqlQuery->set($oaCargoprofesionale->observacion);
		$sqlQuery->setNumber($oaCargoprofesionale->codigofuncionmedico);

		$sqlQuery->setNumber($oaCargoprofesionale->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM oa_cargoprofesionales';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFoliocargo($value){
		$sql = 'SELECT * FROM oa_cargoprofesionales WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutmedico($value){
		$sql = 'SELECT * FROM oa_cargoprofesionales WHERE rutmedico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservacion($value){
		$sql = 'SELECT * FROM oa_cargoprofesionales WHERE observacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigofuncionmedico($value){
		$sql = 'SELECT * FROM oa_cargoprofesionales WHERE codigofuncionmedico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFoliocargo($value){
		$sql = 'DELETE FROM oa_cargoprofesionales WHERE foliocargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutmedico($value){
		$sql = 'DELETE FROM oa_cargoprofesionales WHERE rutmedico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservacion($value){
		$sql = 'DELETE FROM oa_cargoprofesionales WHERE observacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigofuncionmedico($value){
		$sql = 'DELETE FROM oa_cargoprofesionales WHERE codigofuncionmedico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OaCargoprofesionalesMySql 
	 */
	protected function readRow($row){
		$oaCargoprofesionale = new OaCargoprofesionale();
		
		$oaCargoprofesionale->foliocargo = $row['foliocargo'];
		$oaCargoprofesionale->rutmedico = $row['rutmedico'];
		$oaCargoprofesionale->observacion = $row['observacion'];
		$oaCargoprofesionale->codigofuncionmedico = $row['codigofuncionmedico'];
		$oaCargoprofesionale->id = $row['id'];

		return $oaCargoprofesionale;
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
	 * @return OaCargoprofesionalesMySql 
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