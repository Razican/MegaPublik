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

		if ($query->num_rows() > 0){
			foreach ($query->result() as $result)
			{
				$return		=& $result;
			}
		}
		else
		{
			$return			= NULL;
			log_message('error', 'function data() in /application/models/user.php has received bad data for argument 1 ($id).');
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