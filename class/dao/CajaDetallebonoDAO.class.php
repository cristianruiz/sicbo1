<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 20:53
 */
interface CajaDetallebonoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaDetallebono 
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
 	 * @param cajaDetallebono primary key
 	 */
	public function delete($iddetallebono);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaDetallebono cajaDetallebono
 	 */
	public function insert($cajaDetallebono);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaDetallebono cajaDetallebono
 	 */
	public function update($cajaDetallebono);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigo($value);

	public function queryByCantidad($value);

	public function queryByValortotal($value);

	public function queryByBonificacion($value);

	public function queryByIdbono($value);

	public function queryByComplementario($value);

	public function queryByCopago($value);

	public function queryByIddetalleservicios($value);


	public function deleteByCodigo($value);

	public function deleteByCantidad($value);

	public function deleteByValortotal($value);

	public function deleteByBonificacion($value);

	public function deleteByIdbono($value);

	public function deleteByComplementario($value);

	public function deleteByCopago($value);

	public function deleteByIddetalleservicios($value);


}
?>