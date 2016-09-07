<?php
/**
 * Class that operate on table 'caja_estadocomprobante'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-07 17:12
 */
class CajaEstadocomprobanteMySqlDAO implements CajaEstadocomprobanteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaEstadocomprobanteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_estadocomprobante WHERE idestadocomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_estadocomprobante';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_estadocomprobante ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaEstadocomprobante primary key
 	 */
	public function delete($idestadocomprobante){
		$sql = 'DELETE FROM caja_estadocomprobante WHERE idestadocomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idestadocomprobante);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaEstadocomprobanteMySql cajaEstadocomprobante
 	 */
	public function insert($cajaEstadocomprobante){
		$sql = 'INSERT INTO caja_estadocomprobante (empid, descripcion) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaEstadocomprobante->empid);
		$sqlQuery->set($cajaEstadocomprobante->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$cajaEstadocomprobante->idestadocomprobante = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaEstadocomprobanteMySql cajaEstadocomprobante
 	 */
	public function update($cajaEstadocomprobante){
		$sql = 'UPDATE caja_estadocomprobante SET empid = ?, descripcion = ? WHERE idestadocomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaEstadocomprobante->empid);
		$sqlQuery->set($cajaEstadocomprobante->descripcion);

		$sqlQuery->setNumber($cajaEstadocomprobante->idestadocomprobante);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_estadocomprobante';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEmpid($value){
		$sql = 'SELECT * FROM caja_estadocomprobante WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM caja_estadocomprobante WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEmpid($value){
		$sql = 'DELETE FROM caja_estadocomprobante WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM caja_estadocomprobante WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaEstadocomprobanteMySql 
	 */
	protected function readRow($row){
		$cajaEstadocomprobante = new CajaEstadocomprobante();
		
		$cajaEstadocomprobante->idestadocomprobante = $row['idestadocomprobante'];
		$cajaEstadocomprobante->empid = $row['empid'];
		$cajaEstadocomprobante->descripcion = $row['descripcion'];

		return $cajaEstadocomprobante;
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
	 * @return CajaEstadocomprobanteMySql 
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