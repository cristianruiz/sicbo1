<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 17:04
 */
interface HmHomocodigosformulasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HmHomocodigosformulas 
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
 	 * @param hmHomocodigosformula primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmHomocodigosformulas hmHomocodigosformula
 	 */
	public function insert($hmHomocodigosformula);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmHomocodigosformulas hmHomocodigosformula
 	 */
	public function update($hmHomocodigosformula);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigoservicio($value);

	public function queryByDescripcionsicbo($value);

	public function queryByFormula($value);


	public function deleteByCodigoservicio($value);

	public function deleteByDescripcionsicbo($value);

	public function deleteByFormula($value);


}
?>