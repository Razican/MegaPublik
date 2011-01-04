<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Market_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		log_message('debug', 'Market_m model loaded.');
	}

	function get_market($type, $from, $to, $country)
	{
		if ($to != 0)
		{
			$this->db->order_by("price", "asc");
			$this->db->order_by("time", "asc");
			$this->db->limit($to, $from);
		}
		$query			= $this->db->get_where('market', array('country' => $country, 'type' => $type));		
		return $query;
	}
}

/* End of file market_m.php */
/* Location: ./application/models/market_m.php */