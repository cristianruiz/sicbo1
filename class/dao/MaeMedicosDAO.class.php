<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-07 17:12
 */
interface MaeMedicosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeMedicos 
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
 	 * @param maeMedico primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeMedicos maeMedico
 	 */
	public function insert($maeMedico);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeMedicos maeMedico
 	 */
	public function update($maeMedico);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRutnum($value);

	public function queryByRutver($value);

	public function queryByFullname($value);

	public function queryByDireccion($value);

	public function queryByTelefono($value);

	public function queryByCoidigociudad($value);

	public function queryByNombre($value);

	public function queryByApellido($value);

	public function queryByCodigoespecialidad($value);


	public function deleteByRutnum($value);

	public function deleteByRutver($value);

	public function deleteByFullname($value);

	public function deleteByDireccion($value);

	public function deleteByTelefono($value);

	public function deleteByCoidigociudad($value);

	public function deleteByNombre($value);

	public function deleteByApellido($value);

	public function deleteByCodigoespecialidad($value);


}
?>