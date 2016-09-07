<?php
/**
 * Class that operate on table 'tar_detallepaqueteservicios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-07 17:12
 */
class TarDetallepaqueteserviciosMySqlDAO implements TarDetallepaqueteserviciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TarDetallepaqueteserviciosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios WHERE iddetallepaqueteservicios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tarDetallepaqueteservicio primary key
 	 */
	public function delete($iddetallepaqueteservicios){
		$sql = 'DELETE FROM tar_detallepaqueteservicios WHERE iddetallepaqueteservicios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetallepaqueteservicios);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarDetallepaqueteserviciosMySql tarDetallepaqueteservicio
 	 */
	public function insert($tarDetallepaqueteservicio){
		$sql = 'INSERT INTO tar_detallepaqueteservicios (cantidad, monto, vigente, codigoservicio, idgrupopaquete, codigoseccion) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tarDetallepaqueteservicio->cantidad);
		$sqlQuery->setNumber($tarDetallepaqueteservicio->monto);
		$sqlQuery->set($tarDetallepaqueteservicio->vigente);
		$sqlQuery->setNumber($tarDetallepaqueteservicio->codigoservicio);
		$sqlQuery->setNumber($tarDetallepaqueteservicio->idgrupopaquete);
		$sqlQuery->setNumber($tarDetallepaqueteservicio->codigoseccion);

		$id = $this->executeInsert($sqlQuery);	
		$tarDetallepaqueteservicio->iddetallepaqueteservicios = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarDetallepaqueteserviciosMySql tarDetallepaqueteservicio
 	 */
	public function update($tarDetallepaqueteservicio){
		$sql = 'UPDATE tar_detallepaqueteservicios SET cantidad = ?, monto = ?, vigente = ?, codigoservicio = ?, idgrupopaquete = ?, codigoseccion = ? WHERE iddetallepaqueteservicios = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tarDetallepaqueteservicio->cantidad);
		$sqlQuery->setNumber($tarDetallepaqueteservicio->monto);
		$sqlQuery->set($tarDetallepaqueteservicio->vigente);
		$sqlQuery->setNumber($tarDetallepaqueteservicio->codigoservicio);
		$sqlQuery->setNumber($tarDetallepaqueteservicio->idgrupopaquete);
		$sqlQuery->setNumber($tarDetallepaqueteservicio->codigoseccion);

		$sqlQuery->setNumber($tarDetallepaqueteservicio->iddetallepaqueteservicios);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tar_detallepaqueteservicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMonto($value){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoservicio($value){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdgrupopaquete($value){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios WHERE idgrupopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM tar_detallepaqueteservicios WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCantidad($value){
		$sql = 'DELETE FROM tar_detallepaqueteservicios WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMonto($value){
		$sql = 'DELETE FROM tar_detallepaqueteservicios WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM tar_detallepaqueteservicios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoservicio($value){
		$sql = 'DELETE FROM tar_detallepaqueteservicios WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdgrupopaquete($value){
		$sql = 'DELETE FROM tar_detallepaqueteservicios WHERE idgrupopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM tar_detallepaqueteservicios WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TarDetallepaqueteserviciosMySql 
	 */
	protected function readRow($row){
		$tarDetallepaqueteservicio = new TarDetallepaqueteservicio();
		
		$tarDetallepaqueteservicio->iddetallepaqueteservicios = $row['iddetallepaqueteservicios'];
		$tarDetallepaqueteservicio->cantidad = $row['cantidad'];
		$tarDetallepaqueteservicio->monto = $row['monto'];
		$tarDetallepaqueteservicio->vigente = $row['vigente'];
		$tarDetallepaqueteservicio->codigoservicio = $row['codigoservicio'];
		$tarDetallepaqueteservicio->idgrupopaquete = $row['idgrupopaquete'];
		$tarDetallepaqueteservicio->codigoseccion = $row['codigoseccion'];

		return $tarDetallepaqueteservicio;
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
	 * @return TarDetallepaqueteserviciosMySql 
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