<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Controller {

	function Login()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if ((!$this->input->post('username')) OR (!$this->input->post('password')))
		{
			redirect('error/6');
		}
		else
		{
			if($this->session->userdata('logged_in'))
			{
				exit(redirect('/'));
			}

			$query	= $this->db->get_where('users', array('username' => $this->input->post('username')), '1');

			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $result)
				{
					$user			=& $result;
				}
				if ($user->password		!= sha1($this->input->post('password')))
				{
					redirect('error/2');
				}
				else
				{
					$query		= $this->db->get_where('users', array('username' => $this->input->post('username')), '1');
					foreach ($query->result() as $result)
					{
						$user	= $result;
					}
					if (!$this->input->post('remember'))
					{
						$this->config->set_item('sess_expire_on_close', TRUE);
					}
					
					$userdata	= array(
					'user_id'	=> $user->id,					
					'username'  => $this->input->post('username'),
					'language'	=> $this->lang->lang(),					
					'logged_in' => TRUE
					);

					$this->session->set_userdata($userdata);
															
					$this->db->update('users', array('last_IP' => $this->input->ip_address()), "username = '". $this->input->post('username') ."'");

					redirect('/');
				}
			}
			else
			{
				redirect('error/1');
			}
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */