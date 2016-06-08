<?php
/**
 * Class that operate on table 'cargo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-06-07 11:15
 */
class CargoMySqlDAO implements CargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CargoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cargo WHERE FOLIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cargo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cargo primary key
 	 */
	public function delete($FOLIO){
		$sql = 'DELETE FROM cargo WHERE FOLIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($FOLIO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CargoMySql cargo
 	 */
	public function insert($cargo){
		$sql = 'INSERT INTO cargo (C_SECCION, NRO_OA, PERIODO, FECHA, DOCUM, HORA, MINUTO, RUT_PRE, RUT_NUM, TIPO_PAC, TIPO, TIPO_PAGO, ID_TOTH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cargo->cSECCION);
		$sqlQuery->setNumber($cargo->nROOA);
		$sqlQuery->setNumber($cargo->pERIODO);
		$sqlQuery->set($cargo->fECHA);
		$sqlQuery->setNumber($cargo->dOCUM);
		$sqlQuery->setNumber($cargo->hORA);
		$sqlQuery->setNumber($cargo->mINUTO);
		$sqlQuery->setNumber($cargo->rUTPRE);
		$sqlQuery->setNumber($cargo->rUTNUM);
		$sqlQuery->setNumber($cargo->tIPOPAC);
		$sqlQuery->set($cargo->tIPO);
		$sqlQuery->set($cargo->tIPOPAGO);
		$sqlQuery->setNumber($cargo->iDTOTH);

		$id = $this->executeInsert($sqlQuery);	
		$cargo->fOLIO = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CargoMySql cargo
 	 */
	public function update($cargo){
		$sql = 'UPDATE cargo SET C_SECCION = ?, NRO_OA = ?, PERIODO = ?, FECHA = ?, DOCUM = ?, HORA = ?, MINUTO = ?, RUT_PRE = ?, RUT_NUM = ?, TIPO_PAC = ?, TIPO = ?, TIPO_PAGO = ?, ID_TOTH = ? WHERE FOLIO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cargo->cSECCION);
		$sqlQuery->setNumber($cargo->nROOA);
		$sqlQuery->setNumber($cargo->pERIODO);
		$sqlQuery->set($cargo->fECHA);
		$sqlQuery->setNumber($cargo->dOCUM);
		$sqlQuery->setNumber($cargo->hORA);
		$sqlQuery->setNumber($cargo->mINUTO);
		$sqlQuery->setNumber($cargo->rUTPRE);
		$sqlQuery->setNumber($cargo->rUTNUM);
		$sqlQuery->setNumber($cargo->tIPOPAC);
		$sqlQuery->set($cargo->tIPO);
		$sqlQuery->set($cargo->tIPOPAGO);
		$sqlQuery->setNumber($cargo->iDTOTH);

		$sqlQuery->setNumber($cargo->fOLIO);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cargo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCSECCION($value){
		$sql = 'SELECT * FROM cargo WHERE C_SECCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNROOA($value){
		$sql = 'SELECT * FROM cargo WHERE NRO_OA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPERIODO($value){
		$sql = 'SELECT * FROM cargo WHERE PERIODO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHA($value){
		$sql = 'SELECT * FROM cargo WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDOCUM($value){
		$sql = 'SELECT * FROM cargo WHERE DOCUM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHORA($value){
		$sql = 'SELECT * FROM cargo WHERE HORA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMINUTO($value){
		$sql = 'SELECT * FROM cargo WHERE MINUTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRUTPRE($value){
		$sql = 'SELECT * FROM cargo WHERE RUT_PRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRUTNUM($value){
		$sql = 'SELECT * FROM cargo WHERE RUT_NUM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIPOPAC($value){
		$sql = 'SELECT * FROM cargo WHERE TIPO_PAC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIPO($value){
		$sql = 'SELECT * FROM cargo WHERE TIPO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTIPOPAGO($value){
		$sql = 'SELECT * FROM cargo WHERE TIPO_PAGO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDTOTH($value){
		$sql = 'SELECT * FROM cargo WHERE ID_TOTH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCSECCION($value){
		$sql = 'DELETE FROM cargo WHERE C_SECCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNROOA($value){
		$sql = 'DELETE FROM cargo WHERE NRO_OA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPERIODO($value){
		$sql = 'DELETE FROM cargo WHERE PERIODO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHA($value){
		$sql = 'DELETE FROM cargo WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDOCUM($value){
		$sql = 'DELETE FROM cargo WHERE DOCUM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHORA($value){
		$sql = 'DELETE FROM cargo WHERE HORA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMINUTO($value){
		$sql = 'DELETE FROM cargo WHERE MINUTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRUTPRE($value){
		$sql = 'DELETE FROM cargo WHERE RUT_PRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRUTNUM($value){
		$sql = 'DELETE FROM cargo WHERE RUT_NUM = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIPOPAC($value){
		$sql = 'DELETE FROM cargo WHERE TIPO_PAC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIPO($value){
		$sql = 'DELETE FROM cargo WHERE TIPO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTIPOPAGO($value){
		$sql = 'DELETE FROM cargo WHERE TIPO_PAGO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDTOTH($value){
		$sql = 'DELETE FROM cargo WHERE ID_TOTH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CargoMySql 
	 */
	protected function readRow($row){
		$cargo = new Cargo();
		
		$cargo->fOLIO = $row['FOLIO'];
		$cargo->cSECCION = $row['C_SECCION'];
		$cargo->nROOA = $row['NRO_OA'];
		$cargo->pERIODO = $row['PERIODO'];
		$cargo->fECHA = $row['FECHA'];
		$cargo->dOCUM = $row['DOCUM'];
		$cargo->hORA = $row['HORA'];
		$cargo->mINUTO = $row['MINUTO'];
		$cargo->rUTPRE = $row['RUT_PRE'];
		$cargo->rUTNUM = $row['RUT_NUM'];
		$cargo->tIPOPAC = $row['TIPO_PAC'];
		$cargo->tIPO = $row['TIPO'];
		$cargo->tIPOPAGO = $row['TIPO_PAGO'];
		$cargo->iDTOTH = $row['ID_TOTH'];

		return $cargo;
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
	 * @return CargoMySql 
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