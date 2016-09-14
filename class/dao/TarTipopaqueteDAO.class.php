<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-14 18:02
 */
interface TarTipopaqueteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TarTipopaquete 
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
 	 * @param tarTipopaquete primary key
 	 */
	public function delete($idtipopaquete);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarTipopaquete tarTipopaquete
 	 */
	public function insert($tarTipopaquete);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarTipopaquete tarTipopaquete
 	 */
	public function update($tarTipopaquete);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripciontipo($value);


	public function deleteByDescripciontipo($value);


}
?>