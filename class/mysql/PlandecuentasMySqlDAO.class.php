<?php
/**
 * Class that operate on table 'plandecuentas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-07-04 22:59
 */
class PlandecuentasMySqlDAO implements PlandecuentasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PlandecuentasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM plandecuentas WHERE idplandecuentas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM plandecuentas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM plandecuentas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param plandecuenta primary key
 	 */
	public function delete($idplandecuentas){
		$sql = 'DELETE FROM plandecuentas WHERE idplandecuentas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idplandecuentas);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PlandecuentasMySql plandecuenta
 	 */
	public function insert($plandecuenta){
		$sql = 'INSERT INTO plandecuentas (plandecuentascol) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($plandecuenta->plandecuentascol);

		$id = $this->executeInsert($sqlQuery);	
		$plandecuenta->idplandecuentas = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PlandecuentasMySql plandecuenta
 	 */
	public function update($plandecuenta){
		$sql = 'UPDATE plandecuentas SET plandecuentascol = ? WHERE idplandecuentas = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($plandecuenta->plandecuentascol);

		$sqlQuery->setNumber($plandecuenta->idplandecuentas);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM plandecuentas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPlandecuentascol($value){
		$sql = 'SELECT * FROM plandecuentas WHERE plandecuentascol = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPlandecuentascol($value){
		$sql = 'DELETE FROM plandecuentas WHERE plandecuentascol = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PlandecuentasMySql 
	 */
	protected function readRow($row){
		$plandecuenta = new Plandecuenta();
		
		$plandecuenta->idplandecuentas = $row['idplandecuentas'];
		$plandecuenta->plandecuentascol = $row['plandecuentascol'];

		return $plandecuenta;
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
	 * @return PlandecuentasMySql 
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