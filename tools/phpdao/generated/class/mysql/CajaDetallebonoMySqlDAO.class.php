<?php
/**
 * Class that operate on table 'caja_detallebono'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 20:43
 */
class CajaDetallebonoMySqlDAO implements CajaDetallebonoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaDetallebonoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_detallebono WHERE iddetallebono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_detallebono';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_detallebono ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaDetallebono primary key
 	 */
	public function delete($iddetallebono){
		$sql = 'DELETE FROM caja_detallebono WHERE iddetallebono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetallebono);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaDetallebonoMySql cajaDetallebono
 	 */
	public function insert($cajaDetallebono){
		$sql = 'INSERT INTO caja_detallebono (codigo, cantidad, valortotal, bonificacion, idbono, complementario, copago, iddetalleservicios) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cajaDetallebono->codigo);
		$sqlQuery->setNumber($cajaDetallebono->cantidad);
		$sqlQuery->setNumber($cajaDetallebono->valortotal);
		$sqlQuery->setNumber($cajaDetallebono->bonificacion);
		$sqlQuery->setNumber($cajaDetallebono->idbono);
		$sqlQuery->setNumber($cajaDetallebono->complementario);
		$sqlQuery->setNumber($cajaDetallebono->copago);
		$sqlQuery->setNumber($cajaDetallebono->iddetalleservicios);

		$id = $this->executeInsert($sqlQuery);	
		$cajaDetallebono->iddetallebono = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaDetallebonoMySql cajaDetallebono
 	 */
	public function update($cajaDetallebono){
		$sql = 'UPDATE caja_detallebono SET codigo = ?, cantidad = ?, valortotal = ?, bonificacion = ?, idbono = ?, complementario = ?, copago = ?, iddetalleservicios = ? WHERE iddetallebono = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cajaDetallebono->codigo);
		$sqlQuery->setNumber($cajaDetallebono->cantidad);
		$sqlQuery->setNumber($cajaDetallebono->valortotal);
		$sqlQuery->setNumber($cajaDetallebono->bonificacion);
		$sqlQuery->setNumber($cajaDetallebono->idbono);
		$sqlQuery->setNumber($cajaDetallebono->complementario);
		$sqlQuery->setNumber($cajaDetallebono->copago);
		$sqlQuery->setNumber($cajaDetallebono->iddetalleservicios);

		$sqlQuery->setNumber($cajaDetallebono->iddetallebono);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_detallebono';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodigo($value){
		$sql = 'SELECT * FROM caja_detallebono WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM caja_detallebono WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValortotal($value){
		$sql = 'SELECT * FROM caja_detallebono WHERE valortotal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBonificacion($value){
		$sql = 'SELECT * FROM caja_detallebono WHERE bonificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdbono($value){
		$sql = 'SELECT * FROM caja_detallebono WHERE idbono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComplementario($value){
		$sql = 'SELECT * FROM caja_detallebono WHERE complementario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCopago($value){
		$sql = 'SELECT * FROM caja_detallebono WHERE copago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIddetalleservicios($value){
		$sql = 'SELECT * FROM caja_detallebono WHERE iddetalleservicios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodigo($value){
		$sql = 'DELETE FROM caja_detallebono WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidad($value){
		$sql = 'DELETE FROM caja_detallebono WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValortotal($value){
		$sql = 'DELETE FROM caja_detallebono WHERE valortotal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBonificacion($value){
		$sql = 'DELETE FROM caja_detallebono WHERE bonificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdbono($value){
		$sql = 'DELETE FROM caja_detallebono WHERE idbono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComplementario($value){
		$sql = 'DELETE FROM caja_detallebono WHERE complementario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCopago($value){
		$sql = 'DELETE FROM caja_detallebono WHERE copago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIddetalleservicios($value){
		$sql = 'DELETE FROM caja_detallebono WHERE iddetalleservicios = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaDetallebonoMySql 
	 */
	protected function readRow($row){
		$cajaDetallebono = new CajaDetallebono();
		
		$cajaDetallebono->iddetallebono = $row['iddetallebono'];
		$cajaDetallebono->codigo = $row['codigo'];
		$cajaDetallebono->cantidad = $row['cantidad'];
		$cajaDetallebono->valortotal = $row['valortotal'];
		$cajaDetallebono->bonificacion = $row['bonificacion'];
		$cajaDetallebono->idbono = $row['idbono'];
		$cajaDetallebono->complementario = $row['complementario'];
		$cajaDetallebono->copago = $row['copago'];
		$cajaDetallebono->iddetalleservicios = $row['iddetalleservicios'];

		return $cajaDetallebono;
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
	 * @return CajaDetallebonoMySql 
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