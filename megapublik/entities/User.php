<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class
 *
 * @subpackage	Entities
 * @author		Razican
 * @category	Entities
 * @link		http://www.razican.com/
 */
class User {

	private $current;
	private $is_set;

	public function __construct($id = NULL)
	{
		$CI		=& get_instance();
		if (is_null($id))
		{
			$id	= $CI->session->userdata('user_id');
			$this->current = TRUE;
		}
		else
		{
			$this->current = FALSE;
		}

		if (is_numeric($id))
		{
			$CI->db->where('id', $id);
			$query	= $CI->db->get('users');

			if ($query->num_rows() === 0)
			{
				log_message('error', 'The user ID '.$id.'does not exist.');
				die();
			}
			else
			{
				$this->_load($query);
				$this->is_set	= TRUE;
			}

			if ($this->current) $this->last_IP = $CI->input->ip_address();
		}
		else
		{
			$username	= strtolower($id);
			$CI->db->where('username', $username);
			$query		= $CI->db->get('users');

			if ($query->num_rows() === 1)
			{
				$this->_load($query);
				$this->is_set	= TRUE;
			}
			else
			{
				$this->is_set	= FALSE;
			}
		}
	}

	public function is_set()
	{
		return $this->is_set;
	}

	private function _load($query)
	{
		foreach ($query->result() as $user);
		foreach ($user as $key => $value)
		{
			$this->$key	= $value;
		}

		$this->money	= unserialize($this->money);

		$this->country	= $this->_get_country($user->location);
		$this->state	= config_item('states')[$user->location];
		$this->timezone	= $this->state['timezone'];

		$this->level	= $this->experience == 0 ? 1 : floor(log($this->experience/config_item('first_level'), config_item('exp_multiplier'))+2);
	}

	private function _get_country($location)
	{
		$CI		=& get_instance();
		$query	= $CI->db->get('countries');

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