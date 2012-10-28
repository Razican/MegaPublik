<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Libraries
 * @link		http://www.razican.com/
 *
 * @todo Cosas por hacer:
 *		-Functions for controllers to save properties.
 *		-We have to fillter all the info.
 *		-$this->user->ban()
 *		-$this->user->fight()
 *		-$this->user->register()
 *		-$this->user->add_medal()
 *		-$this->user->validate()
 */

class User
{
	private $changed_id	= array();
	private $changeable	= array(
								'username',
								'password',
								'email',
								'last_IP',
								'location',
								'party_id',
								'house_id',
								'wellness',
								'happyness',
								'productivity',
								'experience',
								'manufacturing',
								'land',
								'construction',
								'strench'
							);

	/**
	 * Load user data
	 *
	 * @access	public
	 * @param	int
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
								$this->logged_in	= TRUE;
						}
						else
						{
							$this->$id->$key		= $value;
						}
					}
				}

				if ($current === TRUE)
				{
					if ($this->experience == 0)
					{
						$this->level	= 1;
					}
					else
					{
						$this->level	=& floor(log($this->experience/$CI->config->item('first_level'),$CI->config->item('exp_multiplier'))+2);
					}

					$this->money		= unserialize($this->money);

					foreach ($this->money as $currency => $money)
					{
						$this->money[$currency]	= $money/100;
					}

					$this->country		= $this->current_country($this->location);
					$states				= $CI->config->item('states');
					$this->timezone		= $states[$this->location]['timezone'];
				}
				else
				{
					if ($this->experience == 0)
					{
						$this->$id->level	= 1;
					}
					else
					{
						$this->$id->level	=& floor(log($this->experience/$CI->config->item('first_level'),$CI->config->item('exp_multiplier'))+2);
					}

					$this->$id->money		= unserialize($this->money);

					foreach ($this->$id->money as $currency => $money)
					{
						$this->$id->money[$currency]	= $money/100;
					}

					$this->$id->country		= $this->current_country($this->location);
					$states					= $CI->config->item('states');
					$this->$id->timezone	= $states[$this->location]['timezone'];
				}
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
	 * Should only be used if more than one parameter will be changed
	 * and only for current user, even if it works for other users, the
	 * other user must be loaded using
	 *
	 * $this->user->load_data($id, FALSE);
	 *
	 * so it will consume a huge ammount of memory, which is unnecessary
	 * when changing only a property or their money. In that last case
	 * $this->user->add_money() and $this->user->reduce_money() should
	 * be used.
	 *
	 * @access	public
	 * @param	string
	 * @param	mixed
	 * @param	string
	 * @param	integer
	 * @return	bool
	 */
	public function set_item($key, $value, $currency = NULL, $id = NULL)
	{
		$CI	=& get_instance();

		$id	= is_null($id) ? $this->id : $id;

		if( ! in_array($key, $this->changeable))
		{
			log_message('error', 'Function set_item() in /megapublik/libraries/User.php has failed to update data.');
			return FALSE;
		}
		else
		{
			switch($key)
			{
				case 'location':
					if($id === $this->id)
					{
						$states					= $CI->config->item('states');
						$this->location			= $value;
						$this->country			= $this->current_country($this->location);
						$this->timezone			= $states[$this->location]['timezone'];
					}
					else if(isset($this->$id))
					{
						$states					= $CI->config->item('states');
						$this->$id->location	= $value;
						$this->$id->country		= $this->current_country($this->$id->location);
						$this->$id->timezone	= $states[$this->$id->location]['timezone'];
					}
					else
					{
						log_message('error', 'Function set_item() in /megapublik/libraries/User.php has failed to update data.');
						return FALSE;
						break;
					}

					if( ! in_array($id, $this->changed_id))
						$this->changed_id[]			= $id;

					return TRUE;
				break;
				default:
					if($id === $this->id)
						$this->$key					= $value;
					else if(isset($this->$id))
						$this->$id->$key			= $value;
					else
					{
						log_message('error', 'Function set_item() in /megapublik/libraries/User.php has failed to update data.');
						return FALSE;
						break;
					}

					if( ! in_array($id, $this->changed_id))
						$this->changed_id[]			= $id;

					return TRUE;
			}
		}
    }

