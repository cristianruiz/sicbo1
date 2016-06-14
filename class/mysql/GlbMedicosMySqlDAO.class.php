<?php
/**
 * Class that operate on table 'glb_medicos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-06-14 21:44
 */
class GlbMedicosMySqlDAO implements GlbMedicosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return GlbMedicosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM glb_medicos WHERE rutnum = ?';
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
	public function delete($rutnum){
		$sql = 'DELETE FROM glb_medicos WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($rutnum);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GlbMedicosMySql glbMedico
 	 */
	public function insert($glbMedico){
		$sql = 'INSERT INTO glb_medicos (nombre, apellido) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($glbMedico->nombre);
		$sqlQuery->set($glbMedico->apellido);

		$id = $this->executeInsert($sqlQuery);	
		$glbMedico->rutnum = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GlbMedicosMySql glbMedico
 	 */
	public function update($glbMedico){
		$sql = 'UPDATE glb_medicos SET nombre = ?, apellido = ? WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($glbMedico->nombre);
		$sqlQuery->set($glbMedico->apellido);

		$sqlQuery->setNumber($glbMedico->rutnum);
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

	public function queryByNombre($value){
		$sql = 'SELECT * FROM glb_medicos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellido($value){
		$sql = 'SELECT * FROM glb_medicos WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM glb_medicos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellido($value){
		$sql = 'DELETE FROM glb_medicos WHERE apellido = ?';
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
		
		$glbMedico->nombre = $row['nombre'];
		$glbMedico->apellido = $row['apellido'];
		$glbMedico->rutnum = $row['rutnum'];

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