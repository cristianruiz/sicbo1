<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-06-07 11:15
 */
interface DetallecargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Detallecargo 
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
 	 * @param detallecargo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Detallecargo detallecargo
 	 */
	public function insert($detallecargo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Detallecargo detallecargo
 	 */
	public function update($detallecargo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCSECCION($value);

	public function queryByNROOA($value);

	public function queryByPERIODO($value);

	public function queryByCODDET($value);

	public function queryByTIPODET($value);

	public function queryByPUNIT($value);

	public function queryByCANTENT($value);

	public function queryByREC($value);

	public function queryByFOLIOOA($value);


	public function deleteByCSECCION($value);

	public function deleteByNROOA($value);

	public function deleteByPERIODO($value);

	public function deleteByCODDET($value);

	public function deleteByTIPODET($value);

	public function deleteByPUNIT($value);

	public function deleteByCANTENT($value);

	public function deleteByREC($value);

	public function deleteByFOLIOOA($value);


}
?>