<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
interface HmHonorarioconsolidadoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HmHonorarioconsolidado 
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
 	 * @param hmHonorarioconsolidado primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmHonorarioconsolidado hmHonorarioconsolidado
 	 */
	public function insert($hmHonorarioconsolidado);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmHonorarioconsolidado hmHonorarioconsolidado
 	 */
	public function update($hmHonorarioconsolidado);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdHonorariosicbo($value);

	public function queryByRutpersonatural($value);


	public function deleteByIdHonorariosicbo($value);

	public function deleteByRutpersonatural($value);


}
?>