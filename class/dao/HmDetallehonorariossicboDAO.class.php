<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-04 17:01
 */
interface HmDetallehonorariossicboDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return HmDetallehonorariossicbo 
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
 	 * @param hmDetallehonorariossicbo primary key
 	 */
	public function delete($iddetallehonorario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param HmDetallehonorariossicbo hmDetallehonorariossicbo
 	 */
	public function insert($hmDetallehonorariossicbo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param HmDetallehonorariossicbo hmDetallehonorariossicbo
 	 */
	public function update($hmDetallehonorariossicbo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPeriodo($value);

	public function queryByFechadigitacion($value);

	public function queryByPaciente($value);

	public function queryByNrooa($value);

	public function queryByCodigo($value);

	public function queryByCantidad($value);

	public function queryByFecha($value);

	public function queryByFuncion($value);

	public function queryByMonto($value);

	public function queryByRutmed($value);

	public function queryByNombrepad($value);

	public function queryByMedico($value);

	public function queryByNrofi($value);

	public function queryByIdhonorario($value);


	public function deleteByPeriodo($value);

	public function deleteByFechadigitacion($value);

	public function deleteByPaciente($value);

	public function deleteByNrooa($value);

	public function deleteByCodigo($value);

	public function deleteByCantidad($value);

	public function deleteByFecha($value);

	public function deleteByFuncion($value);

	public function deleteByMonto($value);

	public function deleteByRutmed($value);

	public function deleteByNombrepad($value);

	public function deleteByMedico($value);

	public function deleteByNrofi($value);

	public function deleteByIdhonorario($value);


}
?>