<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
interface TarGrupopaqueteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TarGrupopaquete 
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
 	 * @param tarGrupopaquete primary key
 	 */
	public function delete($idgrupopaquete);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarGrupopaquete tarGrupopaquete
 	 */
	public function insert($tarGrupopaquete);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarGrupopaquete tarGrupopaquete
 	 */
	public function update($tarGrupopaquete);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);

	public function queryByIdsubgrupo($value);

	public function queryByIdpaquete($value);


	public function deleteByDescripcion($value);

	public function deleteByIdsubgrupo($value);

	public function deleteByIdpaquete($value);


}
?>