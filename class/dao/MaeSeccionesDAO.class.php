<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
interface MaeSeccionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeSecciones 
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
 	 * @param maeSeccione primary key
 	 */
	public function delete($codigoseccion);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeSecciones maeSeccione
 	 */
	public function insert($maeSeccione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeSecciones maeSeccione
 	 */
	public function update($maeSeccione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>