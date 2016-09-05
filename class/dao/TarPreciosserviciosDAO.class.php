<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-09-05 21:20
 */
interface TarPreciosserviciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TarPreciosservicios 
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
 	 * @param tarPreciosservicio primary key
 	 */
	public function delete($idprecioservicio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarPreciosservicios tarPreciosservicio
 	 */
	public function insert($tarPreciosservicio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarPreciosservicios tarPreciosservicio
 	 */
	public function update($tarPreciosservicio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigoservicio($value);

	public function queryByIdconvenio($value);

	public function queryByPreciounitario($value);

	public function queryByVigente($value);


	public function deleteByCodigoservicio($value);

	public function deleteByIdconvenio($value);

	public function deleteByPreciounitario($value);

	public function deleteByVigente($value);


}
?>