<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 21:12
 */
interface HmEstadohonorarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HmEstadohonorario 
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
 	 * @param hmEstadohonorario primary key
 	 */
	public function delete($idestado);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmEstadohonorario hmEstadohonorario
 	 */
	public function insert($hmEstadohonorario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmEstadohonorario hmEstadohonorario
 	 */
	public function update($hmEstadohonorario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>