<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 21:06
 */
interface MaeDepartamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeDepartamento 
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
 	 * @param maeDepartamento primary key
 	 */
	public function delete($iddepartamento);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeDepartamento maeDepartamento
 	 */
	public function insert($maeDepartamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeDepartamento maeDepartamento
 	 */
	public function update($maeDepartamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>