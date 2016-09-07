<?php
/**
 * Class that operate on table 'tar_conveniopaquete'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-07 17:12
 */
class TarConveniopaqueteMySqlDAO implements TarConveniopaqueteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TarConveniopaqueteMySql 
	 */
	public function load($idgrupopaquete, $idconvenio){
		$sql = 'SELECT * FROM tar_conveniopaquete WHERE idgrupopaquete = ?  AND idconvenio = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idgrupopaquete);
		$sqlQuery->setNumber($idconvenio);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tar_conveniopaquete';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tar_conveniopaquete ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tarConveniopaquete primary key
 	 */
	public function delete($idgrupopaquete, $idconvenio){
		$sql = 'DELETE FROM tar_conveniopaquete WHERE idgrupopaquete = ?  AND idconvenio = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idgrupopaquete);
		$sqlQuery->setNumber($idconvenio);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarConveniopaqueteMySql tarConveniopaquete
 	 */
	public function insert($tarConveniopaquete){
		$sql = 'INSERT INTO tar_conveniopaquete ( idgrupopaquete, idconvenio) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($tarConveniopaquete->idgrupopaquete);

		$sqlQuery->setNumber($tarConveniopaquete->idconvenio);

		$this->executeInsert($sqlQuery);	
		//$tarConveniopaquete->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarConveniopaqueteMySql tarConveniopaquete
 	 */
	public function update($tarConveniopaquete){
		$sql = 'UPDATE tar_conveniopaquete SET  WHERE idgrupopaquete = ?  AND idconvenio = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($tarConveniopaquete->idgrupopaquete);

		$sqlQuery->setNumber($tarConveniopaquete->idconvenio);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tar_conveniopaquete';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return TarConveniopaqueteMySql 
	 */
	protected function readRow($row){
		$tarConveniopaquete = new TarConveniopaquete();
		
		$tarConveniopaquete->idgrupopaquete = $row['idgrupopaquete'];
		$tarConveniopaquete->idconvenio = $row['idconvenio'];

		return $tarConveniopaquete;
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
	 * @return TarConveniopaqueteMySql 
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