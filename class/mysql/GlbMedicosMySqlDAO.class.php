<?php
/**
 * Class that operate on table 'glb_medicos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-06-14 21:36
 */
class GlbMedicosMySqlDAO implements GlbMedicosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return GlbMedicosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM glb_medicos WHERE rut_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM glb_medicos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM glb_medicos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param glbMedico primary key
 	 */
	public function delete($rut_num){
		$sql = 'DELETE FROM glb_medicos WHERE rut_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($rut_num);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GlbMedicosMySql glbMedico
 	 */
	public function insert($glbMedico){
		$sql = 'INSERT INTO glb_medicos (name, lastname) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($glbMedico->name);
		$sqlQuery->set($glbMedico->lastname);

		$id = $this->executeInsert($sqlQuery);	
		$glbMedico->rutNum = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GlbMedicosMySql glbMedico
 	 */
	public function update($glbMedico){
		$sql = 'UPDATE glb_medicos SET name = ?, lastname = ? WHERE rut_num = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($glbMedico->name);
		$sqlQuery->set($glbMedico->lastname);

		$sqlQuery->setNumber($glbMedico->rutNum);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM glb_medicos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM glb_medicos WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastname($value){
		$sql = 'SELECT * FROM glb_medicos WHERE lastname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM glb_medicos WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastname($value){
		$sql = 'DELETE FROM glb_medicos WHERE lastname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return GlbMedicosMySql 
	 */
	protected function readRow($row){
		$glbMedico = new GlbMedico();
		
		$glbMedico->name = $row['name'];
		$glbMedico->lastname = $row['lastname'];
		$glbMedico->rutNum = $row['rut_num'];

		return $glbMedico;
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
	 * @return GlbMedicosMySql 
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