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
			$CI->db->where('id', $id);
			$query	= $CI->db->get('users');

			if ($query->num_rows() === 0)
			{
				log_message('error', 'The user ID '.$id.'does not exist.');
				die();
			}
			else
			{
				foreach ($query->result() as $user);
				foreach ($user as $key => $value)
				{
					$this->$key	= $value;
				}

				$this->money	= unserialize($this->money);
				$this->is_set	= TRUE;
			}

			if ($this->current) $this->last_IP = $CI->input->ip_address();
		}
		else
		{
			$username	= strtolower($id);
			$CI->db->where('username', $username);
			$query		= $CI->db->get('users');

			if ($query->num_rows() === 1)
			{
				foreach ($query->result() as $user);
				foreach ($user as $key => $value)
				{
					$this->$key	= $value;
				}

				$this->money	= unserialize($this->money);
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
}