    /**
	 * Save user(s) data
	 *
	 * @access	public
	 * @return	boolean
	 */
    public function save_data()
	{
		$CI		=& get_instance();

		if(isset($this->id) && ( ! in_array($this->id, $this->changed_id)))
		{
			$update = array('last_IP' => $CI->input->ip_address());
			$CI->db->update('users', $update, array('id' => $this->id));
		}

		if( ! empty($this->changed_id))
		{
			foreach ($this->changed_id as $id)
			{
				if($id === $this->id)
				{
					foreach($this->money as $currency => $money){ $this->money[$currency] = round($money*100); }
					$this->money				= serialize($this->money);

					foreach($this->changeable as $key){ $this->update[$key] = $this->$key; }
					$this->update['last_IP']	= $CI->input->ip_address();
				}
				else
				{
					foreach($this->$id->money as $currency => $money){ $this->$id->money[$currency] = round($money*100); }
					$this->$id->money			= serialize($this->$id->money);

					foreach($this->changeable as $key){ $this->update[$key] = $this->$id->$key; }
				}

				$CI->db->update('users', $this->update, array('id' => $id));
			}
		}
		return TRUE;
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

	/**
	 * Add money to user
	 *
	 * @access	public
	 * @param	number
	 * @param	string
	 * @param	integer
	 * @return	bool
	 */
	public function add_money($amount, $currency, $id = NULL)
	{
		return $this->_change_money($amount, $currency, $id, TRUE);
	}

	/**
	 * Reduce the money of one user
	 *
	 * @access	public
	 * @param	number
	 * @param	string
	 * @param	integer
	 * @return	bool
	 */
	public function reduce_money($amount, $currency, $id = NULL)
	{
		return $this->_change_money($amount, $currency, $id, FALSE);
	}

	/**
	 * Change the money of one user
	 *
	 * @access	protected
	 * @param	number
	 * @param	string
	 * @param	integer
	 * @param	bool
	 * @return	bool
	 */
	protected function _change_money($amount, $currency, $id, $add)
	{
		$CI					=& get_instance();

		$id					= (is_null($id) && isset($this->id)) ? $this->id : $id;

		if(is_null($id))
		{
			return FALSE;
		}
		else
		{
			if($id === $this->id)
			{
				if($add)
					$this->money[$currency]				= empty($this->money[$currency]) ? $amount : $this->money[$currency] + $amount;
				else
				{
					if((empty($this->money[$currency]) OR ($this->money[$currency] - $amount < 0)))
					{
						return FALSE;
					}
					else
						$this->money[$currency]			= $this->money[$currency] - $amount;
				}

				$money									= $this->money;
			}
			else if(isset($this->$id))
			{
				if($add)
					$this->$id->money[$currency]		= empty($this->$id->money[$currency]) ? $amount : $this->$id->money[$currency] + $amount;
				else
				{
					if((empty($this->$id->money[$currency]) OR ($this->$id->money[$currency] - $amount < 0)))
					{
						return FALSE;
					}
					else
						$this->$id->money[$currency]	= $this->$id->money[$currency] - $amount;
				}

				$money									= $this->$id->money;
			}
			else
			{
				$CI->db->where('id', $id);
				$CI->db->select('money');
				$query	= $CI->db->get('users');

				if($query->num_rows != 1)
				{
					log_message('error', 'Bad id when changing money. Current user\'s IP address: '.$CI->input->ip_address());
					return FALSE;
				}

				foreach($query->result() as $user){ $user->money	= unserialize($user->money); }
				foreach($user->money as $f_currency => $f_amount){ $user->money[$f_currency]	= $f_amount/100; }

				if($add)
					$user->money[$currency]				= empty($user->money[$currency]) ? $amount : $user->money[$currency] + $amount;
				else
				{
					if((empty($user->money[$currency]) OR ($user->money[$currency] - $amount < 0)))
					{
						return FALSE;
					}
					else
						$user->money[$currency]			= $user->money[$currency] - $amount;
				}

				$money									= $user->money;
			}

			foreach($money as $currency => $amount){ $money[$currency] = round($amount*100); }
			$money	= serialize($money);

			$CI->db->where('id', $id);
			$CI->db->set('money', $money);
			$CI->db->update('users');

			return TRUE;
		}
	}
}


/* End of file User.php */
/* Location: ./megapublik/libraries/User.php */