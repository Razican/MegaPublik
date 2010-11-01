<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Market extends CI_Model
{
	function Market()
	{
		parent::CI_Model();
	}

	function get_market($type, $from, $to, $country)
	{
		$query			= $this->db->get_where($table, array('id' => $id), '1');
	}

	function online()
	{
		$query			= $this->db->get('sessions');

		return $query->num_rows();
	}
}

/* End of file market.php */
/* Location: ./application/models/market.php */