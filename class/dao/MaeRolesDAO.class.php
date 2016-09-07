<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-07 17:12
 */
interface MaeRolesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeRoles 
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
 	 * @param maeRole primary key
 	 */
	public function delete($codigofuncion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeRoles maeRole
 	 */
	public function insert($maeRole);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeRoles maeRole
 	 */
	public function update($maeRole);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>