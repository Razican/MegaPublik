<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Registration_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function countries()
	{
		$query					= $this->db->get('countries');
		$countries				= '';

		foreach ($query->result() as $country)
		{
			$countries	.= '<option value="'. $country->id .'">'. $country->name .'</option>';
		}
		
		return $countries;
	}
}

/* End of file market.php */
/* Location: ./application/models/market.php */