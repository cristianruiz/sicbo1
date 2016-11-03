<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
interface CajaEstadocomprobanteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaEstadocomprobante 
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
 	 * @param cajaEstadocomprobante primary key
 	 */
	public function delete($idestadocomprobante);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaEstadocomprobante cajaEstadocomprobante
 	 */
	public function insert($cajaEstadocomprobante);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaEstadocomprobante cajaEstadocomprobante
 	 */
	public function update($cajaEstadocomprobante);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEmpid($value);

	public function queryByDescripcion($value);


	public function deleteByEmpid($value);

	public function deleteByDescripcion($value);


}
?>