<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Registration_m extends CI_Model
{
	public function countries()
	{
		$query			= $this->db->get('countries');
		$countries		= '';

		foreach ($query->result() as $country)
		{
			$countries	.= '<option value="'. $country->id .'">'. $country->name .'</option>';
		}

		return $countries;
	}

	public function states($country)
	{
		$this->db->select('states');
		$query			= $this->db->get_where('countries', array('id' => $country));
		foreach ($query->result() as $country){}

		$states			= unserialize($country->states);
		$config_states	= $this->config->item('states');

		$select			= '';
		foreach ($config_states as $id => $state)
		{
			if(in_array($id, $states))
			{
				$select	.= '<option value="'.$id.'">'.$state['name'].'</option>';
			}
		}

		return $select;
	}

	public function is_valid($string, $type = 'code')
	{
		switch ($type)
		{
			case 'code':
				$query	= $this->db->get_where('users', array('validation_str' => $string));

				if ($query->num_rows() === 0)
 				{
					return 'error/10';
 				}
				else
				{
					foreach($query->result() as $user){}
					if ($user->validated == 0)
					{
						$this->db->update('users', array('validated' => '1'), "id = ". $user->id);
						return TRUE;
					}
					else
					{
						return 'error/9';
					}
				}
			break;
			case 'ip':
				$this->db->where('reg_IP', $string);
				$this->db->or_where('last_IP', $string);
				$query	= $this->db->get('users');
				if ($query->num_rows() > 3)
 				{
					return FALSE;
				}
				else
				{
					return TRUE;
				}
			break;
			case 'user':
				$query	= $this->db->get_where('users', array('username' => $string));
				if ($query->num_rows() > 0)
				{
					return FALSE;
 				}
				else
				{
					return TRUE;
				}
			break;
			case 'email':
				$query			= $this->db->get_where('users', array('email' => $string));
				if ($query->num_rows() > 0)
				{
					return FALSE;
				}
				else
				{
					return TRUE;
				}
			break;
			default:
				log_message('error', 'function is_valid() in registration_m model has received bad arguments');
				redirect('/');
		}
	}
}


/* End of file registration_m.php */
/* Location: ./megapublik/models/registration_m.php */