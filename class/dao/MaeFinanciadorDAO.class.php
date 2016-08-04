<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 17:01
 */
interface MaeFinanciadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeFinanciador 
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
 	 * @param maeFinanciador primary key
 	 */
	public function delete($rutfinanciador);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeFinanciador maeFinanciador
 	 */
	public function insert($maeFinanciador);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeFinanciador maeFinanciador
 	 */
	public function update($maeFinanciador);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRutver($value);

	public function queryByNombrefinanciador($value);

	public function queryByDireccion($value);

	public function queryByTelefono($value);

	public function queryByCodigociudad($value);

	public function queryByRazonsocial($value);


	public function deleteByRutver($value);

	public function deleteByNombrefinanciador($value);

	public function deleteByDireccion($value);

	public function deleteByTelefono($value);

	public function deleteByCodigociudad($value);

	public function deleteByRazonsocial($value);


}
?>