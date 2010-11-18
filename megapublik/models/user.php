<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function data($id, $table = 'users')
	{
		$query				= $this->db->get_where($table, array('id' => $id));

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
		if ($table === 'users')
		{
			$return->level	= floor(log($return->experience/$this->config->item('first_level'),$this->config->item('exp_multiplier'))+2);
		}
		return $return;
	}
	
	function has_company()
	{
		$query				= $this->db->get_where('companies', array('owner_id' => $this->session->userdata('user_id')));

		$has_company		= $query->num_rows() != 0 ? TRUE : FALSE;

		return $has_company;
	}

	function online()
	{
		$query				= $this->db->get('sessions');

		return $query->num_rows();
	}
}

/* End of file user.php */
/* Location: ./application/models/user.php */