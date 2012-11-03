<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('register');
		}

		$this->output->enable_profiler($this->config->item('debug'));

		if($this->session->userdata('logged_in'))
		{
			exit(redirect('/'));
		}

		define ('AJAX', TRUE);

		$this->lang->load('register');
		$this->load->library('geography');

		$head['script']		= load_script('register');
		$head['menu']		= $this->load->view('menu_outgame', '', TRUE);

		$data['countries']	= '';
		foreach ($this->geography->get_countries(array('name')) as $id => $country)
		{
			$data['countries']	.= '<option value="'.$id.'">'.$country->name.'</option>';
		}

		$data['head']		= $this->load->view('head', $head, TRUE);
		$data['footer']		= $this->load->view('footer', '', TRUE);

		$this->load->view('registration/register', $data);
	}

	public function signup()
	{
		$this->output->enable_profiler($this->config->item('debug'));

		if($this->session->userdata('logged_in'))
		{
			exit(redirect('/'));
		}

		$this->load->helper('email');
		$this->load->library('validate');

		if (( ! $this->input->post('username'))	OR
			( ! $this->input->post('password'))	OR
			( ! $this->input->post('passconf'))	OR
			( ! $this->input->post('email'))	OR
			( ! $this->input->post('country'))	OR
			( ! $this->input->post('state')))
		{
			log_message('info', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/number/6');
		}
		elseif ($this->input->post('password') !== $this->input->post('passconf'))
		{
			log_message('info', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/number/7');
		}
		elseif ( ! valid_email($this->input->post('email')))
		{
			log_message('info', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/number/8');
		}
		elseif ( ! $this->validate->ip_address($this->input->ip_address()))
		{
			log_message('info', 'User with IP '.$this->input->ip_address().' has tried to create multiple accounts.');
			redirect('error/number/5');
		}
		elseif ( ! $this->validate->username($this->input->post('username')))
		{
			log_message('info', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/number/3');
		}
		elseif ( ! $this->validate->email($this->input->post('email')))
		{
			log_message('info', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/number/4');
		}
		else
		{
	 		$this->load->helper('string');
	 		for ($i = 1; $i !== 0;)
	 		{
	 			$validation_str	= random_string('alnum', 15);
	 			$query			= $this->db->get_where('users', array('validation_str' => $validation_str));

	 			$i = $query->num_rows();
	 		}

			$user_data = array(
				'username'			=> strtolower($this->input->post('username')),
				'name'				=> $this->input->post('username'),
				'password'			=> sha1($this->input->post('password')),
				'email'				=> $this->input->post('email'),
				'reg_IP'			=> $this->input->ip_address(),
				'last_IP'			=> $this->input->ip_address(),
				'location'			=> $this->input->post('state'),
				'country'			=> $this->input->post('country'),
				'validation_str'	=> $validation_str,
				'birthday'			=> now(),
				'citizenship'		=> $this->input->post('state'),
				'money'				=> 'a:1:{s:2:"MP";i:50000;}'
			);

			$this->db->insert('users', $user_data);

			$this->lang->load('register');
			$this->load->library('email');

			$pattern			= array('%username%', '%password%', '%link%', '%url%');
			$replacement		= array($this->input->post('username'), $this->input->post('password'), anchor('registration/validate/'. $validation_str, lang('reg.here')), site_url('registration/validate/'. $validation_str));

			$data['message']	= preg_replace($pattern, $replacement, lang('reg.message'));
			$data['head']		= $this->load->view('head', array('email' => TRUE), TRUE);
			$data['footer']		= $this->load->view('footer', array('email' => TRUE), TRUE);
			$this->email->from('noreply@razican.com', 'MegaPublik')
						->to($this->input->post('email'))
						->subject('Registro en MegaPublik')
						->message($this->load->view('mail', $data, TRUE))
						->set_alt_message(preg_replace($pattern, $replacement, lang('reg.alt_message')));

			if ( ! $this->email->send())
			{
				$this->validate($validation_str, TRUE);
				log_message('error', 'Email could not be sended');
				$data['message']	= br(1).str_replace('%password%', $this->input->post('password'), lang('reg.send_error'));
			}
			else
			{
				$data['message']	= '';
			}

			$head['menu']			= $this->load->view('menu_outgame', '', TRUE);

			$data['head']			= $this->load->view('head', $head, TRUE);
			$data['footer']			= $this->load->view('footer', '', TRUE);
			$this->load->view('registration/registration', $data);
		}
	}

	public function validate($validation_str = '', $register = FALSE)
	{
		$this->output->enable_profiler($this->config->item('debug'));

		if (strlen($validation_str) != 15)
		{
			redirect('error/number/10');
		}

		$this->load->library('validate');

		if($this->validate->validation_str($validation_str))
		{
			$this->lang->load('register');

			$head['menu']		= $this->load->view('menu_outgame', '', TRUE);

			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);

			if ( ! $register) $this->load->view('registration/validation', $data);
		}
		else
		{
			redirect('errors/9');
		}
	}

	public function request()
	{
		if ($this->input->is_ajax_request())
		{
			sleep($this->config->item('sleep'));

			$this->load->library(array('validate', 'geography'));

			$get_states = $this->input->post('get_states');
			if ( ! empty($get_states))
			{
				$states = $this->geography->get_states($this->input->post('get_states'));
				log_message('debug', 'STATES: '.print_r($states, TRUE));
				echo json_encode($states);
			}
			else
			{
				$data = array(
							'username'	=> $this->input->post('username'),
							'password'	=> $this->input->post('password'),
							'passconf'	=> $this->input->post('passconf'),
							'email'		=> $this->input->post('email'),
							'country'	=> $this->input->post('country'),
							'state'		=> $this->input->post('state')
						);

				echo json_encode($this->validate->register($data));
			}
		}
		else
		{
			log_message('info', 'User with IP '.$this->input->ip_address().' has tried to enter /registration/request without doing an AJAX request.');
			redirect('registration');
		}
	}
}


/* End of file  registration.php */
/* Location: ./megapublik/controllers/register.php */