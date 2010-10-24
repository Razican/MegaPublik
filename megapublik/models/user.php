<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Model
{
	function User()
	{
		parent::CI_Model();
	}

	function data($id, $table = 'users')
	{
		$query			= $this->db->get_where($table, array('id' => $id), '1');
		
		foreach ($query->result() as $result)
		{
			$return		=& $result;
		}
		
		return $return;
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */