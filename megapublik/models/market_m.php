<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Market_m extends CI_Model
{
	function Market_m()
	{
		parent::CI_Model();
	}

	function get_market($type, $from, $to, $country)
	{
		$this->db->order_by("price", "asc");
		$this->db->order_by("time", "asc");
		$query			= $this->db->get_where('market', array('country' => $country, 'type' => $type), $from.', '.$to);
		return $query;
	}
}

/* End of file market.php */
/* Location: ./application/models/market.php */