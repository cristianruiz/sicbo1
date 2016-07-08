<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-07-08 21:06
 */
interface TarConveniosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TarConvenios 
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
 	 * @param tarConvenio primary key
 	 */
	public function delete($idconvenio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TarConvenios tarConvenio
 	 */
	public function insert($tarConvenio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TarConvenios tarConvenio
 	 */
	public function update($tarConvenio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);

	public function queryByVigente($value);

	public function queryByFechainicio($value);

	public function queryByFechatermino($value);

	public function queryByRutfinanciador($value);


	public function deleteByDescripcion($value);

	public function deleteByVigente($value);

	public function deleteByFechainicio($value);

	public function deleteByFechatermino($value);

	public function deleteByRutfinanciador($value);


}
?>