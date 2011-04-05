<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Market_m extends CI_Model
{
	public function get_market($type, $from, $to, $country)
	{
		if (($to != 0) && (is_numeric($to)))
		{
			$this->db->order_by("price", "asc");
			$this->db->order_by("time", "asc");
			$this->db->limit($to, $from);
		}
		$query	= $this->db->get_where('market', array('country' => $country, 'type' => $type));		
		return $query;
	}

	public function buy_product($id)
	{
		echo "Not bought";
	}
}


/* End of file market_m.php */
/* Location: ./application/models/market_m.php */