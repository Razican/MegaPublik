<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function index()
	{
		if($this->uri->segment(3))
		{
			redirect('registration');
		}

		$this->output->enable_profiler($this->config->item('debug'));		

		if($this->session->userdata('logged_in'))
		{
			exit(redirect('/'));
		}

		//define ('AJAX', TRUE);

		$this->lang->load('registration');
		$this->load->model('registration_m');

		$script['correct']	= reg_img('correct', lang('reg.correct'));
		$script['wrong']	= reg_img('wrong', lang('reg.wrong'));
		$script['comp_img']	= reg_img('correct', lang('reg.correct'), FALSE);
		$script['loading']	= reg_img('loading', lang('reg.loading'));

		$head['script']		= $this->load->view('registration/registration_ajax', $script, TRUE);
		$head['menu']		= $this->load->view('menu_outgame', '', TRUE);		

		$data['countries']	= $this->registration_m->countries();
		$data['head']		= $this->load->view('head', $head, TRUE);
		$data['footer']		= $this->load->view('footer', '', TRUE);

		$this->load->view('registration/register', $data);
	}
	
	public function register()
	{
		$this->output->enable_profiler($this->config->item('debug'));		

		if($this->session->userdata('logged_in'))
		{
			exit(redirect('/'));
		}

		$this->load->helper('email');
		$this->load->model('registration_m');

		if ((!$this->input->post('username'))	OR
			(!$this->input->post('password'))	OR
			(!$this->input->post('passconf'))	OR
			(!$this->input->post('email'))		OR
			(!$this->input->post('country'))	)
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/6');
		}
		else if ($this->input->post('password') != $this->input->post('passconf'))
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/7');
		}
		else if (!valid_email($this->input->post('email')))
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/8');
		}
		else if (!$this->registration_m->is_valid($this->input->ip_address(), 'ip'))
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to create multiple accounts.');
			redirect('error/5');
		}
		else if ($this->registration_m->is_valid($this->input->post('username'), 'user') === FALSE)
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/3');
		}
		else if ($this->registration_m->is_valid($this->input->post('email'), 'email') === FALSE)
		{
			//log_message('error', 'User with IP '.$this->input->ip_address().' has tried to hack JQuery at the registration.');
			redirect('error/4');
		}
		else
		{
	 		$this->load->helper('string');
	 		for ($i = 1; $i != 0;)
	 		{
	 			$validation_str	=  random_string('alnum', 15);
	 			$query			= $this->db->get_where('users', array('validation_str' => $validation_str));
	 			
	 			$i = $query->num_rows();
	 		}

			$user_data = array(
				'username'			=> $this->input->post('username'),
				'password'			=> sha1($this->input->post('password')),
				'email'				=> $this->input->post('email'),
				'reg_IP'			=> $this->input->ip_address(),
				'last_IP'			=> $this->input->ip_address(),
				'location'			=> $this->input->post('country'),
				'validation_str'	=> $validation_str,
				'birthday'			=> now(),
				'citizenship'		=> $this->input->post('country'),
				'money'				=> 'a:1:{s:2:"MP";i:50000;}'
			);

			$this->db->insert('users', $user_data);

			$this->lang->load('registration');
			$this->load->library('email');

			$pattern			= array('%username%', '%password%', '%link%', '%url%');
			$replacement		= array($this->input->post('username'), $this->input->post('password'), anchor('registration/validate/'. $validation_str, lang('reg.here')), site_url('registration/validate/'. $validation_str));

			$head['email']		= TRUE;			
			$footer['email']	= TRUE;

			$data['message']	= preg_replace($pattern, $replacement, lang('reg.message'));
			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', $footer, TRUE);
			$this->email->from('noreply@megapublik.com', 'MegaPublik')
						->to($this->input->post('email'))
						->subject('Registro en MegaPublik')
						->message($this->load->view('mail', $data, TRUE))
						->set_alt_message(preg_replace($pattern, $replacement, lang('reg.alt_message')))
						->send();
			
			$head['email']		= FALSE;

			$head['menu']		= $this->load->view('menu_outgame', '', TRUE);			

			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$this->load->view('registration/registration', $data);
		}
	}

	public function validate($validation_str = '')
	{
		$this->output->enable_profiler($this->config->item('debug'));		

		if (strlen($validation_str) != 15)
		{
			redirect('error/10');
		}

		$this->load->model('registration_m');

		if($this->registration_m->is_valid($validation_str) === TRUE)
		{
			$this->lang->load('registration');

			$head['menu']		= $this->load->view('menu_outgame', '', TRUE);

			$data['head']		= $this->load->view('head', $head, TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);

			$this->load->view('registration/validation', $data);
		}
		else
		{
			redirect($this->registration_m->is_valid($validation_str));
		}		
	}

	public function request($type = 'user', $value = NULL)
	{
		if ($this->input->is_ajax_request())
		{			
			//sleep(1);

			$this->lang->load('registration');
			$this->load->model('registration_m');

			switch ($type)
			{
				case 'states':
					$data['states']			= $this->registration_m->states($value);
					$this->load->view('registration/states', $data);
				break;				
				default:
				log_message('debug', str_replace('~', '@', $value));
					$validated	= $this->registration_m->is_valid(str_replace('~', '@', $value), $type);									
					$data['validated']		= '';
					if ($validated === FALSE)
					{
						$data['validated']	= lang('reg.too_'.$type);
					}
					$this->load->view('registration/result', $data);
			}
		}
		else
		{
			log_message('error', 'User with IP '.$this->input->ip_address().' has tried to enter /registration/request without doing an AJAX request.');
			redirect('registration');
		}
	}
}


/* End of file register.php */
/* Location: ./application/controllers/register.php */