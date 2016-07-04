<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-04 23:00
 */
interface OaDetalleserviciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return OaDetalleservicios 
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
 	 * @param oaDetalleservicio primary key
 	 */
	public function delete($iddetalle);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaDetalleservicios oaDetalleservicio
 	 */
	public function insert($oaDetalleservicio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaDetalleservicios oaDetalleservicio
 	 */
	public function update($oaDetalleservicio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigoseccion($value);

	public function queryByNrocargo($value);

	public function queryByPeriodo($value);

	public function queryByCodigodetalle($value);

	public function queryByPreciounitario($value);

	public function queryByCantidadentregada($value);

	public function queryByRecargo($value);

	public function queryByFoliocargo($value);

	public function queryByIdpaquete($value);


	public function deleteByCodigoseccion($value);

	public function deleteByNrocargo($value);

	public function deleteByPeriodo($value);

	public function deleteByCodigodetalle($value);

	public function deleteByPreciounitario($value);

	public function deleteByCantidadentregada($value);

	public function deleteByRecargo($value);

	public function deleteByFoliocargo($value);

	public function deleteByIdpaquete($value);


}
?>