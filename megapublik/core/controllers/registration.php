<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Things to do:
	*- send confirmation email
*/
class Registration extends Controller {

	function Registration()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if($this->user->is_checked())
		{
			exit(redirect('ingame'));
		}

		$this->lang->load('registration');
		
		$query					= $this->db->get('countries');
		
		$data['countries']		= '';
		foreach ($query->result() as $country)
		{
			$data['countries']	.= '<option value="'. $country->ID .'">'. $country->name .'</option>';
		}
		
		$this->load->view('register', $data);
	}
	
	function register()
	{
		if($this->user->is_checked())
		{
			exit(redirect('ingame'));
		}

		$this->lang->load('registration');
		$this->load->helper('email');

		if ((!$this->input->post('username'))	OR
			(!$this->input->post('password'))	OR
			(!$this->input->post('passconf'))	OR
			(!$this->input->post('email'))		OR
			(!$this->input->post('country'))	)
		{
			redirect('main/error/6');
		}
		elseif ($this->input->post('password') != $this->input->post('passconf'))
		{
			redirect('main/error/7');
		}
		elseif (!valid_email($this->input->post('email')))
		{
			redirect('main/error/8');
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
	 			redirect('main/error/3');
	 		}
			$query			= $this->db->get_where('users', array('email' => $this->input->post('email')));
			if ($query->num_rows() > 0)
	 		{
	 			redirect('main/error/4');
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
			
			$config['protocol']	= 'sendmail';
			$config['charset']	= 'iso-8859-1';
			$config['mailtype']	= 'html';

			$this->email->initialize($config);

			$this->email->from('noreply@megapublik.com', 'MegaPublik');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Registro en MegaPublik');

			$pattern			= array('%username%', '%password%', '%link%', '%url%');
			$replacement		= array($this->input->post('username'), $this->input->post('password'), anchor('registration/validate/'. $validation_str, 'aquí'), site_url('registration/validate/'. $validation_str));

			$this->email->message(preg_replace($pattern, $replacement, lang('reg.message')));
			$this->email->set_alt_message(preg_replace($pattern, $replacement, lang('reg.alt_message')));
			
			$this->email->send();

			$this->load->view('registration');
		}
	}
	
	function validate($validation_str = '')
	{
		if (strlen($validation_str) != 15)
		{
			redirect('/');
		}
		$query				= $this->db->get_where('users', array('validation_str' => $validation_str, 'validated' => '0'));
		
		if ($query->num_rows() === 0)
 		{
 			redirect('main/error/9');
 		}
 		else
 		{
 			$this->lang->load('registration');
			foreach ($query->result() as $result)
			{
				$user			=& $result;
			}
			$this->db->update('users', array('validated' => '1'), "ID = ". $user->ID);
			$this->load->view('validation');
 		}
	}
}

/* End of file register.php */
/* Location: ./system/application/controllers/register.php */