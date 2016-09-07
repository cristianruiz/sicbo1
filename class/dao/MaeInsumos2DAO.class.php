<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-07 17:12
 */
interface MaeInsumos2DAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeInsumos2 
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
 	 * @param maeInsumos2 primary key
 	 */
	public function delete($codigoinsumo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeInsumos2 maeInsumos2
 	 */
	public function insert($maeInsumos2);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeInsumos2 maeInsumos2
 	 */
	public function update($maeInsumos2);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);

	public function queryByIdunidad($value);

	public function queryByPreciocompra($value);

	public function queryByPrecioventa($value);

	public function queryByPrecioultcompra($value);

	public function queryByPreciomaxcompra($value);

	public function queryByFechaultcompra($value);


	public function deleteByDescripcion($value);

	public function deleteByIdunidad($value);

	public function deleteByPreciocompra($value);

	public function deleteByPrecioventa($value);

	public function deleteByPrecioultcompra($value);

	public function deleteByPreciomaxcompra($value);

	public function deleteByFechaultcompra($value);


}
?>