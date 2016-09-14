<?php
/**
 * Class that operate on table 'mae_ciudad'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class MaeCiudadMySqlDAO implements MaeCiudadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeCiudadMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_ciudad WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_ciudad';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_ciudad ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeCiudad primary key
 	 */
	public function delete($codigociudad){
		$sql = 'DELETE FROM mae_ciudad WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigociudad);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeCiudadMySql maeCiudad
 	 */
	public function insert($maeCiudad){
		$sql = 'INSERT INTO mae_ciudad (nombreciudad) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeCiudad->nombreciudad);

		$id = $this->executeInsert($sqlQuery);	
		$maeCiudad->codigociudad = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeCiudadMySql maeCiudad
 	 */
	public function update($maeCiudad){
		$sql = 'UPDATE mae_ciudad SET nombreciudad = ? WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeCiudad->nombreciudad);

		$sqlQuery->setNumber($maeCiudad->codigociudad);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_ciudad';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombreciudad($value){
		$sql = 'SELECT * FROM mae_ciudad WHERE nombreciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombreciudad($value){
		$sql = 'DELETE FROM mae_ciudad WHERE nombreciudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeCiudadMySql 
	 */
	protected function readRow($row){
		$maeCiudad = new MaeCiudad();
		
		$maeCiudad->codigociudad = $row['codigociudad'];
		$maeCiudad->nombreciudad = $row['nombreciudad'];

		return $maeCiudad;
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
	 * @return MaeCiudadMySql 
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