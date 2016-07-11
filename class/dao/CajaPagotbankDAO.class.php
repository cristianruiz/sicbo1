<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 21:06
 */
interface CajaPagotbankDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaPagotbank 
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
 	 * @param cajaPagotbank primary key
 	 */
	public function delete($idpagotbank);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaPagotbank cajaPagotbank
 	 */
	public function insert($cajaPagotbank);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaPagotbank cajaPagotbank
 	 */
	public function update($cajaPagotbank);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMonto($value);

	public function queryByCodigotransaccion($value);

	public function queryByTipotransaccion($value);

	public function queryByIdcomprobante($value);

	public function queryByEmpid($value);


	public function deleteByMonto($value);

	public function deleteByCodigotransaccion($value);

	public function deleteByTipotransaccion($value);

	public function deleteByIdcomprobante($value);

	public function deleteByEmpid($value);


}
?>