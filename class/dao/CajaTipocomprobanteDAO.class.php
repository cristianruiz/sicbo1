<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 17:01
 */
interface CajaTipocomprobanteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaTipocomprobante 
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
 	 * @param cajaTipocomprobante primary key
 	 */
	public function delete($idtipocomprobante);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaTipocomprobante cajaTipocomprobante
 	 */
	public function insert($cajaTipocomprobante);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaTipocomprobante cajaTipocomprobante
 	 */
	public function update($cajaTipocomprobante);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);


	public function deleteByDescripcion($value);


}
?>