<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
interface HmHonorariossicboDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HmHonorariossicbo 
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
 	 * @param hmHonorariossicbo primary key
 	 */
	public function delete($idhonorario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmHonorariossicbo hmHonorariossicbo
 	 */
	public function insert($hmHonorariossicbo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmHonorariossicbo hmHonorariossicbo
 	 */
	public function update($hmHonorariossicbo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFecha($value);

	public function queryByUsuario($value);

	public function queryByPeriodo($value);

	public function queryByEstado($value);


	public function deleteByFecha($value);

	public function deleteByUsuario($value);

	public function deleteByPeriodo($value);

	public function deleteByEstado($value);


}
?>