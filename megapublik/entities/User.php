<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class
 *
 * @subpackage	Entities
 * @author		Razican
 * @category	Entities
 * @link		http://www.razican.com/
 */
class User {

	private $current;
	private $is_set;
	private $updated;

	public function __construct($id = NULL)
	{
		$CI		=& get_instance();
		if (is_null($id))
		{
			$id	= $CI->session->userdata('user_id');
			$this->current = TRUE;
		}
		else
		{
			$this->current = FALSE;
		}

		if (is_numeric($id))
		{
			$CI->db->select('users.*, countries.currency, countries.name AS country_name', FALSE);
			$CI->db->from('users, countries');
			$CI->db->where(array('users.id' => $id, 'countries.id' => 'users.country'), NULL, FALSE);
			$query	= $CI->db->get();

			if ($query->num_rows() === 0)
			{
				log_message('error', 'The user ID '.$id.' does not exist.');
				die();
			}
			else
			{
				$this->_load($query);
				$this->is_set	= TRUE;
			}

			if ($this->current)
			{
				if ($this->last_IP !== $CI->input->ip_address() OR $this->last_online < now()-config_item('sess_time_to_update')/5)
				{
					$this->last_IP		= $CI->input->ip_address();
					$this->last_online	= now();
					$this->_update();
				}
			}
		}
		else
		{
			$username	= strtolower($id);
			$CI->db->where('username', $username);
			$query		= $CI->db->get('users');

			if ($query->num_rows() === 1)
			{
				$this->_load($query);
				$this->is_set	= TRUE;
			}
			else
			{
				$this->is_set	= FALSE;
			}
		}
	}

	public function is_set()
	{
		return $this->is_set;
	}

	public function _update()
	{
		$CI	=& get_instance();

		$data = array(
			'last_IP'		=> $this->last_IP,
			'last_online'	=> $this->last_online
			);

		$CI->db->where('id', $this->id);

		return $CI->db->update('users', $data);
	}

	public function add_money($ammount, $currency = 'MP')
	{
		return $this->_change_money($ammount, $currency);
	}

	public function deduct_money($ammount, $currency = 'MP')
	{
		return $this->_change_money($ammount*(-1), $currency);
	}

	public function has_company()
	{
		if ( ! isset($this->has_company))
		{
			$CI =& get_instance();
			$CI->db->where(array('owner_id' => $this->id));
			$CI->db->from('companies');

			$this->has_company = $CI->db->count_all_results() > 0;
		}

		return $this->has_company;
	}

	private function _load($query)
	{
		$CI =& get_instance();
		foreach ($query->result() as $user);
		foreach ($user as $key => $value)
		{
			$this->$key		= $value;
		}

		$this->money		= unserialize($this->money);
		$this->state		= config_item('states')[$user->location];
		$this->timezone		= $this->state['timezone'];
		$this->validated	= (bool) $this->validated;
		$this->level		= $this->experience == 0 ? 1 : floor(log($this->experience/config_item('first_level'), config_item('exp_multiplier'))+2);
	}

	private function _change_money($ammount, $currency = 'MP')
	{
		$ammount	= round($ammount*100)/100;

		if (isset($this->money[$currency]) && ($this->money[$currency] + $ammount >= 0))
		{
			$this->money[$currency] += $ammount;
		}
		elseif ($ammount >= 0)
		{
			$this->money[$currency]	= $ammount;
		}
		else
		{
			return FALSE;
		}

		return TRUE;
	}
}


/* End of file User.php */
/* Location: ./megapublik/entities/User.php */