<?php
/**
 * Class that operate on table 'caja_pagoefectivo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
class CajaPagoefectivoMySqlDAO implements CajaPagoefectivoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaPagoefectivoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_pagoefectivo WHERE idpagoefectivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_pagoefectivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_pagoefectivo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaPagoefectivo primary key
 	 */
	public function delete($idpagoefectivo){
		$sql = 'DELETE FROM caja_pagoefectivo WHERE idpagoefectivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idpagoefectivo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaPagoefectivoMySql cajaPagoefectivo
 	 */
	public function insert($cajaPagoefectivo){
		$sql = 'INSERT INTO caja_pagoefectivo (monto, idcomprobante) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaPagoefectivo->monto);
		$sqlQuery->setNumber($cajaPagoefectivo->idcomprobante);

		$id = $this->executeInsert($sqlQuery);	
		$cajaPagoefectivo->idpagoefectivo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaPagoefectivoMySql cajaPagoefectivo
 	 */
	public function update($cajaPagoefectivo){
		$sql = 'UPDATE caja_pagoefectivo SET monto = ?, idcomprobante = ? WHERE idpagoefectivo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaPagoefectivo->monto);
		$sqlQuery->setNumber($cajaPagoefectivo->idcomprobante);

		$sqlQuery->setNumber($cajaPagoefectivo->idpagoefectivo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_pagoefectivo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMonto($value){
		$sql = 'SELECT * FROM caja_pagoefectivo WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdcomprobante($value){
		$sql = 'SELECT * FROM caja_pagoefectivo WHERE idcomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMonto($value){
		$sql = 'DELETE FROM caja_pagoefectivo WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdcomprobante($value){
		$sql = 'DELETE FROM caja_pagoefectivo WHERE idcomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaPagoefectivoMySql 
	 */
	protected function readRow($row){
		$cajaPagoefectivo = new CajaPagoefectivo();
		
		$cajaPagoefectivo->idpagoefectivo = $row['idpagoefectivo'];
		$cajaPagoefectivo->monto = $row['monto'];
		$cajaPagoefectivo->idcomprobante = $row['idcomprobante'];

		return $cajaPagoefectivo;
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
	 * @return CajaPagoefectivoMySql 
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