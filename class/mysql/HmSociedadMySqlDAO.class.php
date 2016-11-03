<?php
/**
 * Class that operate on table 'hm_sociedad'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
class HmSociedadMySqlDAO implements HmSociedadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HmSociedadMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hm_sociedad WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hm_sociedad';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hm_sociedad ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hmSociedad primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM hm_sociedad WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmSociedadMySql hmSociedad
 	 */
	public function insert($hmSociedad){
		$sql = 'INSERT INTO hm_sociedad (rutsociedad, rutver, razonsocial, vigente) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmSociedad->rutsociedad);
		$sqlQuery->set($hmSociedad->rutver);
		$sqlQuery->set($hmSociedad->razonsocial);
		$sqlQuery->set($hmSociedad->vigente);

		$id = $this->executeInsert($sqlQuery);	
		$hmSociedad->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmSociedadMySql hmSociedad
 	 */
	public function update($hmSociedad){
		$sql = 'UPDATE hm_sociedad SET rutsociedad = ?, rutver = ?, razonsocial = ?, vigente = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmSociedad->rutsociedad);
		$sqlQuery->set($hmSociedad->rutver);
		$sqlQuery->set($hmSociedad->razonsocial);
		$sqlQuery->set($hmSociedad->vigente);

		$sqlQuery->setNumber($hmSociedad->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hm_sociedad';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRutsociedad($value){
		$sql = 'SELECT * FROM hm_sociedad WHERE rutsociedad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutver($value){
		$sql = 'SELECT * FROM hm_sociedad WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRazonsocial($value){
		$sql = 'SELECT * FROM hm_sociedad WHERE razonsocial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM hm_sociedad WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRutsociedad($value){
		$sql = 'DELETE FROM hm_sociedad WHERE rutsociedad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutver($value){
		$sql = 'DELETE FROM hm_sociedad WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRazonsocial($value){
		$sql = 'DELETE FROM hm_sociedad WHERE razonsocial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM hm_sociedad WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HmSociedadMySql 
	 */
	protected function readRow($row){
		$hmSociedad = new HmSociedad();
		
		$hmSociedad->id = $row['id'];
		$hmSociedad->rutsociedad = $row['rutsociedad'];
		$hmSociedad->rutver = $row['rutver'];
		$hmSociedad->razonsocial = $row['razonsocial'];
		$hmSociedad->vigente = $row['vigente'];

		return $hmSociedad;
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
	 * @return HmSociedadMySql 
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