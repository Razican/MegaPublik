<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Login_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function login($username, $ip_address)
	{
		$query		= $this->db->get_where('users', array('username' => $username), '1');
		foreach ($query->result() as $result)
		{
			$user	= $result;
		}

		$this->db->update('users', array('last_IP' => $ip_address), "username = '". $username ."'");

		return $user;
	}
	
	function user()
	{
		$query	= $this->db->get_where('users', array('username' => $this->input->post('username')), '1');
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $result)
			{
				$user			=& $result;
				
				return $user;
			}
		}
	}
}

/* End of file market.php */
/* Location: ./application/models/market.php */




															
					
