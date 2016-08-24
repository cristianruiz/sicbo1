<?php
/**
 * Class that operate on table 'hm_sociosmiembros'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 21:12
 */
class HmSociosmiembrosMySqlDAO implements HmSociosmiembrosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return HmSociosmiembrosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM hm_sociosmiembros WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM hm_sociosmiembros';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM hm_sociosmiembros ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param hmSociosmiembro primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM hm_sociosmiembros WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmSociosmiembrosMySql hmSociosmiembro
 	 */
	public function insert($hmSociosmiembro){
		$sql = 'INSERT INTO hm_sociosmiembros (rutproveedor, rutsociedad) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmSociosmiembro->rutproveedor);
		$sqlQuery->setNumber($hmSociosmiembro->rutsociedad);

		$id = $this->executeInsert($sqlQuery);	
		$hmSociosmiembro->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmSociosmiembrosMySql hmSociosmiembro
 	 */
	public function update($hmSociosmiembro){
		$sql = 'UPDATE hm_sociosmiembros SET rutproveedor = ?, rutsociedad = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($hmSociosmiembro->rutproveedor);
		$sqlQuery->setNumber($hmSociosmiembro->rutsociedad);

		$sqlQuery->setNumber($hmSociosmiembro->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM hm_sociosmiembros';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRutproveedor($value){
		$sql = 'SELECT * FROM hm_sociosmiembros WHERE rutproveedor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutsociedad($value){
		$sql = 'SELECT * FROM hm_sociosmiembros WHERE rutsociedad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRutproveedor($value){
		$sql = 'DELETE FROM hm_sociosmiembros WHERE rutproveedor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutsociedad($value){
		$sql = 'DELETE FROM hm_sociosmiembros WHERE rutsociedad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return HmSociosmiembrosMySql 
	 */
	protected function readRow($row){
		$hmSociosmiembro = new HmSociosmiembro();
		
		$hmSociosmiembro->id = $row['id'];
		$hmSociosmiembro->rutproveedor = $row['rutproveedor'];
		$hmSociosmiembro->rutsociedad = $row['rutsociedad'];

		return $hmSociosmiembro;
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
	 * @return HmSociosmiembrosMySql 
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