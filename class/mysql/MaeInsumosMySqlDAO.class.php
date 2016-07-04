<?php
/**
 * Class that operate on table 'mae_insumos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-07-04 22:59
 */
class MaeInsumosMySqlDAO implements MaeInsumosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeInsumosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_insumos WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_insumos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_insumos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeInsumo primary key
 	 */
	public function delete($codigoinsumo){
		$sql = 'DELETE FROM mae_insumos WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigoinsumo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeInsumosMySql maeInsumo
 	 */
	public function insert($maeInsumo){
		$sql = 'INSERT INTO mae_insumos (descripcion, idunidad, preciocompra, precioventa, precioultcompra, preciomaxcompra, fechaultcompra) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeInsumo->descripcion);
		$sqlQuery->setNumber($maeInsumo->idunidad);
		$sqlQuery->setNumber($maeInsumo->preciocompra);
		$sqlQuery->setNumber($maeInsumo->precioventa);
		$sqlQuery->setNumber($maeInsumo->precioultcompra);
		$sqlQuery->setNumber($maeInsumo->preciomaxcompra);
		$sqlQuery->set($maeInsumo->fechaultcompra);

		$id = $this->executeInsert($sqlQuery);	
		$maeInsumo->codigoinsumo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeInsumosMySql maeInsumo
 	 */
	public function update($maeInsumo){
		$sql = 'UPDATE mae_insumos SET descripcion = ?, idunidad = ?, preciocompra = ?, precioventa = ?, precioultcompra = ?, preciomaxcompra = ?, fechaultcompra = ? WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeInsumo->descripcion);
		$sqlQuery->setNumber($maeInsumo->idunidad);
		$sqlQuery->setNumber($maeInsumo->preciocompra);
		$sqlQuery->setNumber($maeInsumo->precioventa);
		$sqlQuery->setNumber($maeInsumo->precioultcompra);
		$sqlQuery->setNumber($maeInsumo->preciomaxcompra);
		$sqlQuery->set($maeInsumo->fechaultcompra);

		$sqlQuery->setNumber($maeInsumo->codigoinsumo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_insumos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_insumos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdunidad($value){
		$sql = 'SELECT * FROM mae_insumos WHERE idunidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciocompra($value){
		$sql = 'SELECT * FROM mae_insumos WHERE preciocompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioventa($value){
		$sql = 'SELECT * FROM mae_insumos WHERE precioventa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecioultcompra($value){
		$sql = 'SELECT * FROM mae_insumos WHERE precioultcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciomaxcompra($value){
		$sql = 'SELECT * FROM mae_insumos WHERE preciomaxcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaultcompra($value){
		$sql = 'SELECT * FROM mae_insumos WHERE fechaultcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_insumos WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdunidad($value){
		$sql = 'DELETE FROM mae_insumos WHERE idunidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciocompra($value){
		$sql = 'DELETE FROM mae_insumos WHERE preciocompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioventa($value){
		$sql = 'DELETE FROM mae_insumos WHERE precioventa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecioultcompra($value){
		$sql = 'DELETE FROM mae_insumos WHERE precioultcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciomaxcompra($value){
		$sql = 'DELETE FROM mae_insumos WHERE preciomaxcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaultcompra($value){
		$sql = 'DELETE FROM mae_insumos WHERE fechaultcompra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeInsumosMySql 
	 */
	protected function readRow($row){
		$maeInsumo = new MaeInsumo();
		
		$maeInsumo->codigoinsumo = $row['codigoinsumo'];
		$maeInsumo->descripcion = $row['descripcion'];
		$maeInsumo->idunidad = $row['idunidad'];
		$maeInsumo->preciocompra = $row['preciocompra'];
		$maeInsumo->precioventa = $row['precioventa'];
		$maeInsumo->precioultcompra = $row['precioultcompra'];
		$maeInsumo->preciomaxcompra = $row['preciomaxcompra'];
		$maeInsumo->fechaultcompra = $row['fechaultcompra'];

		return $maeInsumo;
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
	 * @return MaeInsumosMySql 
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