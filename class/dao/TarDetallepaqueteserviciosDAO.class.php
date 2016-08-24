<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 21:12
 */
interface TarDetallepaqueteserviciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TarDetallepaqueteservicios 
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
 	 * @param tarDetallepaqueteservicio primary key
 	 */
	public function delete($iddetallepaqueteservicios);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarDetallepaqueteservicios tarDetallepaqueteservicio
 	 */
	public function insert($tarDetallepaqueteservicio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarDetallepaqueteservicios tarDetallepaqueteservicio
 	 */
	public function update($tarDetallepaqueteservicio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCantidad($value);

	public function queryByMonto($value);

	public function queryByVigente($value);

	public function queryByCodigoservicio($value);

	public function queryByIdgrupopaquete($value);

	public function queryByCodigoseccion($value);


	public function deleteByCantidad($value);

	public function deleteByMonto($value);

	public function deleteByVigente($value);

	public function deleteByCodigoservicio($value);

	public function deleteByIdgrupopaquete($value);

	public function deleteByCodigoseccion($value);


}
?>