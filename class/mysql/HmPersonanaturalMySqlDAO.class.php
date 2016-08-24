<?php
/**
 * Class that operate on table 'hm_personanatural'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 17:04
 */
class HmPersonanaturalMySqlDAO implements HmPersonanaturalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HmPersonanaturalMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hm_personanatural WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hm_personanatural';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hm_personanatural ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hmPersonanatural primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM hm_personanatural WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmPersonanaturalMySql hmPersonanatural
 	 */
	public function insert($hmPersonanatural){
		$sql = 'INSERT INTO hm_personanatural (rutproveedor, rutver, nombrecompleto, esreceptor, vigente) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmPersonanatural->rutproveedor);
		$sqlQuery->set($hmPersonanatural->rutver);
		$sqlQuery->set($hmPersonanatural->nombrecompleto);
		$sqlQuery->set($hmPersonanatural->esreceptor);
		$sqlQuery->set($hmPersonanatural->vigente);

		$id = $this->executeInsert($sqlQuery);	
		$hmPersonanatural->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmPersonanaturalMySql hmPersonanatural
 	 */
	public function update($hmPersonanatural){
		$sql = 'UPDATE hm_personanatural SET rutproveedor = ?, rutver = ?, nombrecompleto = ?, esreceptor = ?, vigente = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmPersonanatural->rutproveedor);
		$sqlQuery->set($hmPersonanatural->rutver);
		$sqlQuery->set($hmPersonanatural->nombrecompleto);
		$sqlQuery->set($hmPersonanatural->esreceptor);
		$sqlQuery->set($hmPersonanatural->vigente);

		$sqlQuery->setNumber($hmPersonanatural->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hm_personanatural';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRutproveedor($value){
		$sql = 'SELECT * FROM hm_personanatural WHERE rutproveedor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutver($value){
		$sql = 'SELECT * FROM hm_personanatural WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombrecompleto($value){
		$sql = 'SELECT * FROM hm_personanatural WHERE nombrecompleto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEsreceptor($value){
		$sql = 'SELECT * FROM hm_personanatural WHERE esreceptor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM hm_personanatural WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRutproveedor($value){
		$sql = 'DELETE FROM hm_personanatural WHERE rutproveedor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutver($value){
		$sql = 'DELETE FROM hm_personanatural WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombrecompleto($value){
		$sql = 'DELETE FROM hm_personanatural WHERE nombrecompleto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEsreceptor($value){
		$sql = 'DELETE FROM hm_personanatural WHERE esreceptor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM hm_personanatural WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HmPersonanaturalMySql 
	 */
	protected function readRow($row){
		$hmPersonanatural = new HmPersonanatural();
		
		$hmPersonanatural->id = $row['id'];
		$hmPersonanatural->rutproveedor = $row['rutproveedor'];
		$hmPersonanatural->rutver = $row['rutver'];
		$hmPersonanatural->nombrecompleto = $row['nombrecompleto'];
		$hmPersonanatural->esreceptor = $row['esreceptor'];
		$hmPersonanatural->vigente = $row['vigente'];

		return $hmPersonanatural;
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
	 * @return HmPersonanaturalMySql 
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