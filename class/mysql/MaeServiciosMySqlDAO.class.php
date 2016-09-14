<?php
/**
 * Class that operate on table 'mae_servicios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
class MaeServiciosMySqlDAO implements MaeServiciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaeServiciosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_servicios WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_servicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_servicios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maeServicio primary key
 	 */
	public function delete($codigoservicio){
		$sql = 'DELETE FROM mae_servicios WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigoservicio);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeServiciosMySql maeServicio
 	 */
	public function insert($maeServicio){
		$sql = 'INSERT INTO mae_servicios (grupo, descripcion, vigente, codigofonasa) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($maeServicio->grupo);
		$sqlQuery->set($maeServicio->descripcion);
		$sqlQuery->setNumber($maeServicio->vigente);
		$sqlQuery->setNumber($maeServicio->codigofonasa);

		$id = $this->executeInsert($sqlQuery);	
		$maeServicio->codigoservicio = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeServiciosMySql maeServicio
 	 */
	public function update($maeServicio){
		$sql = 'UPDATE mae_servicios SET grupo = ?, descripcion = ?, vigente = ?, codigofonasa = ? WHERE codigoservicio = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($maeServicio->grupo);
		$sqlQuery->set($maeServicio->descripcion);
		$sqlQuery->setNumber($maeServicio->vigente);
		$sqlQuery->setNumber($maeServicio->codigofonasa);

		$sqlQuery->setNumber($maeServicio->codigoservicio);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_servicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGrupo($value){
		$sql = 'SELECT * FROM mae_servicios WHERE grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM mae_servicios WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM mae_servicios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCodigofonasa($value){
		$sql = 'SELECT * FROM mae_servicios WHERE codigofonasa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGrupo($value){
		$sql = 'DELETE FROM mae_servicios WHERE grupo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM mae_servicios WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM mae_servicios WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCodigofonasa($value){
		$sql = 'DELETE FROM mae_servicios WHERE codigofonasa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaeServiciosMySql 
	 */
	protected function readRow($row){
		$maeServicio = new MaeServicio();
		
		$maeServicio->codigoservicio = $row['codigoservicio'];
		$maeServicio->grupo = $row['grupo'];
		$maeServicio->descripcion = $row['descripcion'];
		$maeServicio->vigente = $row['vigente'];
		$maeServicio->codigofonasa = $row['codigofonasa'];

		return $maeServicio;
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
	 * @return MaeServiciosMySql 
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