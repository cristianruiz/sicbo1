<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
interface ZglbMedicosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ZglbMedicos 
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
 	 * @param zglbMedico primary key
 	 */
	public function delete($rutnum);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ZglbMedicos zglbMedico
 	 */
	public function insert($zglbMedico);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ZglbMedicos zglbMedico
 	 */
	public function update($zglbMedico);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRutver($value);

	public function queryByFullname($value);

	public function queryByDireccion($value);

	public function queryByTelefono($value);

	public function queryByCodigoespecialidad($value);

	public function queryByCoidigociudad($value);

	public function queryByNombre($value);

	public function queryByApellido($value);


	public function deleteByRutver($value);

	public function deleteByFullname($value);

	public function deleteByDireccion($value);

	public function deleteByTelefono($value);

	public function deleteByCodigoespecialidad($value);

	public function deleteByCoidigociudad($value);

	public function deleteByNombre($value);

	public function deleteByApellido($value);


}
?>