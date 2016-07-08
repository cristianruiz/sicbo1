<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 20:53
 */
interface TarConveniopaqueteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TarConveniopaquete 
	 */
	public function load($idgrupopaquete, $idconvenio);

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
 	 * @param tarConveniopaquete primary key
 	 */
	public function delete($idgrupopaquete, $idconvenio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarConveniopaquete tarConveniopaquete
 	 */
	public function insert($tarConveniopaquete);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarConveniopaquete tarConveniopaquete
 	 */
	public function update($tarConveniopaquete);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>