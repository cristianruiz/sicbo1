<?php
/**
 * Class that operate on table 'tar_grupopaquete'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 17:04
 */
class TarGrupopaqueteMySqlDAO implements TarGrupopaqueteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TarGrupopaqueteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tar_grupopaquete WHERE idgrupopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tar_grupopaquete';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tar_grupopaquete ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tarGrupopaquete primary key
 	 */
	public function delete($idgrupopaquete){
		$sql = 'DELETE FROM tar_grupopaquete WHERE idgrupopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idgrupopaquete);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarGrupopaqueteMySql tarGrupopaquete
 	 */
	public function insert($tarGrupopaquete){
		$sql = 'INSERT INTO tar_grupopaquete (descripcion, idsubgrupo, idpaquete) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tarGrupopaquete->descripcion);
		$sqlQuery->setNumber($tarGrupopaquete->idsubgrupo);
		$sqlQuery->setNumber($tarGrupopaquete->idpaquete);

		$id = $this->executeInsert($sqlQuery);	
		$tarGrupopaquete->idgrupopaquete = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarGrupopaqueteMySql tarGrupopaquete
 	 */
	public function update($tarGrupopaquete){
		$sql = 'UPDATE tar_grupopaquete SET descripcion = ?, idsubgrupo = ?, idpaquete = ? WHERE idgrupopaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tarGrupopaquete->descripcion);
		$sqlQuery->setNumber($tarGrupopaquete->idsubgrupo);
		$sqlQuery->setNumber($tarGrupopaquete->idpaquete);

		$sqlQuery->setNumber($tarGrupopaquete->idgrupopaquete);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tar_grupopaquete';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM tar_grupopaquete WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdsubgrupo($value){
		$sql = 'SELECT * FROM tar_grupopaquete WHERE idsubgrupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdpaquete($value){
		$sql = 'SELECT * FROM tar_grupopaquete WHERE idpaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM tar_grupopaquete WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdsubgrupo($value){
		$sql = 'DELETE FROM tar_grupopaquete WHERE idsubgrupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdpaquete($value){
		$sql = 'DELETE FROM tar_grupopaquete WHERE idpaquete = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TarGrupopaqueteMySql 
	 */
	protected function readRow($row){
		$tarGrupopaquete = new TarGrupopaquete();
		
		$tarGrupopaquete->idgrupopaquete = $row['idgrupopaquete'];
		$tarGrupopaquete->descripcion = $row['descripcion'];
		$tarGrupopaquete->idsubgrupo = $row['idsubgrupo'];
		$tarGrupopaquete->idpaquete = $row['idpaquete'];

		return $tarGrupopaquete;
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
	 * @return TarGrupopaqueteMySql 
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