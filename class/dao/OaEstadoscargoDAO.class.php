<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
interface OaEstadoscargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return OaEstadoscargo 
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
 	 * @param oaEstadoscargo primary key
 	 */
	public function delete($codigoestado);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaEstadoscargo oaEstadoscargo
 	 */
	public function insert($oaEstadoscargo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaEstadoscargo oaEstadoscargo
 	 */
	public function update($oaEstadoscargo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>