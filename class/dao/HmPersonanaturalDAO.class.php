<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
interface HmPersonanaturalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HmPersonanatural 
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
 	 * @param hmPersonanatural primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmPersonanatural hmPersonanatural
 	 */
	public function insert($hmPersonanatural);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmPersonanatural hmPersonanatural
 	 */
	public function update($hmPersonanatural);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRutproveedor($value);

	public function queryByRutver($value);

	public function queryByNombrecompleto($value);

	public function queryByEsreceptor($value);

	public function queryByVigente($value);


	public function deleteByRutproveedor($value);

	public function deleteByRutver($value);

	public function deleteByNombrecompleto($value);

	public function deleteByEsreceptor($value);

	public function deleteByVigente($value);


}
?>