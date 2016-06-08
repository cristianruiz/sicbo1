<?php
/**
 * Class that operate on table 'servicios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-06-07 10:49
 */
class ServiciosMySqlDAO implements ServiciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ServiciosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM servicios WHERE COD_SER = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM servicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM servicios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param servicio primary key
 	 */
	public function delete($COD_SER){
		$sql = 'DELETE FROM servicios WHERE COD_SER = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($COD_SER);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ServiciosMySql servicio
 	 */
	public function insert($servicio){
		$sql = 'INSERT INTO servicios (GRUPO, DESCRIP, C_SECCION, VIGENTE) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($servicio->gRUPO);
		$sqlQuery->set($servicio->dESCRIP);
		$sqlQuery->setNumber($servicio->cSECCION);
		$sqlQuery->setNumber($servicio->vIGENTE);

		$id = $this->executeInsert($sqlQuery);	
		$servicio->cODSER = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ServiciosMySql servicio
 	 */
	public function update($servicio){
		$sql = 'UPDATE servicios SET GRUPO = ?, DESCRIP = ?, C_SECCION = ?, VIGENTE = ? WHERE COD_SER = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($servicio->gRUPO);
		$sqlQuery->set($servicio->dESCRIP);
		$sqlQuery->setNumber($servicio->cSECCION);
		$sqlQuery->setNumber($servicio->vIGENTE);

		$sqlQuery->setNumber($servicio->cODSER);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM servicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGRUPO($value){
		$sql = 'SELECT * FROM servicios WHERE GRUPO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDESCRIP($value){
		$sql = 'SELECT * FROM servicios WHERE DESCRIP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCSECCION($value){
		$sql = 'SELECT * FROM servicios WHERE C_SECCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVIGENTE($value){
		$sql = 'SELECT * FROM servicios WHERE VIGENTE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGRUPO($value){
		$sql = 'DELETE FROM servicios WHERE GRUPO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDESCRIP($value){
		$sql = 'DELETE FROM servicios WHERE DESCRIP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCSECCION($value){
		$sql = 'DELETE FROM servicios WHERE C_SECCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVIGENTE($value){
		$sql = 'DELETE FROM servicios WHERE VIGENTE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ServiciosMySql 
	 */
	protected function readRow($row){
		$servicio = new Servicio();
		
		$servicio->cODSER = $row['COD_SER'];
		$servicio->gRUPO = $row['GRUPO'];
		$servicio->dESCRIP = $row['DESCRIP'];
		$servicio->cSECCION = $row['C_SECCION'];
		$servicio->vIGENTE = $row['VIGENTE'];

		return $servicio;
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
	 * @return ServiciosMySql 
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