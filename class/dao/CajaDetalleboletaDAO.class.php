<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 17:01
 */
interface CajaDetalleboletaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaDetalleboleta 
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
 	 * @param cajaDetalleboleta primary key
 	 */
	public function delete($iddetalleboleta);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaDetalleboleta cajaDetalleboleta
 	 */
	public function insert($cajaDetalleboleta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaDetalleboleta cajaDetalleboleta
 	 */
	public function update($cajaDetalleboleta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigodetalle($value);

	public function queryByGlosa($value);

	public function queryByCantidad($value);

	public function queryByPreciounitario($value);

	public function queryByNumeroboleta($value);


	public function deleteByCodigodetalle($value);

	public function deleteByGlosa($value);

	public function deleteByCantidad($value);

	public function deleteByPreciounitario($value);

	public function deleteByNumeroboleta($value);


}
?>