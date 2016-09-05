<?php
/**
 * Class that operate on table 'mae_medicos2'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
class MaeMedicos2MySqlDAO implements MaeMedicos2DAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeMedicos2MySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_medicos2 WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_medicos2';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_medicos2 ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeMedicos2 primary key
 	 */
	public function delete($rutnum){
		$sql = 'DELETE FROM mae_medicos2 WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($rutnum);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeMedicos2MySql maeMedicos2
 	 */
	public function insert($maeMedicos2){
		$sql = 'INSERT INTO mae_medicos2 (rutver, fullname, direccion, telefono, coidigociudad, nombre, apellido, codigoespecialidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeMedicos2->rutver);
		$sqlQuery->set($maeMedicos2->fullname);
		$sqlQuery->set($maeMedicos2->direccion);
		$sqlQuery->set($maeMedicos2->telefono);
		$sqlQuery->set($maeMedicos2->coidigociudad);
		$sqlQuery->set($maeMedicos2->nombre);
		$sqlQuery->set($maeMedicos2->apellido);
		$sqlQuery->setNumber($maeMedicos2->codigoespecialidad);

		$id = $this->executeInsert($sqlQuery);	
		$maeMedicos2->rutnum = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeMedicos2MySql maeMedicos2
 	 */
	public function update($maeMedicos2){
		$sql = 'UPDATE mae_medicos2 SET rutver = ?, fullname = ?, direccion = ?, telefono = ?, coidigociudad = ?, nombre = ?, apellido = ?, codigoespecialidad = ? WHERE rutnum = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeMedicos2->rutver);
		$sqlQuery->set($maeMedicos2->fullname);
		$sqlQuery->set($maeMedicos2->direccion);
		$sqlQuery->set($maeMedicos2->telefono);
		$sqlQuery->set($maeMedicos2->coidigociudad);
		$sqlQuery->set($maeMedicos2->nombre);
		$sqlQuery->set($maeMedicos2->apellido);
		$sqlQuery->setNumber($maeMedicos2->codigoespecialidad);

		$sqlQuery->setNumber($maeMedicos2->rutnum);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_medicos2';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRutver($value){
		$sql = 'SELECT * FROM mae_medicos2 WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFullname($value){
		$sql = 'SELECT * FROM mae_medicos2 WHERE fullname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM mae_medicos2 WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM mae_medicos2 WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCoidigociudad($value){
		$sql = 'SELECT * FROM mae_medicos2 WHERE coidigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM mae_medicos2 WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellido($value){
		$sql = 'SELECT * FROM mae_medicos2 WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoespecialidad($value){
		$sql = 'SELECT * FROM mae_medicos2 WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRutver($value){
		$sql = 'DELETE FROM mae_medicos2 WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFullname($value){
		$sql = 'DELETE FROM mae_medicos2 WHERE fullname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM mae_medicos2 WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM mae_medicos2 WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCoidigociudad($value){
		$sql = 'DELETE FROM mae_medicos2 WHERE coidigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombre($value){
		$sql = 'DELETE FROM mae_medicos2 WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellido($value){
		$sql = 'DELETE FROM mae_medicos2 WHERE apellido = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoespecialidad($value){
		$sql = 'DELETE FROM mae_medicos2 WHERE codigoespecialidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeMedicos2MySql 
	 */
	protected function readRow($row){
		$maeMedicos2 = new MaeMedicos2();
		
		$maeMedicos2->rutnum = $row['rutnum'];
		$maeMedicos2->rutver = $row['rutver'];
		$maeMedicos2->fullname = $row['fullname'];
		$maeMedicos2->direccion = $row['direccion'];
		$maeMedicos2->telefono = $row['telefono'];
		$maeMedicos2->coidigociudad = $row['coidigociudad'];
		$maeMedicos2->nombre = $row['nombre'];
		$maeMedicos2->apellido = $row['apellido'];
		$maeMedicos2->codigoespecialidad = $row['codigoespecialidad'];

		return $maeMedicos2;
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
	 * @return MaeMedicos2MySql 
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