<?php
/**
 * Class that operate on table 'mae_personal'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
class MaePersonalMySqlDAO implements MaePersonalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaePersonalMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM mae_personal WHERE rutpersonal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM mae_personal';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM mae_personal ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param maePersonal primary key
 	 */
	public function delete($rutpersonal){
		$sql = 'DELETE FROM mae_personal WHERE rutpersonal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($rutpersonal);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaePersonalMySql maePersonal
 	 */
	public function insert($maePersonal){
		$sql = 'INSERT INTO mae_personal (nombre, iddepartamento, idcargo, clave, vigente) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maePersonal->nombre);
		$sqlQuery->setNumber($maePersonal->iddepartamento);
		$sqlQuery->setNumber($maePersonal->idcargo);
		$sqlQuery->set($maePersonal->clave);
		$sqlQuery->set($maePersonal->vigente);

		$id = $this->executeInsert($sqlQuery);	
		$maePersonal->rutpersonal = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaePersonalMySql maePersonal
 	 */
	public function update($maePersonal){
		$sql = 'UPDATE mae_personal SET nombre = ?, iddepartamento = ?, idcargo = ?, clave = ?, vigente = ? WHERE rutpersonal = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($maePersonal->nombre);
		$sqlQuery->setNumber($maePersonal->iddepartamento);
		$sqlQuery->setNumber($maePersonal->idcargo);
		$sqlQuery->set($maePersonal->clave);
		$sqlQuery->set($maePersonal->vigente);

		$sqlQuery->setNumber($maePersonal->rutpersonal);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM mae_personal';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNombre($value){
		$sql = 'SELECT * FROM mae_personal WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIddepartamento($value){
		$sql = 'SELECT * FROM mae_personal WHERE iddepartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdcargo($value){
		$sql = 'SELECT * FROM mae_personal WHERE idcargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClave($value){
		$sql = 'SELECT * FROM mae_personal WHERE clave = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVigente($value){
		$sql = 'SELECT * FROM mae_personal WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNombre($value){
		$sql = 'DELETE FROM mae_personal WHERE nombre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIddepartamento($value){
		$sql = 'DELETE FROM mae_personal WHERE iddepartamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdcargo($value){
		$sql = 'DELETE FROM mae_personal WHERE idcargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClave($value){
		$sql = 'DELETE FROM mae_personal WHERE clave = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVigente($value){
		$sql = 'DELETE FROM mae_personal WHERE vigente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaePersonalMySql 
	 */
	protected function readRow($row){
		$maePersonal = new MaePersonal();
		
		$maePersonal->rutpersonal = $row['rutpersonal'];
		$maePersonal->nombre = $row['nombre'];
		$maePersonal->iddepartamento = $row['iddepartamento'];
		$maePersonal->idcargo = $row['idcargo'];
		$maePersonal->clave = $row['clave'];
		$maePersonal->vigente = $row['vigente'];

		return $maePersonal;
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
	 * @return MaePersonalMySql 
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