<?php
/**
 * Class that operate on table 'mae_insumos2'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-07 17:12
 */
class MaeInsumos2MySqlDAO implements MaeInsumos2DAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeInsumos2MySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_insumos2 WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_insumos2';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_insumos2 ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeInsumos2 primary key
 	 */
	public function delete($codigoinsumo){
		$sql = 'DELETE FROM mae_insumos2 WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigoinsumo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeInsumos2MySql maeInsumos2
 	 */
	public function insert($maeInsumos2){
		$sql = 'INSERT INTO mae_insumos2 (descripcion, idunidad, preciocompra, precioventa, precioultcompra, preciomaxcompra, fechaultcompra) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeInsumos2->descripcion);
		$sqlQuery->setNumber($maeInsumos2->idunidad);
		$sqlQuery->setNumber($maeInsumos2->preciocompra);
		$sqlQuery->setNumber($maeInsumos2->precioventa);
		$sqlQuery->setNumber($maeInsumos2->precioultcompra);
		$sqlQuery->setNumber($maeInsumos2->preciomaxcompra);
		$sqlQuery->set($maeInsumos2->fechaultcompra);

		$id = $this->executeInsert($sqlQuery);	
		$maeInsumos2->codigoinsumo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeInsumos2MySql maeInsumos2
 	 */
	public function update($maeInsumos2){
		$sql = 'UPDATE mae_insumos2 SET descripcion = ?, idunidad = ?, preciocompra = ?, precioventa = ?, precioultcompra = ?, preciomaxcompra = ?, fechaultcompra = ? WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeInsumos2->descripcion);
		$sqlQuery->setNumber($maeInsumos2->idunidad);
		$sqlQuery->setNumber($maeInsumos2->preciocompra);
		$sqlQuery->setNumber($maeInsumos2->precioventa);
		$sqlQuery->setNumber($maeInsumos2->precioultcompra);
		$sqlQuery->setNumber($maeInsumos2->preciomaxcompra);
		$sqlQuery->set($maeInsumos2->fechaultcompra);

		$sqlQuery->setNumber($maeInsumos2->codigoinsumo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_insumos2';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_insumos2 WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdunidad($value){
		$sql = 'SELECT * FROM mae_insumos2 WHERE idunidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciocompra($value){
		$sql = 'SELECT * FROM mae_insumos2 WHERE preciocompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioventa($value){
		$sql = 'SELECT * FROM mae_insumos2 WHERE precioventa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioultcompra($value){
		$sql = 'SELECT * FROM mae_insumos2 WHERE precioultcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciomaxcompra($value){
		$sql = 'SELECT * FROM mae_insumos2 WHERE preciomaxcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaultcompra($value){
		$sql = 'SELECT * FROM mae_insumos2 WHERE fechaultcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_insumos2 WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdunidad($value){
		$sql = 'DELETE FROM mae_insumos2 WHERE idunidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciocompra($value){
		$sql = 'DELETE FROM mae_insumos2 WHERE preciocompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioventa($value){
		$sql = 'DELETE FROM mae_insumos2 WHERE precioventa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioultcompra($value){
		$sql = 'DELETE FROM mae_insumos2 WHERE precioultcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciomaxcompra($value){
		$sql = 'DELETE FROM mae_insumos2 WHERE preciomaxcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaultcompra($value){
		$sql = 'DELETE FROM mae_insumos2 WHERE fechaultcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeInsumos2MySql 
	 */
	protected function readRow($row){
		$maeInsumos2 = new MaeInsumos2();
		
		$maeInsumos2->codigoinsumo = $row['codigoinsumo'];
		$maeInsumos2->descripcion = $row['descripcion'];
		$maeInsumos2->idunidad = $row['idunidad'];
		$maeInsumos2->preciocompra = $row['preciocompra'];
		$maeInsumos2->precioventa = $row['precioventa'];
		$maeInsumos2->precioultcompra = $row['precioultcompra'];
		$maeInsumos2->preciomaxcompra = $row['preciomaxcompra'];
		$maeInsumos2->fechaultcompra = $row['fechaultcompra'];

		return $maeInsumos2;
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
	 * @return MaeInsumos2MySql 
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