<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
interface MaePersonalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaePersonal 
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
 	 * @param maePersonal primary key
 	 */
	public function delete($rutpersonal);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaePersonal maePersonal
 	 */
	public function insert($maePersonal);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaePersonal maePersonal
 	 */
	public function update($maePersonal);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNombre($value);

	public function queryByIddepartamento($value);

	public function queryByIdcargo($value);

	public function queryByClave($value);

	public function queryByVigente($value);


	public function deleteByNombre($value);

	public function deleteByIddepartamento($value);

	public function deleteByIdcargo($value);

	public function deleteByClave($value);

	public function deleteByVigente($value);


}
?>