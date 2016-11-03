<?php
/**
 * Class that operate on table 'tar_tipopaquete'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
class TarTipopaqueteMySqlDAO implements TarTipopaqueteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TarTipopaqueteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tar_tipopaquete WHERE idtipopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tar_tipopaquete';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tar_tipopaquete ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tarTipopaquete primary key
 	 */
	public function delete($idtipopaquete){
		$sql = 'DELETE FROM tar_tipopaquete WHERE idtipopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idtipopaquete);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarTipopaqueteMySql tarTipopaquete
 	 */
	public function insert($tarTipopaquete){
		$sql = 'INSERT INTO tar_tipopaquete (descripciontipo) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tarTipopaquete->descripciontipo);

		$id = $this->executeInsert($sqlQuery);	
		$tarTipopaquete->idtipopaquete = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarTipopaqueteMySql tarTipopaquete
 	 */
	public function update($tarTipopaquete){
		$sql = 'UPDATE tar_tipopaquete SET descripciontipo = ? WHERE idtipopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tarTipopaquete->descripciontipo);

		$sqlQuery->setNumber($tarTipopaquete->idtipopaquete);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tar_tipopaquete';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripciontipo($value){
		$sql = 'SELECT * FROM tar_tipopaquete WHERE descripciontipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripciontipo($value){
		$sql = 'DELETE FROM tar_tipopaquete WHERE descripciontipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TarTipopaqueteMySql 
	 */
	protected function readRow($row){
		$tarTipopaquete = new TarTipopaquete();
		
		$tarTipopaquete->idtipopaquete = $row['idtipopaquete'];
		$tarTipopaquete->descripciontipo = $row['descripciontipo'];

		return $tarTipopaquete;
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
	 * @return TarTipopaqueteMySql 
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