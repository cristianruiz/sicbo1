<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-08-12 20:30
 */
interface MaePacienteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaePaciente 
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
 	 * @param maePaciente primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaePaciente maePaciente
 	 */
	public function insert($maePaciente);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaePaciente maePaciente
 	 */
	public function update($maePaciente);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRutpaciente($value);

	public function queryByRutver($value);

	public function queryByNombre($value);

	public function queryByApellidopaterno($value);

	public function queryByApellidomaterno($value);

	public function queryByFechanacimiento($value);

	public function queryByDireccion($value);

	public function queryByTelefono($value);

	public function queryByCorrelectronico($value);

	public function queryByCodigociudad($value);


	public function deleteByRutpaciente($value);

	public function deleteByRutver($value);

	public function deleteByNombre($value);

	public function deleteByApellidopaterno($value);

	public function deleteByApellidomaterno($value);

	public function deleteByFechanacimiento($value);

	public function deleteByDireccion($value);

	public function deleteByTelefono($value);

	public function deleteByCorrelectronico($value);

	public function deleteByCodigociudad($value);


}
?>