<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-04 23:00
 */
interface CajaBonoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaBono 
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
 	 * @param cajaBono primary key
 	 */
	public function delete($idbono);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaBono cajaBono
 	 */
	public function insert($cajaBono);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaBono cajaBono
 	 */
	public function update($cajaBono);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNumerobono($value);

	public function queryByTotalbonificacion($value);

	public function queryByTotalcopago($value);

	public function queryByIdcomprobantepago($value);

	public function queryByBonoelectronico($value);

	public function queryByBeneficiario($value);

	public function queryByEmisor($value);

	public function queryByFinanciador($value);

	public function queryByEmpid($value);


	public function deleteByNumerobono($value);

	public function deleteByTotalbonificacion($value);

	public function deleteByTotalcopago($value);

	public function deleteByIdcomprobantepago($value);

	public function deleteByBonoelectronico($value);

	public function deleteByBeneficiario($value);

	public function deleteByEmisor($value);

	public function deleteByFinanciador($value);

	public function deleteByEmpid($value);


}
?>