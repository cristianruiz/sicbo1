<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-06-14 21:44
 */
interface OaCargoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return OaCargo 
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
 	 * @param oaCargo primary key
 	 */
	public function delete($folio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OaCargo oaCargo
 	 */
	public function insert($oaCargo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param OaCargo oaCargo
 	 */
	public function update($oaCargo);	

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