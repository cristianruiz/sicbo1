<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
interface CajaPagoefectivoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaPagoefectivo 
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
 	 * @param cajaPagoefectivo primary key
 	 */
	public function delete($idpagoefectivo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaPagoefectivo cajaPagoefectivo
 	 */
	public function insert($cajaPagoefectivo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaPagoefectivo cajaPagoefectivo
 	 */
	public function update($cajaPagoefectivo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMonto($value);

	public function queryByIdcomprobante($value);


	public function deleteByMonto($value);

	public function deleteByIdcomprobante($value);


}
?>