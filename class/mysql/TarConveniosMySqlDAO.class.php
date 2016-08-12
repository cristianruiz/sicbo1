<?php
/**
 * Class that operate on table 'tar_convenios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
class TarConveniosMySqlDAO implements TarConveniosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TarConveniosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tar_convenios WHERE idconvenio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tar_convenios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tar_convenios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tarConvenio primary key
 	 */
	public function delete($idconvenio){
		$sql = 'DELETE FROM tar_convenios WHERE idconvenio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idconvenio);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarConveniosMySql tarConvenio
 	 */
	public function insert($tarConvenio){
		$sql = 'INSERT INTO tar_convenios (descripcion, vigente, fechainicio, fechatermino, rutfinanciador) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tarConvenio->descripcion);
		$sqlQuery->set($tarConvenio->vigente);
		$sqlQuery->set($tarConvenio->fechainicio);
		$sqlQuery->set($tarConvenio->fechatermino);
		$sqlQuery->setNumber($tarConvenio->rutfinanciador);

		$id = $this->executeInsert($sqlQuery);	
		$tarConvenio->idconvenio = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarConveniosMySql tarConvenio
 	 */
	public function update($tarConvenio){
		$sql = 'UPDATE tar_convenios SET descripcion = ?, vigente = ?, fechainicio = ?, fechatermino = ?, rutfinanciador = ? WHERE idconvenio = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tarConvenio->descripcion);
		$sqlQuery->set($tarConvenio->vigente);
		$sqlQuery->set($tarConvenio->fechainicio);
		$sqlQuery->set($tarConvenio->fechatermino);
		$sqlQuery->setNumber($tarConvenio->rutfinanciador);

		$sqlQuery->setNumber($tarConvenio->idconvenio);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tar_convenios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM tar_convenios WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM tar_convenios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechainicio($value){
		$sql = 'SELECT * FROM tar_convenios WHERE fechainicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechatermino($value){
		$sql = 'SELECT * FROM tar_convenios WHERE fechatermino = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRutfinanciador($value){
		$sql = 'SELECT * FROM tar_convenios WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM tar_convenios WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM tar_convenios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechainicio($value){
		$sql = 'DELETE FROM tar_convenios WHERE fechainicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechatermino($value){
		$sql = 'DELETE FROM tar_convenios WHERE fechatermino = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRutfinanciador($value){
		$sql = 'DELETE FROM tar_convenios WHERE rutfinanciador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TarConveniosMySql 
	 */
	protected function readRow($row){
		$tarConvenio = new TarConvenio();
		
		$tarConvenio->idconvenio = $row['idconvenio'];
		$tarConvenio->descripcion = $row['descripcion'];
		$tarConvenio->vigente = $row['vigente'];
		$tarConvenio->fechainicio = $row['fechainicio'];
		$tarConvenio->fechatermino = $row['fechatermino'];
		$tarConvenio->rutfinanciador = $row['rutfinanciador'];

		return $tarConvenio;
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
	 * @return TarConveniosMySql 
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