<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 14:54
 */
interface ULTOADAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ULTOA 
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
 	 * @param uLTOA primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ULTOA uLTOA
 	 */
	public function insert($uLTOA);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ULTOA uLTOA
 	 */
	public function update($uLTOA);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByADM($value);

	public function queryBySEC($value);

	public function queryByMES($value);

	public function queryByANO($value);

	public function queryByNUMERO($value);


	public function deleteByADM($value);

	public function deleteBySEC($value);

	public function deleteByMES($value);

	public function deleteByANO($value);

	public function deleteByNUMERO($value);


}
?>