<?php
/**
 * Class that operate on table 'mae_paciente'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
class MaePacienteMySqlDAO implements MaePacienteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaePacienteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_paciente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_paciente';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_paciente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maePaciente primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM mae_paciente WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaePacienteMySql maePaciente
 	 */
	public function insert($maePaciente){
		$sql = 'INSERT INTO mae_paciente (rutpaciente, rutver, nombre, apellidopaterno, apellidomaterno, fechanacimiento, direccion, telefono, correlectronico, codigociudad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($maePaciente->rutpaciente);
		$sqlQuery->set($maePaciente->rutver);
		$sqlQuery->set($maePaciente->nombre);
		$sqlQuery->set($maePaciente->apellidopaterno);
		$sqlQuery->set($maePaciente->apellidomaterno);
		$sqlQuery->set($maePaciente->fechanacimiento);
		$sqlQuery->set($maePaciente->direccion);
		$sqlQuery->set($maePaciente->telefono);
		$sqlQuery->set($maePaciente->correlectronico);
		$sqlQuery->setNumber($maePaciente->codigociudad);

		$id = $this->executeInsert($sqlQuery);	
		$maePaciente->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaePacienteMySql maePaciente
 	 */
	public function update($maePaciente){
		$sql = 'UPDATE mae_paciente SET rutpaciente = ?, rutver = ?, nombre = ?, apellidopaterno = ?, apellidomaterno = ?, fechanacimiento = ?, direccion = ?, telefono = ?, correlectronico = ?, codigociudad = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($maePaciente->rutpaciente);
		$sqlQuery->set($maePaciente->rutver);
		$sqlQuery->set($maePaciente->nombre);
		$sqlQuery->set($maePaciente->apellidopaterno);
		$sqlQuery->set($maePaciente->apellidomaterno);
		$sqlQuery->set($maePaciente->fechanacimiento);
		$sqlQuery->set($maePaciente->direccion);
		$sqlQuery->set($maePaciente->telefono);
		$sqlQuery->set($maePaciente->correlectronico);
		$sqlQuery->setNumber($maePaciente->codigociudad);

		$sqlQuery->setNumber($maePaciente->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_paciente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRutpaciente($value){
		$sql = 'SELECT * FROM mae_paciente WHERE rutpaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutver($value){
		$sql = 'SELECT * FROM mae_paciente WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM mae_paciente WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidopaterno($value){
		$sql = 'SELECT * FROM mae_paciente WHERE apellidopaterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidomaterno($value){
		$sql = 'SELECT * FROM mae_paciente WHERE apellidomaterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechanacimiento($value){
		$sql = 'SELECT * FROM mae_paciente WHERE fechanacimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM mae_paciente WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM mae_paciente WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCorrelectronico($value){
		$sql = 'SELECT * FROM mae_paciente WHERE correlectronico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigociudad($value){
		$sql = 'SELECT * FROM mae_paciente WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRutpaciente($value){
		$sql = 'DELETE FROM mae_paciente WHERE rutpaciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutver($value){
		$sql = 'DELETE FROM mae_paciente WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombre($value){
		$sql = 'DELETE FROM mae_paciente WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidopaterno($value){
		$sql = 'DELETE FROM mae_paciente WHERE apellidopaterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidomaterno($value){
		$sql = 'DELETE FROM mae_paciente WHERE apellidomaterno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechanacimiento($value){
		$sql = 'DELETE FROM mae_paciente WHERE fechanacimiento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM mae_paciente WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM mae_paciente WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCorrelectronico($value){
		$sql = 'DELETE FROM mae_paciente WHERE correlectronico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigociudad($value){
		$sql = 'DELETE FROM mae_paciente WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaePacienteMySql 
	 */
	protected function readRow($row){
		$maePaciente = new MaePaciente();
		
		$maePaciente->id = $row['id'];
		$maePaciente->rutpaciente = $row['rutpaciente'];
		$maePaciente->rutver = $row['rutver'];
		$maePaciente->nombre = $row['nombre'];
		$maePaciente->apellidopaterno = $row['apellidopaterno'];
		$maePaciente->apellidomaterno = $row['apellidomaterno'];
		$maePaciente->fechanacimiento = $row['fechanacimiento'];
		$maePaciente->direccion = $row['direccion'];
		$maePaciente->telefono = $row['telefono'];
		$maePaciente->correlectronico = $row['correlectronico'];
		$maePaciente->codigociudad = $row['codigociudad'];

		return $maePaciente;
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
	 * @return MaePacienteMySql 
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