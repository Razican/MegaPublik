<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Model
{
	function User()
	{
		parent::CI_Model();
	}

	function is_checked()
	{
		$this->load->library('encrypt');
		
		$cookie				= get_cookie('MegaPublik');
		if ($cookie)
		{
			$cookie			= explode("/%/", $cookie);
			$cookie_user	= $this->encrypt->decode($cookie[0]);
			$query			= $this->db->get_where('users', array('username' => $cookie_user), '1');

			if($query->num_rows() === 1)
			{
				foreach ($query->result() as $result)
				{
					$user	=& $result;
				}
				if (($user->password == $this->encrypt->decode($cookie[1])) && ($user->last_IP == $this->input->ip_address()))
				{
					return TRUE;
				}
				else
				{
					delete_cookie('MegaPublik');
					return FALSE;
				}

			}
		}
		else
		{
			return FALSE;
		}
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
	
	function id($type = 'user')
	{
		$this->load->library('encrypt');

		$cookie		= get_cookie('MegaPublik');
		$cookie		= explode("/%/", $cookie);
		$username	= $this->encrypt->decode($cookie[0]);

		$query		= $this->db->get_where('users', array('username' => $username), '1');
		
		foreach ($query->result() as $result)
		{
			$return	=& $result;
		}
		
		return $return->id;
	}
}

/* End of file overal_helper.php */
/* Location: ./system/application/helpers/overal_helper.php */