<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-07 17:12
 */
interface HmSociedadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HmSociedad 
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
 	 * @param hmSociedad primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmSociedad hmSociedad
 	 */
	public function insert($hmSociedad);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmSociedad hmSociedad
 	 */
	public function update($hmSociedad);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRutsociedad($value);

	public function queryByRutver($value);

	public function queryByRazonsocial($value);

	public function queryByVigente($value);


	public function deleteByRutsociedad($value);

	public function deleteByRutver($value);

	public function deleteByRazonsocial($value);

	public function deleteByVigente($value);


}
?>