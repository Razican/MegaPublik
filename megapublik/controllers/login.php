<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (( ! $this->input->post('username')) OR (!$this->input->post('password')))
		{
			redirect('error/number/6');
		}
		else
		{
			if($this->session->userdata('logged_in'))
			{
				exit(redirect('/'));
			}

			$this->load->entity('user');
			$user	= new User($this->input->post('username'));

			if ($user->is_set())
			{
				if ($user->password	!= sha1($this->input->post('password')))
				{
					redirect('error/number/2');
				}
				else
				{
					if ( ! $this->input->post('remember'))
					{
						$this->config->set_item('sess_expire_on_close', TRUE);
					}

					$userdata	= array(
					'user_id'	=> $user->id,
					'language'	=> $this->lang->lang(),
					'logged_in'	=> TRUE
					);

					$this->session->set_userdata($userdata);

					redirect('/');
				}
			}
			else
			{
				redirect('error/number/1');
			}
		}
	}
}


/* End of file login.php */
/* Location: ./megapublik/controllers/login.php */