<?php
/**
 * Class that operate on table 'caja_pagocheques'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 17:04
 */
class CajaPagochequesMySqlDAO implements CajaPagochequesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaPagochequesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_pagocheques WHERE idpagocheques = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_pagocheques';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_pagocheques ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaPagocheque primary key
 	 */
	public function delete($idpagocheques){
		$sql = 'DELETE FROM caja_pagocheques WHERE idpagocheques = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idpagocheques);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaPagochequesMySql cajaPagocheque
 	 */
	public function insert($cajaPagocheque){
		$sql = 'INSERT INTO caja_pagocheques (foliocheque, numerocuenta, nombretitular, ruttitular, rutver, monto, fechacobro, orden, cantidadcheques, codigociudad, codigobanco, idcomprobante, empid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaPagocheque->foliocheque);
		$sqlQuery->set($cajaPagocheque->numerocuenta);
		$sqlQuery->set($cajaPagocheque->nombretitular);
		$sqlQuery->setNumber($cajaPagocheque->ruttitular);
		$sqlQuery->set($cajaPagocheque->rutver);
		$sqlQuery->setNumber($cajaPagocheque->monto);
		$sqlQuery->set($cajaPagocheque->fechacobro);
		$sqlQuery->setNumber($cajaPagocheque->orden);
		$sqlQuery->setNumber($cajaPagocheque->cantidadcheques);
		$sqlQuery->setNumber($cajaPagocheque->codigociudad);
		$sqlQuery->setNumber($cajaPagocheque->codigobanco);
		$sqlQuery->setNumber($cajaPagocheque->idcomprobante);
		$sqlQuery->setNumber($cajaPagocheque->empid);

		$id = $this->executeInsert($sqlQuery);	
		$cajaPagocheque->idpagocheques = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaPagochequesMySql cajaPagocheque
 	 */
	public function update($cajaPagocheque){
		$sql = 'UPDATE caja_pagocheques SET foliocheque = ?, numerocuenta = ?, nombretitular = ?, ruttitular = ?, rutver = ?, monto = ?, fechacobro = ?, orden = ?, cantidadcheques = ?, codigociudad = ?, codigobanco = ?, idcomprobante = ?, empid = ? WHERE idpagocheques = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaPagocheque->foliocheque);
		$sqlQuery->set($cajaPagocheque->numerocuenta);
		$sqlQuery->set($cajaPagocheque->nombretitular);
		$sqlQuery->setNumber($cajaPagocheque->ruttitular);
		$sqlQuery->set($cajaPagocheque->rutver);
		$sqlQuery->setNumber($cajaPagocheque->monto);
		$sqlQuery->set($cajaPagocheque->fechacobro);
		$sqlQuery->setNumber($cajaPagocheque->orden);
		$sqlQuery->setNumber($cajaPagocheque->cantidadcheques);
		$sqlQuery->setNumber($cajaPagocheque->codigociudad);
		$sqlQuery->setNumber($cajaPagocheque->codigobanco);
		$sqlQuery->setNumber($cajaPagocheque->idcomprobante);
		$sqlQuery->setNumber($cajaPagocheque->empid);

		$sqlQuery->setNumber($cajaPagocheque->idpagocheques);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_pagocheques';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFoliocheque($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE foliocheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumerocuenta($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE numerocuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombretitular($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE nombretitular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRuttitular($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE ruttitular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutver($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMonto($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechacobro($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE fechacobro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrden($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE orden = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidadcheques($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE cantidadcheques = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigociudad($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigobanco($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE codigobanco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdcomprobante($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE idcomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmpid($value){
		$sql = 'SELECT * FROM caja_pagocheques WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFoliocheque($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE foliocheque = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumerocuenta($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE numerocuenta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombretitular($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE nombretitular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRuttitular($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE ruttitular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutver($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE rutver = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMonto($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechacobro($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE fechacobro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrden($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE orden = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidadcheques($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE cantidadcheques = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigociudad($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE codigociudad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigobanco($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE codigobanco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdcomprobante($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE idcomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmpid($value){
		$sql = 'DELETE FROM caja_pagocheques WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaPagochequesMySql 
	 */
	protected function readRow($row){
		$cajaPagocheque = new CajaPagocheque();
		
		$cajaPagocheque->idpagocheques = $row['idpagocheques'];
		$cajaPagocheque->foliocheque = $row['foliocheque'];
		$cajaPagocheque->numerocuenta = $row['numerocuenta'];
		$cajaPagocheque->nombretitular = $row['nombretitular'];
		$cajaPagocheque->ruttitular = $row['ruttitular'];
		$cajaPagocheque->rutver = $row['rutver'];
		$cajaPagocheque->monto = $row['monto'];
		$cajaPagocheque->fechacobro = $row['fechacobro'];
		$cajaPagocheque->orden = $row['orden'];
		$cajaPagocheque->cantidadcheques = $row['cantidadcheques'];
		$cajaPagocheque->codigociudad = $row['codigociudad'];
		$cajaPagocheque->codigobanco = $row['codigobanco'];
		$cajaPagocheque->idcomprobante = $row['idcomprobante'];
		$cajaPagocheque->empid = $row['empid'];

		return $cajaPagocheque;
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
	 * @return CajaPagochequesMySql 
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