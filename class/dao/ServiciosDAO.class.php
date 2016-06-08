<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-06-07 10:49
 */
interface ServiciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Servicios 
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
 	 * @param servicio primary key
 	 */
	public function delete($COD_SER);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Servicios servicio
 	 */
	public function insert($servicio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Servicios servicio
 	 */
	public function update($servicio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGRUPO($value);

	public function queryByDESCRIP($value);

	public function queryByCSECCION($value);

	public function queryByVIGENTE($value);


	public function deleteByGRUPO($value);

	public function deleteByDESCRIP($value);

	public function deleteByCSECCION($value);

	public function deleteByVIGENTE($value);


}
?>