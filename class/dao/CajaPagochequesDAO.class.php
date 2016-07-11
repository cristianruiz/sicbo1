<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 21:06
 */
interface CajaPagochequesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CajaPagocheques 
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
 	 * @param cajaPagocheque primary key
 	 */
	public function delete($idpagocheques);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CajaPagocheques cajaPagocheque
 	 */
	public function insert($cajaPagocheque);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CajaPagocheques cajaPagocheque
 	 */
	public function update($cajaPagocheque);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFoliocheque($value);

	public function queryByNumerocuenta($value);

	public function queryByNombretitular($value);

	public function queryByRuttitular($value);

	public function queryByRutver($value);

	public function queryByMonto($value);

	public function queryByFechacobro($value);

	public function queryByOrden($value);

	public function queryByCantidadcheques($value);

	public function queryByCodigociudad($value);

	public function queryByCodigobanco($value);

	public function queryByIdcomprobante($value);

	public function queryByEmpid($value);


	public function deleteByFoliocheque($value);

	public function deleteByNumerocuenta($value);

	public function deleteByNombretitular($value);

	public function deleteByRuttitular($value);

	public function deleteByRutver($value);

	public function deleteByMonto($value);

	public function deleteByFechacobro($value);

	public function deleteByOrden($value);

	public function deleteByCantidadcheques($value);

	public function deleteByCodigociudad($value);

	public function deleteByCodigobanco($value);

	public function deleteByIdcomprobante($value);

	public function deleteByEmpid($value);


}
?>