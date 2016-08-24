<?php
/**
 * Class that operate on table 'tar_subgrupopaquete'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 17:04
 */
class TarSubgrupopaqueteMySqlDAO implements TarSubgrupopaqueteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TarSubgrupopaqueteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tar_subgrupopaquete WHERE idsubgrupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tar_subgrupopaquete';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tar_subgrupopaquete ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tarSubgrupopaquete primary key
 	 */
	public function delete($idsubgrupo){
		$sql = 'DELETE FROM tar_subgrupopaquete WHERE idsubgrupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idsubgrupo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarSubgrupopaqueteMySql tarSubgrupopaquete
 	 */
	public function insert($tarSubgrupopaquete){
		$sql = 'INSERT INTO tar_subgrupopaquete (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tarSubgrupopaquete->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$tarSubgrupopaquete->idsubgrupo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarSubgrupopaqueteMySql tarSubgrupopaquete
 	 */
	public function update($tarSubgrupopaquete){
		$sql = 'UPDATE tar_subgrupopaquete SET descripcion = ? WHERE idsubgrupo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tarSubgrupopaquete->descripcion);

		$sqlQuery->setNumber($tarSubgrupopaquete->idsubgrupo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tar_subgrupopaquete';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM tar_subgrupopaquete WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM tar_subgrupopaquete WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TarSubgrupopaqueteMySql 
	 */
	protected function readRow($row){
		$tarSubgrupopaquete = new TarSubgrupopaquete();
		
		$tarSubgrupopaquete->idsubgrupo = $row['idsubgrupo'];
		$tarSubgrupopaquete->descripcion = $row['descripcion'];

		return $tarSubgrupopaquete;
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
	 * @return TarSubgrupopaqueteMySql 
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