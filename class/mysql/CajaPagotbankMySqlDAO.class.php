<?php
/**
 * Class that operate on table 'caja_pagotbank'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 21:12
 */
class CajaPagotbankMySqlDAO implements CajaPagotbankDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaPagotbankMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_pagotbank WHERE idpagotbank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_pagotbank';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_pagotbank ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaPagotbank primary key
 	 */
	public function delete($idpagotbank){
		$sql = 'DELETE FROM caja_pagotbank WHERE idpagotbank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idpagotbank);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaPagotbankMySql cajaPagotbank
 	 */
	public function insert($cajaPagotbank){
		$sql = 'INSERT INTO caja_pagotbank (monto, codigotransaccion, tipotransaccion, idcomprobante, empid) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaPagotbank->monto);
		$sqlQuery->set($cajaPagotbank->codigotransaccion);
		$sqlQuery->setNumber($cajaPagotbank->tipotransaccion);
		$sqlQuery->setNumber($cajaPagotbank->idcomprobante);
		$sqlQuery->setNumber($cajaPagotbank->empid);

		$id = $this->executeInsert($sqlQuery);	
		$cajaPagotbank->idpagotbank = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaPagotbankMySql cajaPagotbank
 	 */
	public function update($cajaPagotbank){
		$sql = 'UPDATE caja_pagotbank SET monto = ?, codigotransaccion = ?, tipotransaccion = ?, idcomprobante = ?, empid = ? WHERE idpagotbank = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaPagotbank->monto);
		$sqlQuery->set($cajaPagotbank->codigotransaccion);
		$sqlQuery->setNumber($cajaPagotbank->tipotransaccion);
		$sqlQuery->setNumber($cajaPagotbank->idcomprobante);
		$sqlQuery->setNumber($cajaPagotbank->empid);

		$sqlQuery->setNumber($cajaPagotbank->idpagotbank);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_pagotbank';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMonto($value){
		$sql = 'SELECT * FROM caja_pagotbank WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigotransaccion($value){
		$sql = 'SELECT * FROM caja_pagotbank WHERE codigotransaccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipotransaccion($value){
		$sql = 'SELECT * FROM caja_pagotbank WHERE tipotransaccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdcomprobante($value){
		$sql = 'SELECT * FROM caja_pagotbank WHERE idcomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmpid($value){
		$sql = 'SELECT * FROM caja_pagotbank WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMonto($value){
		$sql = 'DELETE FROM caja_pagotbank WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigotransaccion($value){
		$sql = 'DELETE FROM caja_pagotbank WHERE codigotransaccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipotransaccion($value){
		$sql = 'DELETE FROM caja_pagotbank WHERE tipotransaccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdcomprobante($value){
		$sql = 'DELETE FROM caja_pagotbank WHERE idcomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmpid($value){
		$sql = 'DELETE FROM caja_pagotbank WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaPagotbankMySql 
	 */
	protected function readRow($row){
		$cajaPagotbank = new CajaPagotbank();
		
		$cajaPagotbank->idpagotbank = $row['idpagotbank'];
		$cajaPagotbank->monto = $row['monto'];
		$cajaPagotbank->codigotransaccion = $row['codigotransaccion'];
		$cajaPagotbank->tipotransaccion = $row['tipotransaccion'];
		$cajaPagotbank->idcomprobante = $row['idcomprobante'];
		$cajaPagotbank->empid = $row['empid'];

		return $cajaPagotbank;
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
	 * @return CajaPagotbankMySql 
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