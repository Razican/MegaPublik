<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Libraries
 * @link		http://www.razican.com/
 */

class User
{

	/**
	 * Load user data
	 *
	 * @access	public
	 * @param	numeric
	 * @param	bool
	 * @return	bool
	 */
	public function load_data($id = NULL, $current = TRUE)
	{
		$CI							=& get_instance();

		$user_id					= $CI->session->userdata('user_id');
		$id							= is_null($id) ? $user_id : $id;
		if ( ! $id)
		{
			$this->logged_in		= FALSE;
			return FALSE;
		}
		else
		{
			$query					= $CI->db->get_where('users', array('id' => $id));

			if ($query->num_rows() === 1)
			{
				foreach ($query->result() as $user)
				{
					foreach ($user as $key => $value)
					{
						if ($current === TRUE)
						{
							$this->$key				= $value;
							if ($CI->session->userdata('logged_in'))
							{
								$this->logged_in	= TRUE;
							}
						}
						else
						{
							$this->$id->$key		= $value;
						}
					}
				}

				if ($this->experience == 0)
				{
					$this->level	= 1;
				}
				else
				{
					$this->level	=& floor(log($this->experience/$CI->config->item('first_level'),$CI->config->item('exp_multiplier'))+2);
				}

				$this->money		= unserialize($this->money);
				$this->country		= $this->current_country($this->location);
				$states				= $CI->config->item('states');
				$this->timezone		= $states[$this->location]['timezone'];
			}
			else
			{
				log_message('error', 'Function load_data() in /megapublik/libraries/User.php has not received a valid id.');
				return FALSE;
			}
		}
    }

	/**
	 * Set user item
	 *
	 * @access	public
	 * @param	string
	 * @param	mixed
	 * @param	string
	 * @return	bool
	 */
	public function set_item($key, $value, $currency = NULL)
	{
		$CI							=& get_instance();
/*
 * Not posible yet to change money, timezone, location or country.

		if( ! is_null($currency)
		{
			$this->$key[$currency]	= $value;
		}

*/
		$CI->db->where('id', $this->id);
		if ($CI->db->update('users', array($key => $value)))
		{
			$this->$key					=	$value;
			return TRUE;
		}
		else
		{
			log_message('error', 'Function set_item() in /megapublik/libraries/User.php has failed to update data.');
			return FALSE;
		}
    }

	/**
	 * Return current country
	 *
	 * @access	public
	 * @param	integer
	 * @return	object
	 */
    public function current_country($location)
	{
		$CI							=& get_instance();

		$query = $CI->db->get('countries');

		foreach ($query->result() as $country)
		{
			$states = unserialize($country->states);
			if (in_array($location, $states))
			{
				$country			= $country->id;
				break;
			}
		}
		return $country;
	}

	/**
	 * Return user time
	 *
	 * @access	public
	 * @return	integer
	 */
	public function time()
	{
		return now($this->timezone);
	}

	/**
	 * Count online users
	 *
	 * @access	public
	 * @return	integer
	 */
	public function online()
	{
		$CI					=& get_instance();
		$query				= $CI->db->get_where('sessions', array('last_activity >' => time()-$CI->config->item('sess_time_to_update')));

		return $query->num_rows();
	}

	/**
	 * Does user have a company?
	 *
	 * @access	public
	 * @param	integer
	 * @return	bool
	 */
	public function has_company($id = NULL)
	{
		$CI					=& get_instance();

		$id					= is_null($id) ? $this->id : $id;
		$query				= $CI->db->get_where('companies', array('owner_id' => $id));

		$has_company		= $query->num_rows() != 0 ? TRUE : FALSE;

		return $has_company;
	}
}
/**
 * TO DO:
 *
 * -Functions for controllers to be able to add properties to the object.
 * 	and change user properties.
 * -We have to fillter all the info.
 * ...
 */

/* End of file User.php */
/* Location: ./megapublik/libraries/User.php */