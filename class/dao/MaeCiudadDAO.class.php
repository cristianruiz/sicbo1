<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-04 23:00
 */
interface MaeCiudadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeCiudad 
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
 	 * @param maeCiudad primary key
 	 */
	public function delete($codigociudad);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeCiudad maeCiudad
 	 */
	public function insert($maeCiudad);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeCiudad maeCiudad
 	 */
	public function update($maeCiudad);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombreciudad($value);


	public function deleteByNombreciudad($value);


}
?>