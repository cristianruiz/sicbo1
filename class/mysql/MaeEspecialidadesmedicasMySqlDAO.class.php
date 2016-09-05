<?php
/**
 * Class that operate on table 'mae_especialidadesmedicas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
class MaeEspecialidadesmedicasMySqlDAO implements MaeEspecialidadesmedicasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeEspecialidadesmedicasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_especialidadesmedicas WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_especialidadesmedicas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_especialidadesmedicas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeEspecialidadesmedica primary key
 	 */
	public function delete($codigoespecialidad){
		$sql = 'DELETE FROM mae_especialidadesmedicas WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigoespecialidad);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeEspecialidadesmedicasMySql maeEspecialidadesmedica
 	 */
	public function insert($maeEspecialidadesmedica){
		$sql = 'INSERT INTO mae_especialidadesmedicas (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeEspecialidadesmedica->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$maeEspecialidadesmedica->codigoespecialidad = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeEspecialidadesmedicasMySql maeEspecialidadesmedica
 	 */
	public function update($maeEspecialidadesmedica){
		$sql = 'UPDATE mae_especialidadesmedicas SET descripcion = ? WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeEspecialidadesmedica->descripcion);

		$sqlQuery->setNumber($maeEspecialidadesmedica->codigoespecialidad);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_especialidadesmedicas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_especialidadesmedicas WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_especialidadesmedicas WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeEspecialidadesmedicasMySql 
	 */
	protected function readRow($row){
		$maeEspecialidadesmedica = new MaeEspecialidadesmedica();
		
		$maeEspecialidadesmedica->codigoespecialidad = $row['codigoespecialidad'];
		$maeEspecialidadesmedica->descripcion = $row['descripcion'];

		return $maeEspecialidadesmedica;
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
	 * @return MaeEspecialidadesmedicasMySql 
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