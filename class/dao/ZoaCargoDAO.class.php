<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
interface ZoaCargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ZoaCargo 
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
 	 * @param zoaCargo primary key
 	 */
	public function delete($folio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ZoaCargo zoaCargo
 	 */
	public function insert($zoaCargo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ZoaCargo zoaCargo
 	 */
	public function update($zoaCargo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodigoseccion($value);

	public function queryByNrocargo($value);

	public function queryByPeriodo($value);

	public function queryByFecha($value);

	public function queryByNroficha($value);

	public function queryByHora($value);

	public function queryByMinuto($value);

	public function queryByRutfinanciador($value);

	public function queryByRutpaciente($value);

	public function queryByTipopaciente($value);

	public function queryByTipo($value);

	public function queryByTipopago($value);

	public function queryByIdtoth($value);


	public function deleteByCodigoseccion($value);

	public function deleteByNrocargo($value);

	public function deleteByPeriodo($value);

	public function deleteByFecha($value);

	public function deleteByNroficha($value);

	public function deleteByHora($value);

	public function deleteByMinuto($value);

	public function deleteByRutfinanciador($value);

	public function deleteByRutpaciente($value);

	public function deleteByTipopaciente($value);

	public function deleteByTipo($value);

	public function deleteByTipopago($value);

	public function deleteByIdtoth($value);


}
?>