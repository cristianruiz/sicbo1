<?php
/**
 * Class that operate on table 'caja_detalleboleta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 20:43
 */
class CajaDetalleboletaMySqlDAO implements CajaDetalleboletaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaDetalleboletaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_detalleboleta WHERE iddetalleboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_detalleboleta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_detalleboleta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaDetalleboleta primary key
 	 */
	public function delete($iddetalleboleta){
		$sql = 'DELETE FROM caja_detalleboleta WHERE iddetalleboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetalleboleta);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaDetalleboletaMySql cajaDetalleboleta
 	 */
	public function insert($cajaDetalleboleta){
		$sql = 'INSERT INTO caja_detalleboleta (codigodetalle, glosa, cantidad, preciounitario, numeroboleta) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaDetalleboleta->codigodetalle);
		$sqlQuery->set($cajaDetalleboleta->glosa);
		$sqlQuery->setNumber($cajaDetalleboleta->cantidad);
		$sqlQuery->setNumber($cajaDetalleboleta->preciounitario);
		$sqlQuery->setNumber($cajaDetalleboleta->numeroboleta);

		$id = $this->executeInsert($sqlQuery);	
		$cajaDetalleboleta->iddetalleboleta = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaDetalleboletaMySql cajaDetalleboleta
 	 */
	public function update($cajaDetalleboleta){
		$sql = 'UPDATE caja_detalleboleta SET codigodetalle = ?, glosa = ?, cantidad = ?, preciounitario = ?, numeroboleta = ? WHERE iddetalleboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaDetalleboleta->codigodetalle);
		$sqlQuery->set($cajaDetalleboleta->glosa);
		$sqlQuery->setNumber($cajaDetalleboleta->cantidad);
		$sqlQuery->setNumber($cajaDetalleboleta->preciounitario);
		$sqlQuery->setNumber($cajaDetalleboleta->numeroboleta);

		$sqlQuery->setNumber($cajaDetalleboleta->iddetalleboleta);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_detalleboleta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigodetalle($value){
		$sql = 'SELECT * FROM caja_detalleboleta WHERE codigodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGlosa($value){
		$sql = 'SELECT * FROM caja_detalleboleta WHERE glosa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM caja_detalleboleta WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreciounitario($value){
		$sql = 'SELECT * FROM caja_detalleboleta WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumeroboleta($value){
		$sql = 'SELECT * FROM caja_detalleboleta WHERE numeroboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigodetalle($value){
		$sql = 'DELETE FROM caja_detalleboleta WHERE codigodetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGlosa($value){
		$sql = 'DELETE FROM caja_detalleboleta WHERE glosa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidad($value){
		$sql = 'DELETE FROM caja_detalleboleta WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreciounitario($value){
		$sql = 'DELETE FROM caja_detalleboleta WHERE preciounitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumeroboleta($value){
		$sql = 'DELETE FROM caja_detalleboleta WHERE numeroboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaDetalleboletaMySql 
	 */
	protected function readRow($row){
		$cajaDetalleboleta = new CajaDetalleboleta();
		
		$cajaDetalleboleta->iddetalleboleta = $row['iddetalleboleta'];
		$cajaDetalleboleta->codigodetalle = $row['codigodetalle'];
		$cajaDetalleboleta->glosa = $row['glosa'];
		$cajaDetalleboleta->cantidad = $row['cantidad'];
		$cajaDetalleboleta->preciounitario = $row['preciounitario'];
		$cajaDetalleboleta->numeroboleta = $row['numeroboleta'];

		return $cajaDetalleboleta;
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
	 * @return CajaDetalleboletaMySql 
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