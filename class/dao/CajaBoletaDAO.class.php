<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
interface CajaBoletaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaBoleta 
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
 	 * @param cajaBoleta primary key
 	 */
	public function delete($numeroboleta);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaBoleta cajaBoleta
 	 */
	public function insert($cajaBoleta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaBoleta cajaBoleta
 	 */
	public function update($cajaBoleta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTotalboleta($value);

	public function queryByIddocumentopago($value);

	public function queryByIdestadoboleta($value);

	public function queryByRutcliente($value);

	public function queryByFecha($value);

	public function queryByEmpid($value);


	public function deleteByTotalboleta($value);

	public function deleteByIddocumentopago($value);

	public function deleteByIdestadoboleta($value);

	public function deleteByRutcliente($value);

	public function deleteByFecha($value);

	public function deleteByEmpid($value);


}
?>