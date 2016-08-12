<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
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

	public function queryByNrocargo($value);

	public function queryByCodigoseccion($value);

	public function queryByPeriodo($value);

	public function queryByFecha($value);

	public function queryByNroficha($value);

	public function queryByHora($value);

	public function queryByMinuto($value);

	public function queryByTipoventa($value);

	public function queryByTipopago($value);

	public function queryByIdtoth($value);

	public function queryByRutfinanciador($value);

	public function queryByCodigoestadocargo($value);

	public function queryByCodigoentidad($value);

	public function queryByRutoperador($value);

	public function queryBySaldo($value);

	public function queryByTotalcargo($value);

	public function queryByRutpaciente($value);


	public function deleteByNrocargo($value);

	public function deleteByCodigoseccion($value);

	public function deleteByPeriodo($value);

	public function deleteByFecha($value);

	public function deleteByNroficha($value);

	public function deleteByHora($value);

	public function deleteByMinuto($value);

	public function deleteByTipoventa($value);

	public function deleteByTipopago($value);

	public function deleteByIdtoth($value);

	public function deleteByRutfinanciador($value);

	public function deleteByCodigoestadocargo($value);

	public function deleteByCodigoentidad($value);

	public function deleteByRutoperador($value);

	public function deleteBySaldo($value);

	public function deleteByTotalcargo($value);

	public function deleteByRutpaciente($value);


}
?>