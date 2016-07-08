<?php
/**
 * Class that operate on table 'caja_tipocomprobante'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 20:53
 */
class CajaTipocomprobanteMySqlDAO implements CajaTipocomprobanteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaTipocomprobanteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_tipocomprobante WHERE idtipocomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_tipocomprobante';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_tipocomprobante ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaTipocomprobante primary key
 	 */
	public function delete($idtipocomprobante){
		$sql = 'DELETE FROM caja_tipocomprobante WHERE idtipocomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idtipocomprobante);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaTipocomprobanteMySql cajaTipocomprobante
 	 */
	public function insert($cajaTipocomprobante){
		$sql = 'INSERT INTO caja_tipocomprobante (descripcion) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cajaTipocomprobante->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$cajaTipocomprobante->idtipocomprobante = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaTipocomprobanteMySql cajaTipocomprobante
 	 */
	public function update($cajaTipocomprobante){
		$sql = 'UPDATE caja_tipocomprobante SET descripcion = ? WHERE idtipocomprobante = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cajaTipocomprobante->descripcion);

		$sqlQuery->setNumber($cajaTipocomprobante->idtipocomprobante);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_tipocomprobante';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM caja_tipocomprobante WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM caja_tipocomprobante WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaTipocomprobanteMySql 
	 */
	protected function readRow($row){
		$cajaTipocomprobante = new CajaTipocomprobante();
		
		$cajaTipocomprobante->idtipocomprobante = $row['idtipocomprobante'];
		$cajaTipocomprobante->descripcion = $row['descripcion'];

		return $cajaTipocomprobante;
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
	 * @return CajaTipocomprobanteMySql 
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