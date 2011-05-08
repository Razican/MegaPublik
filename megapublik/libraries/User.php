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
    public function set_data($id = NULL)
    {
		$CI							=& get_instance();

		$user_id					= $CI->session->userdata('user_id');
		$id							= is_null($id) ? $user_id : $id;
		if ( ! $id)
		{
			log_message('error', 'function set_data() in /megapublik/libraries/User.php has not received an id');
			return FALSE;
		}
		else
		{
			$query					= $CI->db->get_where('users', array('id' => $id));

			if ($query->num_rows() === 1)
			{
				foreach ($query->result_array() as $user)
				{
					foreach ($user as $key => $value)
					{
						$this->$key		= $value;
					}
				}

				$this->money		= unserialize($this->money);
				$this->country		= $this->current_country($this->location);
				$states				= $CI->config->item('states');
				$this->timezone		= $states[$this->location]['timezone'];
			}
			else
			{
				log_message('error', 'function set_data() in /megapublik/libraries/User.php has not received a valid id');
				return FALSE;
			}
		}
    }

    public function current_country($location)
	{
		$CI							=& get_instance();

		$query = $CI->db->get('countries');

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
/**
 * TO DO:
 *
 * -Functions for each controller for adding properties to the object.
 * -Retrieve data from the database and change properties.
 * -May be a function for more than one ID in the same page (e.g. profile viewing).
 * ...
 */

/* End of file User.php */
/* Location: ./megapublik/libraries/User.php */