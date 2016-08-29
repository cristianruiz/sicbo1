<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-24 21:12
 */
interface TarDetallepaqueteinsumosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TarDetallepaqueteinsumos 
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
 	 * @param tarDetallepaqueteinsumo primary key
 	 */
	public function delete($iddetallepaqueteinsumos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarDetallepaqueteinsumos tarDetallepaqueteinsumo
 	 */
	public function insert($tarDetallepaqueteinsumo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarDetallepaqueteinsumos tarDetallepaqueteinsumo
 	 */
	public function update($tarDetallepaqueteinsumo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCantidad($value);

	public function queryByMonto($value);

	public function queryByVigente($value);

	public function queryByCodigoinsumo($value);

	public function queryByIdgrupopaquete($value);

	public function queryByCodigoseccion($value);


	public function deleteByCantidad($value);

	public function deleteByMonto($value);

	public function deleteByVigente($value);

	public function deleteByCodigoinsumo($value);

	public function deleteByIdgrupopaquete($value);

	public function deleteByCodigoseccion($value);


}
?>