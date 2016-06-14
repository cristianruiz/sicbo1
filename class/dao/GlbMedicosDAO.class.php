<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-06-14 21:36
 */
interface GlbMedicosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GlbMedicos 
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
 	 * @param glbMedico primary key
 	 */
	public function delete($rut_num);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GlbMedicos glbMedico
 	 */
	public function insert($glbMedico);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GlbMedicos glbMedico
 	 */
	public function update($glbMedico);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByLastname($value);


	public function deleteByName($value);

	public function deleteByLastname($value);


}
?>