<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
interface HmSociosmiembrosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HmSociosmiembros 
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
 	 * @param hmSociosmiembro primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmSociosmiembros hmSociosmiembro
 	 */
	public function insert($hmSociosmiembro);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmSociosmiembros hmSociosmiembro
 	 */
	public function update($hmSociosmiembro);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRutproveedor($value);

	public function queryByRutsociedad($value);


	public function deleteByRutproveedor($value);

	public function deleteByRutsociedad($value);


}
?>