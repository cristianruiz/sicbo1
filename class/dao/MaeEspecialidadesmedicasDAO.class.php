<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
interface MaeEspecialidadesmedicasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaeEspecialidadesmedicas 
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
 	 * @param maeEspecialidadesmedica primary key
 	 */
	public function delete($codigoespecialidad);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaeEspecialidadesmedicas maeEspecialidadesmedica
 	 */
	public function insert($maeEspecialidadesmedica);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaeEspecialidadesmedicas maeEspecialidadesmedica
 	 */
	public function update($maeEspecialidadesmedica);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>