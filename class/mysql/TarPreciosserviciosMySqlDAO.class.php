<?php
/**
 * Class that operate on table 'tar_preciosservicios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
class TarPreciosserviciosMySqlDAO implements TarPreciosserviciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TarPreciosserviciosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tar_preciosservicios WHERE idprecioservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tar_preciosservicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tar_preciosservicios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tarPreciosservicio primary key
 	 */
	public function delete($idprecioservicio){
		$sql = 'DELETE FROM tar_preciosservicios WHERE idprecioservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idprecioservicio);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarPreciosserviciosMySql tarPreciosservicio
 	 */
	public function insert($tarPreciosservicio){
		$sql = 'INSERT INTO tar_preciosservicios (codigoservicio, idconvenio, preciounitario, vigente) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tarPreciosservicio->codigoservicio);
		$sqlQuery->setNumber($tarPreciosservicio->idconvenio);
		$sqlQuery->setNumber($tarPreciosservicio->preciounitario);
		$sqlQuery->set($tarPreciosservicio->vigente);

		$id = $this->executeInsert($sqlQuery);	
		$tarPreciosservicio->idprecioservicio = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarPreciosserviciosMySql tarPreciosservicio
 	 */
	public function update($tarPreciosservicio){
		$sql = 'UPDATE tar_preciosservicios SET codigoservicio = ?, idconvenio = ?, preciounitario = ?, vigente = ? WHERE idprecioservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tarPreciosservicio->codigoservicio);
		$sqlQuery->setNumber($tarPreciosservicio->idconvenio);
		$sqlQuery->setNumber($tarPreciosservicio->preciounitario);
		$sqlQuery->set($tarPreciosservicio->vigente);

		$sqlQuery->setNumber($tarPreciosservicio->idprecioservicio);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tar_preciosservicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigoservicio($value){
		$sql = 'SELECT * FROM tar_preciosservicios WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdconvenio($value){
		$sql = 'SELECT * FROM tar_preciosservicios WHERE idconvenio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciounitario($value){
		$sql = 'SELECT * FROM tar_preciosservicios WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM tar_preciosservicios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigoservicio($value){
		$sql = 'DELETE FROM tar_preciosservicios WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdconvenio($value){
		$sql = 'DELETE FROM tar_preciosservicios WHERE idconvenio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciounitario($value){
		$sql = 'DELETE FROM tar_preciosservicios WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM tar_preciosservicios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TarPreciosserviciosMySql 
	 */
	protected function readRow($row){
		$tarPreciosservicio = new TarPreciosservicio();
		
		$tarPreciosservicio->codigoservicio = $row['codigoservicio'];
		$tarPreciosservicio->idconvenio = $row['idconvenio'];
		$tarPreciosservicio->preciounitario = $row['preciounitario'];
		$tarPreciosservicio->vigente = $row['vigente'];
		$tarPreciosservicio->idprecioservicio = $row['idprecioservicio'];

		return $tarPreciosservicio;
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
	 * @return TarPreciosserviciosMySql 
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