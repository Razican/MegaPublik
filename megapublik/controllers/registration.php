<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$this->output->enable_profiler($this->config->item('debug'));

		if($this->session->userdata('logged_in'))
		{
			exit(redirect('/'));
		}

		$this->lang->load('registration');
		$this->load->model('registration_m');

		$head['menu']		= $this->load->view('menu_outgame', '', TRUE);

		$data['countries']	= $this->registration_m->countries();
		$data['head']		= $this->load->view('head', $head, TRUE);
		$data['footer']		= $this->load->view('footer', '', TRUE);

		$this->load->view('registration/register', $data);
	}
	
	function register()
	{
		$this->output->enable_profiler($this->config->item('debug'));
		if($this->session->userdata('logged_in'))
		{
			exit(redirect('/'));
		}

		$this->lang->load('registration');
		$this->load->helper('email');

		if ((!$this->input->post('username'))	OR
			(!$this->input->post('password'))	OR
			(!$this->input->post('passconf'))	OR
			(!$this->input->post('email'))		OR
			(!$this->input->post('country'))	)
		{
			redirect('error/6');
		}
		elseif ($this->input->post('password') != $this->input->post('passconf'))
		{
			redirect('error/7');
		}
		elseif (!valid_email($this->input->post('email')))
		{
			redirect('error/8');
		}
		else
		{
	 		$query				= $this->db->get_where('countries', array('ID' => $this->input->post('country')), '1');
 			foreach ($query->result() as $result)
 			{
 				$country	=& $result;
 			}

			$query			= $this->db->get_where('users', array('username' => $this->input->post('username')));
			if ($query->num_rows() > 0)
	 		{
	 			redirect('error/3');
	 		}
			$query			= $this->db->get_where('users', array('email' => $this->input->post('email')));
			if ($query->num_rows() > 0)
	 		{
	 			redirect('error/4');
	 		}
	 		$this->load->helper('string');
	 		for ($i = 1; $i != 0;)
	 		{
	 			$validation_str	=  random_string('alnum', 15);
	 			$query			= $this->db->get_where('users', array('validation_str' => $validation_str));
	 			
	 			$i = $query->num_rows();
	 		}

			$data = array(
				'username'			=> $this->input->post('username'),
				'password'			=> sha1($this->input->post('password')),
				'email'				=> $this->input->post('email'),
				'reg_IP'			=> $this->input->ip_address(),
				'last_IP'			=> $this->input->ip_address(),
				'location'			=> $this->input->post('country'),
				'validation_str'	=> $validation_str,
				'birthday'			=> time(),
				'citizenship'		=> $this->input->post('country'),
				'salary_currency'	=> $country->currency,
			);

			$this->db->insert('users', $data);

			$this->load->library('email');
			
			$config['protocol']		= 'smtp';
			$config['smtp_host']	= 'ssl://smtp.googlemail.com';
			$config['smtp_user']	= 'admin@megapublik.com';
			$config['smtp_pass']	= 'verysecretpass';
			$config['mailtype']		= 'html';
			$config['smtp_port']	= 465;
			$config['newline']		= "\r\n";

			$this->email->initialize($config);

			$this->email->from('noreply@megapublik.com', 'MegaPublik');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Registro en MegaPublik');

			$pattern			= array('%username%', '%password%', '%link%', '%url%');
			$replacement		= array($this->input->post('username'), $this->input->post('password'), anchor('registration/validate/'. $validation_str, lang('reg.here')), site_url('registration/validate/'. $validation_str));

			$data['message']	= preg_replace($pattern, $replacement, lang('reg.message'));
			$data['head']		= $this->load->view('head', '', TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$this->email->message($this->load->view('mail', $data, TRUE));
			$this->email->set_alt_message(preg_replace($pattern, $replacement, lang('reg.alt_message')));

			$this->email->send();

			$head['menu']		= $this->load->view('menu_outgame', '', TRUE);
			$data['head']		= $this->load->view('head', $head, TRUE);
			$this->load->view('registration/registration', $data);
		}
	}
	
	function validate($validation_str = '')
	{
		$this->output->enable_profiler($this->config->item('debug'));
		if (strlen($validation_str) != 15)
		{
			redirect('/');
		}
		$query				= $this->db->get_where('users', array('validation_str' => $validation_str, 'validated' => '0'));
		
		if ($query->num_rows() === 0)
 		{
 			redirect('error/9');
 		}
 		else
 		{
 			$this->lang->load('registration');
			foreach ($query->result() as $result)
			{
				$user			=& $result;
			}
			$this->db->update('users', array('validated' => '1'), "id = ". $user->id);

			$data['head']		= $this->load->view('head', '', TRUE);
			$data['footer']		= $this->load->view('footer', '', TRUE);
			$this->load->view('registration/validation', $data);
 		}
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */