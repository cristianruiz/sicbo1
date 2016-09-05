<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
interface OaDetalleinsumosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return OaDetalleinsumos 
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
 	 * @param oaDetalleinsumo primary key
 	 */
	public function delete($iddetalle);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaDetalleinsumos oaDetalleinsumo
 	 */
	public function insert($oaDetalleinsumo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaDetalleinsumos oaDetalleinsumo
 	 */
	public function update($oaDetalleinsumo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigoinsumo($value);

	public function queryByCodigoseccion($value);

	public function queryByNrocargo($value);

	public function queryByPeriodo($value);

	public function queryByPreciounitario($value);

	public function queryByCantidadentregada($value);

	public function queryByRecargo($value);

	public function queryByFoliocargo($value);

	public function queryByAbastecido($value);

	public function queryByIdpaquete($value);


	public function deleteByCodigoinsumo($value);

	public function deleteByCodigoseccion($value);

	public function deleteByNrocargo($value);

	public function deleteByPeriodo($value);

	public function deleteByPreciounitario($value);

	public function deleteByCantidadentregada($value);

	public function deleteByRecargo($value);

	public function deleteByFoliocargo($value);

	public function deleteByAbastecido($value);

	public function deleteByIdpaquete($value);


}
?>