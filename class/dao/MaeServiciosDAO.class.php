<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 21:06
 */
interface MaeServiciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeServicios 
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
 	 * @param maeServicio primary key
 	 */
	public function delete($codigoservicio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeServicios maeServicio
 	 */
	public function insert($maeServicio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeServicios maeServicio
 	 */
	public function update($maeServicio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGrupo($value);

	public function queryByDescripcion($value);

	public function queryByVigente($value);

	public function queryByCodigofonasa($value);


	public function deleteByGrupo($value);

	public function deleteByDescripcion($value);

	public function deleteByVigente($value);

	public function deleteByCodigofonasa($value);


}
?>