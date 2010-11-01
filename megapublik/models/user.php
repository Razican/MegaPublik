<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Model
{
	function User()
	{
		parent::CI_Model();
	}

	function data($id, $table = 'users')
	{
		$query			= $this->db->get_where($table, array('id' => $id));

		foreach ($query->result() as $result)
		{
			$return		=& $result;
		}

		return $return;
	}

	function online()
	{
		$query			= $this->db->get('sessions');

		return $query->num_rows();
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */