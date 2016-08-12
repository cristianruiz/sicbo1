<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
interface ZoaServiciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ZoaServicios 
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
 	 * @param zoaServicio primary key
 	 */
	public function delete($codigoservicio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ZoaServicios zoaServicio
 	 */
	public function insert($zoaServicio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ZoaServicios zoaServicio
 	 */
	public function update($zoaServicio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGrupo($value);

	public function queryByDescripcion($value);

	public function queryByCodigoseccion($value);

	public function queryByVigente($value);


	public function deleteByGrupo($value);

	public function deleteByDescripcion($value);

	public function deleteByCodigoseccion($value);

	public function deleteByVigente($value);


}
?>