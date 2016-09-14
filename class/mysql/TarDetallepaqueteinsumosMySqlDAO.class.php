<?php
/**
 * Class that operate on table 'tar_detallepaqueteinsumos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class TarDetallepaqueteinsumosMySqlDAO implements TarDetallepaqueteinsumosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TarDetallepaqueteinsumosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos WHERE iddetallepaqueteinsumos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tarDetallepaqueteinsumo primary key
 	 */
	public function delete($iddetallepaqueteinsumos){
		$sql = 'DELETE FROM tar_detallepaqueteinsumos WHERE iddetallepaqueteinsumos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddetallepaqueteinsumos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarDetallepaqueteinsumosMySql tarDetallepaqueteinsumo
 	 */
	public function insert($tarDetallepaqueteinsumo){
		$sql = 'INSERT INTO tar_detallepaqueteinsumos (cantidad, monto, vigente, codigoinsumo, idgrupopaquete, codigoseccion) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->cantidad);
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->monto);
		$sqlQuery->set($tarDetallepaqueteinsumo->vigente);
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->codigoinsumo);
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->idgrupopaquete);
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->codigoseccion);

		$id = $this->executeInsert($sqlQuery);	
		$tarDetallepaqueteinsumo->iddetallepaqueteinsumos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarDetallepaqueteinsumosMySql tarDetallepaqueteinsumo
 	 */
	public function update($tarDetallepaqueteinsumo){
		$sql = 'UPDATE tar_detallepaqueteinsumos SET cantidad = ?, monto = ?, vigente = ?, codigoinsumo = ?, idgrupopaquete = ?, codigoseccion = ? WHERE iddetallepaqueteinsumos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->cantidad);
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->monto);
		$sqlQuery->set($tarDetallepaqueteinsumo->vigente);
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->codigoinsumo);
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->idgrupopaquete);
		$sqlQuery->setNumber($tarDetallepaqueteinsumo->codigoseccion);

		$sqlQuery->setNumber($tarDetallepaqueteinsumo->iddetallepaqueteinsumos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tar_detallepaqueteinsumos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMonto($value){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoinsumo($value){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdgrupopaquete($value){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos WHERE idgrupopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigoseccion($value){
		$sql = 'SELECT * FROM tar_detallepaqueteinsumos WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCantidad($value){
		$sql = 'DELETE FROM tar_detallepaqueteinsumos WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMonto($value){
		$sql = 'DELETE FROM tar_detallepaqueteinsumos WHERE monto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM tar_detallepaqueteinsumos WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoinsumo($value){
		$sql = 'DELETE FROM tar_detallepaqueteinsumos WHERE codigoinsumo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdgrupopaquete($value){
		$sql = 'DELETE FROM tar_detallepaqueteinsumos WHERE idgrupopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigoseccion($value){
		$sql = 'DELETE FROM tar_detallepaqueteinsumos WHERE codigoseccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TarDetallepaqueteinsumosMySql 
	 */
	protected function readRow($row){
		$tarDetallepaqueteinsumo = new TarDetallepaqueteinsumo();
		
		$tarDetallepaqueteinsumo->iddetallepaqueteinsumos = $row['iddetallepaqueteinsumos'];
		$tarDetallepaqueteinsumo->cantidad = $row['cantidad'];
		$tarDetallepaqueteinsumo->monto = $row['monto'];
		$tarDetallepaqueteinsumo->vigente = $row['vigente'];
		$tarDetallepaqueteinsumo->codigoinsumo = $row['codigoinsumo'];
		$tarDetallepaqueteinsumo->idgrupopaquete = $row['idgrupopaquete'];
		$tarDetallepaqueteinsumo->codigoseccion = $row['codigoseccion'];

		return $tarDetallepaqueteinsumo;
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
	 * @return TarDetallepaqueteinsumosMySql 
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