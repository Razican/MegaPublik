<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Login_m extends CI_Model
{
	public function login($username, $ip_address)
	{
		$query		= $this->db->get_where('users', array('username' => $username), '1');
		foreach ($query->result() as $user){}

		$this->db->update('users', array('last_IP' => $ip_address), "username = '". $username ."'");

		$this->db->where('reg_IP', $ip_address);
		$this->db->or_where('last_IP', $ip_address);		
		$query	= $this->db->get('users');

		if ($query->num_rows() > 3)
 		{
			$usernames		= NULL;
			foreach($query->result() as $user)
			{
				$usernames	.= ' | '.$user->username.' | ';
			}
			log_message('error', 'User with IP '.$ip_address.' is doing multi-accounting. Usernames: '.$usernames.'');
		}

		return $user;
	}

	public function user()
	{
		$query	= $this->db->get_where('users', array('username' => $this->input->post('username')), '1');

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $user){}
			return $user;
		}
	}
}


/* End of file login_m.php */
/* Location: ./application/models/login_m.php */