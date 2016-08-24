<?php
/**
 * Class that operate on table 'zglb_medicos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 17:04
 */
class ZglbMedicosMySqlDAO implements ZglbMedicosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ZglbMedicosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM zglb_medicos WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM zglb_medicos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM zglb_medicos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param zglbMedico primary key
 	 */
	public function delete($rutnum){
		$sql = 'DELETE FROM zglb_medicos WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($rutnum);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ZglbMedicosMySql zglbMedico
 	 */
	public function insert($zglbMedico){
		$sql = 'INSERT INTO zglb_medicos (rutver, fullname, direccion, telefono, codigoespecialidad, coidigociudad, nombre, apellido) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($zglbMedico->rutver);
		$sqlQuery->set($zglbMedico->fullname);
		$sqlQuery->set($zglbMedico->direccion);
		$sqlQuery->set($zglbMedico->telefono);
		$sqlQuery->set($zglbMedico->codigoespecialidad);
		$sqlQuery->set($zglbMedico->coidigociudad);
		$sqlQuery->set($zglbMedico->nombre);
		$sqlQuery->set($zglbMedico->apellido);

		$id = $this->executeInsert($sqlQuery);	
		$zglbMedico->rutnum = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ZglbMedicosMySql zglbMedico
 	 */
	public function update($zglbMedico){
		$sql = 'UPDATE zglb_medicos SET rutver = ?, fullname = ?, direccion = ?, telefono = ?, codigoespecialidad = ?, coidigociudad = ?, nombre = ?, apellido = ? WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($zglbMedico->rutver);
		$sqlQuery->set($zglbMedico->fullname);
		$sqlQuery->set($zglbMedico->direccion);
		$sqlQuery->set($zglbMedico->telefono);
		$sqlQuery->set($zglbMedico->codigoespecialidad);
		$sqlQuery->set($zglbMedico->coidigociudad);
		$sqlQuery->set($zglbMedico->nombre);
		$sqlQuery->set($zglbMedico->apellido);

		$sqlQuery->setNumber($zglbMedico->rutnum);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM zglb_medicos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRutver($value){
		$sql = 'SELECT * FROM zglb_medicos WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFullname($value){
		$sql = 'SELECT * FROM zglb_medicos WHERE fullname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM zglb_medicos WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM zglb_medicos WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoespecialidad($value){
		$sql = 'SELECT * FROM zglb_medicos WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCoidigociudad($value){
		$sql = 'SELECT * FROM zglb_medicos WHERE coidigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM zglb_medicos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellido($value){
		$sql = 'SELECT * FROM zglb_medicos WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRutver($value){
		$sql = 'DELETE FROM zglb_medicos WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFullname($value){
		$sql = 'DELETE FROM zglb_medicos WHERE fullname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM zglb_medicos WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM zglb_medicos WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoespecialidad($value){
		$sql = 'DELETE FROM zglb_medicos WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCoidigociudad($value){
		$sql = 'DELETE FROM zglb_medicos WHERE coidigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombre($value){
		$sql = 'DELETE FROM zglb_medicos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellido($value){
		$sql = 'DELETE FROM zglb_medicos WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ZglbMedicosMySql 
	 */
	protected function readRow($row){
		$zglbMedico = new ZglbMedico();
		
		$zglbMedico->rutnum = $row['rutnum'];
		$zglbMedico->rutver = $row['rutver'];
		$zglbMedico->fullname = $row['fullname'];
		$zglbMedico->direccion = $row['direccion'];
		$zglbMedico->telefono = $row['telefono'];
		$zglbMedico->codigoespecialidad = $row['codigoespecialidad'];
		$zglbMedico->coidigociudad = $row['coidigociudad'];
		$zglbMedico->nombre = $row['nombre'];
		$zglbMedico->apellido = $row['apellido'];

		return $zglbMedico;
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
	 * @return ZglbMedicosMySql 
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