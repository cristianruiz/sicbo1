<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
interface PlandecuentasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Plandecuentas 
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
 	 * @param plandecuenta primary key
 	 */
	public function delete($idplandecuentas);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Plandecuentas plandecuenta
 	 */
	public function insert($plandecuenta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Plandecuentas plandecuenta
 	 */
	public function update($plandecuenta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPlandecuentascol($value);


	public function deleteByPlandecuentascol($value);


}
?>