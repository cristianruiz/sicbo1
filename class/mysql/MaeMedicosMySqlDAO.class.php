<?php
/**
 * Class that operate on table 'mae_medicos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class MaeMedicosMySqlDAO implements MaeMedicosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeMedicosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_medicos WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_medicos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_medicos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeMedico primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM mae_medicos WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeMedicosMySql maeMedico
 	 */
	public function insert($maeMedico){
		$sql = 'INSERT INTO mae_medicos (rutnum, rutver, fullname, direccion, telefono, coidigociudad, nombre, apellido, codigoespecialidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($maeMedico->rutnum);
		$sqlQuery->set($maeMedico->rutver);
		$sqlQuery->set($maeMedico->fullname);
		$sqlQuery->set($maeMedico->direccion);
		$sqlQuery->set($maeMedico->telefono);
		$sqlQuery->set($maeMedico->coidigociudad);
		$sqlQuery->set($maeMedico->nombre);
		$sqlQuery->set($maeMedico->apellido);
		$sqlQuery->setNumber($maeMedico->codigoespecialidad);

		$id = $this->executeInsert($sqlQuery);	
		$maeMedico->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeMedicosMySql maeMedico
 	 */
	public function update($maeMedico){
		$sql = 'UPDATE mae_medicos SET rutnum = ?, rutver = ?, fullname = ?, direccion = ?, telefono = ?, coidigociudad = ?, nombre = ?, apellido = ?, codigoespecialidad = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($maeMedico->rutnum);
		$sqlQuery->set($maeMedico->rutver);
		$sqlQuery->set($maeMedico->fullname);
		$sqlQuery->set($maeMedico->direccion);
		$sqlQuery->set($maeMedico->telefono);
		$sqlQuery->set($maeMedico->coidigociudad);
		$sqlQuery->set($maeMedico->nombre);
		$sqlQuery->set($maeMedico->apellido);
		$sqlQuery->setNumber($maeMedico->codigoespecialidad);

		$sqlQuery->setNumber($maeMedico->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_medicos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRutnum($value){
		$sql = 'SELECT * FROM mae_medicos WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutver($value){
		$sql = 'SELECT * FROM mae_medicos WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFullname($value){
		$sql = 'SELECT * FROM mae_medicos WHERE fullname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM mae_medicos WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM mae_medicos WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCoidigociudad($value){
		$sql = 'SELECT * FROM mae_medicos WHERE coidigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM mae_medicos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellido($value){
		$sql = 'SELECT * FROM mae_medicos WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoespecialidad($value){
		$sql = 'SELECT * FROM mae_medicos WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRutnum($value){
		$sql = 'DELETE FROM mae_medicos WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutver($value){
		$sql = 'DELETE FROM mae_medicos WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFullname($value){
		$sql = 'DELETE FROM mae_medicos WHERE fullname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM mae_medicos WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM mae_medicos WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCoidigociudad($value){
		$sql = 'DELETE FROM mae_medicos WHERE coidigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombre($value){
		$sql = 'DELETE FROM mae_medicos WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellido($value){
		$sql = 'DELETE FROM mae_medicos WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoespecialidad($value){
		$sql = 'DELETE FROM mae_medicos WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeMedicosMySql 
	 */
	protected function readRow($row){
		$maeMedico = new MaeMedico();
		
		$maeMedico->id = $row['id'];
		$maeMedico->rutnum = $row['rutnum'];
		$maeMedico->rutver = $row['rutver'];
		$maeMedico->fullname = $row['fullname'];
		$maeMedico->direccion = $row['direccion'];
		$maeMedico->telefono = $row['telefono'];
		$maeMedico->coidigociudad = $row['coidigociudad'];
		$maeMedico->nombre = $row['nombre'];
		$maeMedico->apellido = $row['apellido'];
		$maeMedico->codigoespecialidad = $row['codigoespecialidad'];

		return $maeMedico;
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
	 * @return MaeMedicosMySql 
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