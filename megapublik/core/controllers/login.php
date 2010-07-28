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
			if($this->user->is_checked())
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
					$this->load->library('encrypt');

					if ($this->input->post('remember'))
					{
						$expire		= 60*60*24*7;
					}
					else
					{
						$expire		= 0;
					}

					$value			= $this->encrypt->encode($this->input->post('username')) . '/%/' . $this->encrypt->encode($user->password);

					$cookie = array(
						'name'		=> 'MegaPublik',
						'value'		=> $value,
						'expire'	=> $expire,
						'domain'	=> 'private.megapublik.com',
					);

					set_cookie($cookie);
					$this->db->update('users', array('last_IP' => $this->input->ip_address()), "username = '". $this->input->post('username') ."'");
					//insertar en la db el user agent

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
/* Location: ./system/application/controllers/login.php */