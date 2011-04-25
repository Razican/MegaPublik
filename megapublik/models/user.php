<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Model
{
	public function data($id, $table = 'users')
	{
		$query				= $this->db->get_where($table, array('id' => $id));

		if ($query->num_rows() === 1){
			foreach ($query->result() as $return){}
		}
		else
		{
			$return			= NULL;
			log_message('error', 'function data() in /application/models/user.php has received bad data for argument 1 ($id).');
		}
		if ($table === 'users')
		{
			if ($return->experience == 0)
			{
				$return->level	= 1;
			}
			else
			{
				$return->level	= floor(log($return->experience/$this->config->item('first_level'),$this->config->item('exp_multiplier'))+2);
			}

			$return->money		= unserialize($return->money);

			$return->country	= $this->user->current_country($return->location);

			$state				= $this->config->item('states');
			$return->timezone	= $state[$return->location]['timezone'];
		}
		return $return;
	}

	public function has_company()
	{
		$query				= $this->db->get_where('companies', array('owner_id' => $this->session->userdata('user_id')));

		$has_company		= $query->num_rows() != 0 ? TRUE : FALSE;

		return $has_company;
	}

	public function online()
	{
		$query				= $this->db->get_where('sessions', array('last_activity >' => now()-$this->config->item('sess_time_to_update')));

		return $query->num_rows();
	}

	public function current_country($location)
	{
		$query = $this->db->get('countries');

		foreach ($query->result() as $country)
		{
			$states = unserialize($country->states);
			if (in_array($location, $states))
			{
				$country	= $country->id;
				break;
			}
		}

		return $country;
	}
}


/* End of file user.php */
/* Location: ./application/models/user.php */