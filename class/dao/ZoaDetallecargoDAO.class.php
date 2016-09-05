<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
interface ZoaDetallecargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ZoaDetallecargo 
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
 	 * @param zoaDetallecargo primary key
 	 */
	public function delete($iddetalle);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ZoaDetallecargo zoaDetallecargo
 	 */
	public function insert($zoaDetallecargo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ZoaDetallecargo zoaDetallecargo
 	 */
	public function update($zoaDetallecargo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigoseccion($value);

	public function queryByNrocargo($value);

	public function queryByPeriodo($value);

	public function queryByCodigodetalle($value);

	public function queryByTipodetalle($value);

	public function queryByPreciounitario($value);

	public function queryByCantidadentregada($value);

	public function queryByRecargo($value);

	public function queryByFoliocargo($value);


	public function deleteByCodigoseccion($value);

	public function deleteByNrocargo($value);

	public function deleteByPeriodo($value);

	public function deleteByCodigodetalle($value);

	public function deleteByTipodetalle($value);

	public function deleteByPreciounitario($value);

	public function deleteByCantidadentregada($value);

	public function deleteByRecargo($value);

	public function deleteByFoliocargo($value);


}
?>