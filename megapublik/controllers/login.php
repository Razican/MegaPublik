<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->model('login_m');

		if (( ! $this->input->post('username')) OR (!$this->input->post('password')))
		{
			redirect('error/6');
		}
		else
		{
			if($this->session->userdata('logged_in'))
			{
				exit(redirect('/'));
			}

			$user	= $this->login_m->user();

			if (isset($user))
			{
				if ($user->password	!= sha1($this->input->post('password')))
				{
					redirect('error/2');
				}
				else
				{
					$user			= $this->login_m->login($this->input->post('username'), $this->input->ip_address());

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