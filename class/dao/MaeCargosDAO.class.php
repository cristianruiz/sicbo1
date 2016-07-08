<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 21:06
 */
interface MaeCargosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeCargos 
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
 	 * @param maeCargo primary key
 	 */
	public function delete($idcargo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeCargos maeCargo
 	 */
	public function insert($maeCargo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeCargos maeCargo
 	 */
	public function update($maeCargo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>