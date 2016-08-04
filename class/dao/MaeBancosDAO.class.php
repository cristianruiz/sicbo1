<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 17:01
 */
interface MaeBancosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeBancos 
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
 	 * @param maeBanco primary key
 	 */
	public function delete($idbanco);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeBancos maeBanco
 	 */
	public function insert($maeBanco);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeBancos maeBanco
 	 */
	public function update($maeBanco);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombrebanco($value);

	public function queryByAbreviatura($value);


	public function deleteByNombrebanco($value);

	public function deleteByAbreviatura($value);


}
?>