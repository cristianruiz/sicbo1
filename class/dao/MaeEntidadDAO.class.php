<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 21:12
 */
interface MaeEntidadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeEntidad 
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
 	 * @param maeEntidad primary key
 	 */
	public function delete($codigoentidad);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeEntidad maeEntidad
 	 */
	public function insert($maeEntidad);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeEntidad maeEntidad
 	 */
	public function update($maeEntidad);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>