<?php
/**
 * Class that operate on table 'detallecargo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-06-07 11:15
 */
class DetallecargoMySqlDAO implements DetallecargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DetallecargoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM detallecargo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM detallecargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM detallecargo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param detallecargo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM detallecargo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DetallecargoMySql detallecargo
 	 */
	public function insert($detallecargo){
		$sql = 'INSERT INTO detallecargo (C_SECCION, NRO_OA, PERIODO, COD_DET, TIPO_DET, P_UNIT, CANT_ENT, REC, FOLIO_OA) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($detallecargo->cSECCION);
		$sqlQuery->setNumber($detallecargo->nROOA);
		$sqlQuery->setNumber($detallecargo->pERIODO);
		$sqlQuery->setNumber($detallecargo->cODDET);
		$sqlQuery->set($detallecargo->tIPODET);
		$sqlQuery->setNumber($detallecargo->pUNIT);
		$sqlQuery->set($detallecargo->cANTENT);
		$sqlQuery->setNumber($detallecargo->rEC);
		$sqlQuery->setNumber($detallecargo->fOLIOOA);

		$id = $this->executeInsert($sqlQuery);	
		$detallecargo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DetallecargoMySql detallecargo
 	 */
	public function update($detallecargo){
		$sql = 'UPDATE detallecargo SET C_SECCION = ?, NRO_OA = ?, PERIODO = ?, COD_DET = ?, TIPO_DET = ?, P_UNIT = ?, CANT_ENT = ?, REC = ?, FOLIO_OA = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($detallecargo->cSECCION);
		$sqlQuery->setNumber($detallecargo->nROOA);
		$sqlQuery->setNumber($detallecargo->pERIODO);
		$sqlQuery->setNumber($detallecargo->cODDET);
		$sqlQuery->set($detallecargo->tIPODET);
		$sqlQuery->setNumber($detallecargo->pUNIT);
		$sqlQuery->set($detallecargo->cANTENT);
		$sqlQuery->setNumber($detallecargo->rEC);
		$sqlQuery->setNumber($detallecargo->fOLIOOA);

		$sqlQuery->setNumber($detallecargo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM detallecargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCSECCION($value){
		$sql = 'SELECT * FROM detallecargo WHERE C_SECCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNROOA($value){
		$sql = 'SELECT * FROM detallecargo WHERE NRO_OA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPERIODO($value){
		$sql = 'SELECT * FROM detallecargo WHERE PERIODO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCODDET($value){
		$sql = 'SELECT * FROM detallecargo WHERE COD_DET = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIPODET($value){
		$sql = 'SELECT * FROM detallecargo WHERE TIPO_DET = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPUNIT($value){
		$sql = 'SELECT * FROM detallecargo WHERE P_UNIT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCANTENT($value){
		$sql = 'SELECT * FROM detallecargo WHERE CANT_ENT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByREC($value){
		$sql = 'SELECT * FROM detallecargo WHERE REC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFOLIOOA($value){
		$sql = 'SELECT * FROM detallecargo WHERE FOLIO_OA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCSECCION($value){
		$sql = 'DELETE FROM detallecargo WHERE C_SECCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNROOA($value){
		$sql = 'DELETE FROM detallecargo WHERE NRO_OA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPERIODO($value){
		$sql = 'DELETE FROM detallecargo WHERE PERIODO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCODDET($value){
		$sql = 'DELETE FROM detallecargo WHERE COD_DET = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIPODET($value){
		$sql = 'DELETE FROM detallecargo WHERE TIPO_DET = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPUNIT($value){
		$sql = 'DELETE FROM detallecargo WHERE P_UNIT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCANTENT($value){
		$sql = 'DELETE FROM detallecargo WHERE CANT_ENT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByREC($value){
		$sql = 'DELETE FROM detallecargo WHERE REC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFOLIOOA($value){
		$sql = 'DELETE FROM detallecargo WHERE FOLIO_OA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DetallecargoMySql 
	 */
	protected function readRow($row){
		$detallecargo = new Detallecargo();
		
		$detallecargo->cSECCION = $row['C_SECCION'];
		$detallecargo->nROOA = $row['NRO_OA'];
		$detallecargo->pERIODO = $row['PERIODO'];
		$detallecargo->cODDET = $row['COD_DET'];
		$detallecargo->tIPODET = $row['TIPO_DET'];
		$detallecargo->pUNIT = $row['P_UNIT'];
		$detallecargo->cANTENT = $row['CANT_ENT'];
		$detallecargo->rEC = $row['REC'];
		$detallecargo->fOLIOOA = $row['FOLIO_OA'];
		$detallecargo->id = $row['id'];

		return $detallecargo;
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
	 * @return DetallecargoMySql 
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