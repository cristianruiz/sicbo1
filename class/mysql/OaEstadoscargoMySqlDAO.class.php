<?php
/**
 * Class that operate on table 'oa_estadoscargo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-07-04 22:59
 */
class OaEstadoscargoMySqlDAO implements OaEstadoscargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OaEstadoscargoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM oa_estadoscargo WHERE codigoestado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM oa_estadoscargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM oa_estadoscargo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param oaEstadoscargo primary key
 	 */
	public function delete($codigoestado){
		$sql = 'DELETE FROM oa_estadoscargo WHERE codigoestado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigoestado);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaEstadoscargoMySql oaEstadoscargo
 	 */
	public function insert($oaEstadoscargo){
		$sql = 'INSERT INTO oa_estadoscargo (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($oaEstadoscargo->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$oaEstadoscargo->codigoestado = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaEstadoscargoMySql oaEstadoscargo
 	 */
	public function update($oaEstadoscargo){
		$sql = 'UPDATE oa_estadoscargo SET descripcion = ? WHERE codigoestado = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($oaEstadoscargo->descripcion);

		$sqlQuery->setNumber($oaEstadoscargo->codigoestado);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM oa_estadoscargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM oa_estadoscargo WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM oa_estadoscargo WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OaEstadoscargoMySql 
	 */
	protected function readRow($row){
		$oaEstadoscargo = new OaEstadoscargo();
		
		$oaEstadoscargo->codigoestado = $row['codigoestado'];
		$oaEstadoscargo->descripcion = $row['descripcion'];

		return $oaEstadoscargo;
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
	 * @return OaEstadoscargoMySql 
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