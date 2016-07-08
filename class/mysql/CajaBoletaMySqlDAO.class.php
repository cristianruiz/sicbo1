<?php
/**
 * Class that operate on table 'caja_boleta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 20:53
 */
class CajaBoletaMySqlDAO implements CajaBoletaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaBoletaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_boleta WHERE numeroboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_boleta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_boleta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaBoleta primary key
 	 */
	public function delete($numeroboleta){
		$sql = 'DELETE FROM caja_boleta WHERE numeroboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($numeroboleta);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaBoletaMySql cajaBoleta
 	 */
	public function insert($cajaBoleta){
		$sql = 'INSERT INTO caja_boleta (totalboleta, iddocumentopago, idestadoboleta, rutcliente, fecha, empid) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaBoleta->totalboleta);
		$sqlQuery->setNumber($cajaBoleta->iddocumentopago);
		$sqlQuery->setNumber($cajaBoleta->idestadoboleta);
		$sqlQuery->setNumber($cajaBoleta->rutcliente);
		$sqlQuery->set($cajaBoleta->fecha);
		$sqlQuery->setNumber($cajaBoleta->empid);

		$id = $this->executeInsert($sqlQuery);	
		$cajaBoleta->numeroboleta = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaBoletaMySql cajaBoleta
 	 */
	public function update($cajaBoleta){
		$sql = 'UPDATE caja_boleta SET totalboleta = ?, iddocumentopago = ?, idestadoboleta = ?, rutcliente = ?, fecha = ?, empid = ? WHERE numeroboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaBoleta->totalboleta);
		$sqlQuery->setNumber($cajaBoleta->iddocumentopago);
		$sqlQuery->setNumber($cajaBoleta->idestadoboleta);
		$sqlQuery->setNumber($cajaBoleta->rutcliente);
		$sqlQuery->set($cajaBoleta->fecha);
		$sqlQuery->setNumber($cajaBoleta->empid);

		$sqlQuery->setNumber($cajaBoleta->numeroboleta);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_boleta';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTotalboleta($value){
		$sql = 'SELECT * FROM caja_boleta WHERE totalboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIddocumentopago($value){
		$sql = 'SELECT * FROM caja_boleta WHERE iddocumentopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdestadoboleta($value){
		$sql = 'SELECT * FROM caja_boleta WHERE idestadoboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutcliente($value){
		$sql = 'SELECT * FROM caja_boleta WHERE rutcliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM caja_boleta WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmpid($value){
		$sql = 'SELECT * FROM caja_boleta WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTotalboleta($value){
		$sql = 'DELETE FROM caja_boleta WHERE totalboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIddocumentopago($value){
		$sql = 'DELETE FROM caja_boleta WHERE iddocumentopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdestadoboleta($value){
		$sql = 'DELETE FROM caja_boleta WHERE idestadoboleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutcliente($value){
		$sql = 'DELETE FROM caja_boleta WHERE rutcliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM caja_boleta WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmpid($value){
		$sql = 'DELETE FROM caja_boleta WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaBoletaMySql 
	 */
	protected function readRow($row){
		$cajaBoleta = new CajaBoleta();
		
		$cajaBoleta->numeroboleta = $row['numeroboleta'];
		$cajaBoleta->totalboleta = $row['totalboleta'];
		$cajaBoleta->iddocumentopago = $row['iddocumentopago'];
		$cajaBoleta->idestadoboleta = $row['idestadoboleta'];
		$cajaBoleta->rutcliente = $row['rutcliente'];
		$cajaBoleta->fecha = $row['fecha'];
		$cajaBoleta->empid = $row['empid'];

		return $cajaBoleta;
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
	 * @return CajaBoletaMySql 
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