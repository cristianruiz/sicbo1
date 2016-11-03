<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
interface OaCargoprofesionalesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return OaCargoprofesionales 
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
 	 * @param oaCargoprofesionale primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaCargoprofesionales oaCargoprofesionale
 	 */
	public function insert($oaCargoprofesionale);
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaCargoprofesionales oaCargoprofesionale
 	 */
	public function update($oaCargoprofesionale);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFoliocargo($value);

	public function queryByRutmedico($value);

	public function queryByObservacion($value);

	public function queryByCodigofuncionmedico($value);


	public function deleteByFoliocargo($value);

	public function deleteByRutmedico($value);

	public function deleteByObservacion($value);

	public function deleteByCodigofuncionmedico($value);


}
?>