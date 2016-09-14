<?php
/**
 * Class that operate on table 'hm_detallehonorariossicbo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class HmDetallehonorariossicboMySqlDAO implements HmDetallehonorariossicboDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HmDetallehonorariossicboMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE iddetallehonorario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hmDetallehonorariossicbo primary key
 	 */
	public function delete($iddetallehonorario){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE iddetallehonorario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetallehonorario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmDetallehonorariossicboMySql hmDetallehonorariossicbo
 	 */
	public function insert($hmDetallehonorariossicbo){
		$sql = 'INSERT INTO hm_detallehonorariossicbo (periodo, fechadigitacion, paciente, nrooa, codigo, cantidad, fecha, funcion, monto, rutmed, nombrepad, medico, nrofi, idhonorario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmDetallehonorariossicbo->periodo);
		$sqlQuery->set($hmDetallehonorariossicbo->fechadigitacion);
		$sqlQuery->set($hmDetallehonorariossicbo->paciente);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->nrooa);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->codigo);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->cantidad);
		$sqlQuery->set($hmDetallehonorariossicbo->fecha);
		$sqlQuery->set($hmDetallehonorariossicbo->funcion);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->monto);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->rutmed);
		$sqlQuery->set($hmDetallehonorariossicbo->nombrepad);
		$sqlQuery->set($hmDetallehonorariossicbo->medico);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->nrofi);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->idhonorario);

		$id = $this->executeInsert($sqlQuery);	
		$hmDetallehonorariossicbo->iddetallehonorario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmDetallehonorariossicboMySql hmDetallehonorariossicbo
 	 */
	public function update($hmDetallehonorariossicbo){
		$sql = 'UPDATE hm_detallehonorariossicbo SET periodo = ?, fechadigitacion = ?, paciente = ?, nrooa = ?, codigo = ?, cantidad = ?, fecha = ?, funcion = ?, monto = ?, rutmed = ?, nombrepad = ?, medico = ?, nrofi = ?, idhonorario = ? WHERE iddetallehonorario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmDetallehonorariossicbo->periodo);
		$sqlQuery->set($hmDetallehonorariossicbo->fechadigitacion);
		$sqlQuery->set($hmDetallehonorariossicbo->paciente);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->nrooa);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->codigo);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->cantidad);
		$sqlQuery->set($hmDetallehonorariossicbo->fecha);
		$sqlQuery->set($hmDetallehonorariossicbo->funcion);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->monto);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->rutmed);
		$sqlQuery->set($hmDetallehonorariossicbo->nombrepad);
		$sqlQuery->set($hmDetallehonorariossicbo->medico);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->nrofi);
		$sqlQuery->setNumber($hmDetallehonorariossicbo->idhonorario);

		$sqlQuery->setNumber($hmDetallehonorariossicbo->iddetallehonorario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hm_detallehonorariossicbo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPeriodo($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechadigitacion($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE fechadigitacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaciente($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE paciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNrooa($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE nrooa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFuncion($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE funcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMonto($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutmed($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE rutmed = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombrepad($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE nombrepad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMedico($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE medico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNrofi($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE nrofi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdhonorario($value){
		$sql = 'SELECT * FROM hm_detallehonorariossicbo WHERE idhonorario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPeriodo($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE periodo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechadigitacion($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE fechadigitacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaciente($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE paciente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNrooa($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE nrooa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigo($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidad($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFuncion($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE funcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMonto($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutmed($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE rutmed = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombrepad($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE nombrepad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMedico($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE medico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNrofi($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE nrofi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdhonorario($value){
		$sql = 'DELETE FROM hm_detallehonorariossicbo WHERE idhonorario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HmDetallehonorariossicboMySql 
	 */
	protected function readRow($row){
		$hmDetallehonorariossicbo = new HmDetallehonorariossicbo();
		
		$hmDetallehonorariossicbo->iddetallehonorario = $row['iddetallehonorario'];
		$hmDetallehonorariossicbo->periodo = $row['periodo'];
		$hmDetallehonorariossicbo->fechadigitacion = $row['fechadigitacion'];
		$hmDetallehonorariossicbo->paciente = $row['paciente'];
		$hmDetallehonorariossicbo->nrooa = $row['nrooa'];
		$hmDetallehonorariossicbo->codigo = $row['codigo'];
		$hmDetallehonorariossicbo->cantidad = $row['cantidad'];
		$hmDetallehonorariossicbo->fecha = $row['fecha'];
		$hmDetallehonorariossicbo->funcion = $row['funcion'];
		$hmDetallehonorariossicbo->monto = $row['monto'];
		$hmDetallehonorariossicbo->rutmed = $row['rutmed'];
		$hmDetallehonorariossicbo->nombrepad = $row['nombrepad'];
		$hmDetallehonorariossicbo->medico = $row['medico'];
		$hmDetallehonorariossicbo->nrofi = $row['nrofi'];
		$hmDetallehonorariossicbo->idhonorario = $row['idhonorario'];

		return $hmDetallehonorariossicbo;
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
	 * @return HmDetallehonorariossicboMySql 
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