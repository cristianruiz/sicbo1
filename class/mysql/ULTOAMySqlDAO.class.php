<?php
/**
 * Class that operate on table 'ULT_OA'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
class ULTOAMySqlDAO implements ULTOADAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ULTOAMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ULT_OA WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ULT_OA';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ULT_OA ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uLTOA primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM ULT_OA WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ULTOAMySql uLTOA
 	 */
	public function insert($uLTOA){
		$sql = 'INSERT INTO ULT_OA (ADM, SEC, MES, ANO, NUMERO) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uLTOA->aDM);
		$sqlQuery->setNumber($uLTOA->sEC);
		$sqlQuery->setNumber($uLTOA->mES);
		$sqlQuery->setNumber($uLTOA->aNO);
		$sqlQuery->setNumber($uLTOA->nUMERO);

		$id = $this->executeInsert($sqlQuery);	
		$uLTOA->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ULTOAMySql uLTOA
 	 */
	public function update($uLTOA){
		$sql = 'UPDATE ULT_OA SET ADM = ?, SEC = ?, MES = ?, ANO = ?, NUMERO = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uLTOA->aDM);
		$sqlQuery->setNumber($uLTOA->sEC);
		$sqlQuery->setNumber($uLTOA->mES);
		$sqlQuery->setNumber($uLTOA->aNO);
		$sqlQuery->setNumber($uLTOA->nUMERO);

		$sqlQuery->setNumber($uLTOA->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ULT_OA';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByADM($value){
		$sql = 'SELECT * FROM ULT_OA WHERE ADM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySEC($value){
		$sql = 'SELECT * FROM ULT_OA WHERE SEC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMES($value){
		$sql = 'SELECT * FROM ULT_OA WHERE MES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByANO($value){
		$sql = 'SELECT * FROM ULT_OA WHERE ANO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNUMERO($value){
		$sql = 'SELECT * FROM ULT_OA WHERE NUMERO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByADM($value){
		$sql = 'DELETE FROM ULT_OA WHERE ADM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySEC($value){
		$sql = 'DELETE FROM ULT_OA WHERE SEC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMES($value){
		$sql = 'DELETE FROM ULT_OA WHERE MES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByANO($value){
		$sql = 'DELETE FROM ULT_OA WHERE ANO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNUMERO($value){
		$sql = 'DELETE FROM ULT_OA WHERE NUMERO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ULTOAMySql 
	 */
	protected function readRow($row){
		$uLTOA = new ULTOA();
		
		$uLTOA->aDM = $row['ADM'];
		$uLTOA->sEC = $row['SEC'];
		$uLTOA->mES = $row['MES'];
		$uLTOA->aNO = $row['ANO'];
		$uLTOA->nUMERO = $row['NUMERO'];
		$uLTOA->id = $row['id'];

		return $uLTOA;
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
	 * @return ULTOAMySql 
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