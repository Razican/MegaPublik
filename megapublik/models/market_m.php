<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

	public function buy_product($id, $amount, $product, $user_id, $user_money)
	{
		//Market Update
		$this->db->set('amount', 'amount -'.$amount, FALSE);
		$this->db->where('id', $id);
		$this->db->update('market');

		//Company Update
		$this->db->select('money');
		$query							= $this->db->get_where('companies', array('id' => $product->company_id), 1);

		if ($query->num_rows() === 1){
			foreach ($query->result() as $company){}
		}
		else
		{
			$return			= NULL;
			log_message('error', 'function buy_product() in /application/models/market_m.php has received bad data for $product->company_id.');
		}

		$company_money					= unserialize($company->money);
		$currency_money					= money($company_money, $product->currency);
		$new_money[$product->currency]	= round($currency_money + $amount*$product->price, 2);
		$company_money					= array_merge($company_money, $new_money);

		$this->db->set('money', serialize($company_money));
		$this->db->where('id', $product->company_id);
		$this->db->update('companies');

		//User Update
		$currency_money					= money($user_money, $product->currency);
		$new_money[$product->currency]	= round($currency_money - $amount*$product->price, 2);
		$user_money						= array_merge($user_money, $new_money);

		$this->db->set('money', serialize($user_money));
		$this->db->where('id', $user_id);
		$this->db->update('users');

		log_message('debug', number_format($amount, 0, '.', ',').' products bought with type "'.$product->type.'" and price "'.number_format($product->price, 2, '.', ',').' '.$product->currency.'" by user with ID "'.$user_id.'"');
		return TRUE;
	}
}


/* End of file market_m.php */
/* Location: ./application/models/market_m.php */