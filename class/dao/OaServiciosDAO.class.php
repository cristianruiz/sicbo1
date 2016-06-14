<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-06-14 16:58
 */
interface OaServiciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return OaServicios 
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
 	 * @param oaServicio primary key
 	 */
	public function delete($codigoservicio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaServicios oaServicio
 	 */
	public function insert($oaServicio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaServicios oaServicio
 	 */
	public function update($oaServicio);	

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