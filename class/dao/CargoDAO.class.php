<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-06-07 10:49
 */
interface CargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cargo 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param cargo primary key
 	 */
	public function delete($FOLIO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cargo cargo
 	 */
	public function insert($cargo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cargo cargo
 	 */
	public function update($cargo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCSECCION($value);

	public function queryByNROOA($value);

	public function queryByPERIODO($value);

	public function queryByFECHA($value);

	public function queryByDOCUM($value);

	public function queryByHORA($value);

	public function queryByMINUTO($value);

	public function queryByRUTPRE($value);

	public function queryByRUTNUM($value);

	public function queryByTIPOPAC($value);

	public function queryByTIPO($value);

	public function queryByTIPOPAGO($value);

	public function queryByIDTOTH($value);


	public function deleteByCSECCION($value);

	public function deleteByNROOA($value);

	public function deleteByPERIODO($value);

	public function deleteByFECHA($value);

	public function deleteByDOCUM($value);

	public function deleteByHORA($value);

	public function deleteByMINUTO($value);

	public function deleteByRUTPRE($value);

	public function deleteByRUTNUM($value);

	public function deleteByTIPOPAC($value);

	public function deleteByTIPO($value);

	public function deleteByTIPOPAGO($value);

	public function deleteByIDTOTH($value);


}
?>