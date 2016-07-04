<?php
/**
 * Class that operate on table 'mae_bancos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-07-04 22:59
 */
class MaeBancosMySqlDAO implements MaeBancosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeBancosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_bancos WHERE idbanco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_bancos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_bancos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeBanco primary key
 	 */
	public function delete($idbanco){
		$sql = 'DELETE FROM mae_bancos WHERE idbanco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idbanco);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeBancosMySql maeBanco
 	 */
	public function insert($maeBanco){
		$sql = 'INSERT INTO mae_bancos (nombrebanco, abreviatura) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeBanco->nombrebanco);
		$sqlQuery->set($maeBanco->abreviatura);

		$id = $this->executeInsert($sqlQuery);	
		$maeBanco->idbanco = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeBancosMySql maeBanco
 	 */
	public function update($maeBanco){
		$sql = 'UPDATE mae_bancos SET nombrebanco = ?, abreviatura = ? WHERE idbanco = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maeBanco->nombrebanco);
		$sqlQuery->set($maeBanco->abreviatura);

		$sqlQuery->setNumber($maeBanco->idbanco);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_bancos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombrebanco($value){
		$sql = 'SELECT * FROM mae_bancos WHERE nombrebanco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbreviatura($value){
		$sql = 'SELECT * FROM mae_bancos WHERE abreviatura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombrebanco($value){
		$sql = 'DELETE FROM mae_bancos WHERE nombrebanco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbreviatura($value){
		$sql = 'DELETE FROM mae_bancos WHERE abreviatura = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeBancosMySql 
	 */
	protected function readRow($row){
		$maeBanco = new MaeBanco();
		
		$maeBanco->nombrebanco = $row['nombrebanco'];
		$maeBanco->abreviatura = $row['abreviatura'];
		$maeBanco->idbanco = $row['idbanco'];

		return $maeBanco;
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
	 * @return MaeBancosMySql 
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