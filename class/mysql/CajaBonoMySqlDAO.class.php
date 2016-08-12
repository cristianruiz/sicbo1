<?php
/**
 * Class that operate on table 'caja_bono'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
class CajaBonoMySqlDAO implements CajaBonoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CajaBonoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM caja_bono WHERE idbono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM caja_bono';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM caja_bono ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cajaBono primary key
 	 */
	public function delete($idbono){
		$sql = 'DELETE FROM caja_bono WHERE idbono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idbono);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaBonoMySql cajaBono
 	 */
	public function insert($cajaBono){
		$sql = 'INSERT INTO caja_bono (numerobono, totalbonificacion, totalcopago, idcomprobantepago, bonoelectronico, beneficiario, emisor, financiador, empid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaBono->numerobono);
		$sqlQuery->setNumber($cajaBono->totalbonificacion);
		$sqlQuery->setNumber($cajaBono->totalcopago);
		$sqlQuery->setNumber($cajaBono->idcomprobantepago);
		$sqlQuery->set($cajaBono->bonoelectronico);
		$sqlQuery->set($cajaBono->beneficiario);
		$sqlQuery->set($cajaBono->emisor);
		$sqlQuery->setNumber($cajaBono->financiador);
		$sqlQuery->setNumber($cajaBono->empid);

		$id = $this->executeInsert($sqlQuery);	
		$cajaBono->idbono = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaBonoMySql cajaBono
 	 */
	public function update($cajaBono){
		$sql = 'UPDATE caja_bono SET numerobono = ?, totalbonificacion = ?, totalcopago = ?, idcomprobantepago = ?, bonoelectronico = ?, beneficiario = ?, emisor = ?, financiador = ?, empid = ? WHERE idbono = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cajaBono->numerobono);
		$sqlQuery->setNumber($cajaBono->totalbonificacion);
		$sqlQuery->setNumber($cajaBono->totalcopago);
		$sqlQuery->setNumber($cajaBono->idcomprobantepago);
		$sqlQuery->set($cajaBono->bonoelectronico);
		$sqlQuery->set($cajaBono->beneficiario);
		$sqlQuery->set($cajaBono->emisor);
		$sqlQuery->setNumber($cajaBono->financiador);
		$sqlQuery->setNumber($cajaBono->empid);

		$sqlQuery->setNumber($cajaBono->idbono);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM caja_bono';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNumerobono($value){
		$sql = 'SELECT * FROM caja_bono WHERE numerobono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotalbonificacion($value){
		$sql = 'SELECT * FROM caja_bono WHERE totalbonificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotalcopago($value){
		$sql = 'SELECT * FROM caja_bono WHERE totalcopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdcomprobantepago($value){
		$sql = 'SELECT * FROM caja_bono WHERE idcomprobantepago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBonoelectronico($value){
		$sql = 'SELECT * FROM caja_bono WHERE bonoelectronico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBeneficiario($value){
		$sql = 'SELECT * FROM caja_bono WHERE beneficiario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmisor($value){
		$sql = 'SELECT * FROM caja_bono WHERE emisor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFinanciador($value){
		$sql = 'SELECT * FROM caja_bono WHERE financiador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmpid($value){
		$sql = 'SELECT * FROM caja_bono WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNumerobono($value){
		$sql = 'DELETE FROM caja_bono WHERE numerobono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotalbonificacion($value){
		$sql = 'DELETE FROM caja_bono WHERE totalbonificacion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotalcopago($value){
		$sql = 'DELETE FROM caja_bono WHERE totalcopago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdcomprobantepago($value){
		$sql = 'DELETE FROM caja_bono WHERE idcomprobantepago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBonoelectronico($value){
		$sql = 'DELETE FROM caja_bono WHERE bonoelectronico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBeneficiario($value){
		$sql = 'DELETE FROM caja_bono WHERE beneficiario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmisor($value){
		$sql = 'DELETE FROM caja_bono WHERE emisor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFinanciador($value){
		$sql = 'DELETE FROM caja_bono WHERE financiador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmpid($value){
		$sql = 'DELETE FROM caja_bono WHERE empid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CajaBonoMySql 
	 */
	protected function readRow($row){
		$cajaBono = new CajaBono();
		
		$cajaBono->idbono = $row['idbono'];
		$cajaBono->numerobono = $row['numerobono'];
		$cajaBono->totalbonificacion = $row['totalbonificacion'];
		$cajaBono->totalcopago = $row['totalcopago'];
		$cajaBono->idcomprobantepago = $row['idcomprobantepago'];
		$cajaBono->bonoelectronico = $row['bonoelectronico'];
		$cajaBono->beneficiario = $row['beneficiario'];
		$cajaBono->emisor = $row['emisor'];
		$cajaBono->financiador = $row['financiador'];
		$cajaBono->empid = $row['empid'];

		return $cajaBono;
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
	 * @return CajaBonoMySql 
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