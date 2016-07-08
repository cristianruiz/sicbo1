<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 21:06
 */
interface MaeInsumosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeInsumos 
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
 	 * @param maeInsumo primary key
 	 */
	public function delete($codigoinsumo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeInsumos maeInsumo
 	 */
	public function insert($maeInsumo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeInsumos maeInsumo
 	 */
	public function update($maeInsumo);	

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