<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 21:12
 */
interface TarSubgrupopaqueteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TarSubgrupopaquete 
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
 	 * @param tarSubgrupopaquete primary key
 	 */
	public function delete($idsubgrupo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarSubgrupopaquete tarSubgrupopaquete
 	 */
	public function insert($tarSubgrupopaquete);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarSubgrupopaquete tarSubgrupopaquete
 	 */
	public function update($tarSubgrupopaquete);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>