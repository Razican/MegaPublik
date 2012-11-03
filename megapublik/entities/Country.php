<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Country class
 *
 * @subpackage	Entities
 * @author		Razican
 * @category	Entities
 * @link		http://www.razican.com/
 */
class Country {

	public function __construct($id, $state = FALSE)
	{
		$CI		=& get_instance();
		if (is_null($id) OR ! is_numeric($id))
		{
			die();
		}

		if ($state)
		{
			$query	= $CI->db->get('countries');

			foreach ($query->result() as $country)
			{
				$states = unserialize($country->states);
				if (in_array($id, $states))
				{
					$this->_load_country($country);
					break;
				}
			}
		}
		else
		{
			$CI->db->where('id', $id);
			$query	= $CI->db->get('countries');

			if ($query->num_rows() === 0)
			{
				log_message('error', 'The country ID '.$id.'does not exist.');
				die();
			}
			else
			{
				$this->_load($query);
			}
		}
	}

	private function _load($query)
	{
		foreach ($query->result() as $country);
		$this->_load_country($country);
	}

	private function _load_country($country)
	{
		foreach ($country as $key => $value)
		{
			$this->$key	= $value;
		}

		$this->states	= array_intersect_key(config_item('states'), array_flip(unserialize($this->states)));
	}
}


/* End of file Country.php */
/* Location: ./megapublik/entities/Country.php */