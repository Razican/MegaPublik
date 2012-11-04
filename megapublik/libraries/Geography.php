<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Geography class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Libraries
 * @link		http://www.razican.com/
 */

class Geography {

	public function get_countries($columns = NULL)
	{
		$CI		=& get_instance();

		if (is_array($columns) && ! empty($columns))
		{
			$CI->db->select('id, '.implode(', ', $columns));
		}

		$query			= $CI->db->get('countries');
		$countries		= array();

		foreach ($query->result() as $country)
		{
			$countries[$country->id]	= $country;
		}

		return $countries;
	}

	public function get_states($country_id)
	{
		$CI		=& get_instance();

		$CI->db->select('states');
		$CI->db->where('id', $country_id);
		$query			= $CI->db->get('countries');

		foreach ($query->result() as $country);

		$states			= unserialize($country->states);
		$config_states	= config_item('states');

		$array = array();
		foreach ($config_states as $id => $state)
		{
			if(in_array($id, $states))
			{
				$array[$id]	= $state['name'];
			}
		}

		return $array;
	}
}


/* End of file Geography.php */
/* Location: ./megapublik/libraries/Geography.php */