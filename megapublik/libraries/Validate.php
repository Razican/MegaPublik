<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Validate class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Libraries
 * @link		http://www.razican.com/
 */

class Validate
{
	public function register($data)
	{
		$validation = array();

		$validation['username']		= $this->_validate_username($data['username']);
		$validation['password']		= $this->_validate_password($data['password'], $data['username']);
		$validation['passconf']		= $data['passconf'] === $data['password'];
		$validation['email']		= $this->_validate_email($data['email']);
		$this->_validate_state($data['state'], $data['country'], $validation);

		return $validation;
	}

	private function _validate_username($username)
	{
		$CI =& get_instance();

		$CI->db->where(array('username' => $username));
		$query = $CI->db->get('users');

		return $query->num_rows() === 0;
	}

	private function _validate_password($password, $username)
	{
		return strlen($password) > config_item('pass_len') && $password != $username;
	}

	private function _validate_email($email)
	{
		$CI =& get_instance();
		$CI->load->helper('email');

		$CI->db->where(array('email' => $email));
		$query = $CI->db->get('users');

		$domain = substr(strrchr($email, "@"), 1);

		return valid_email($email) && checkdnsrr($domain, 'MX') && $query->num_rows() === 0;
	}

	private function _validate_state($state, $country, &$validation)
	{
		$CI =& get_instance();

		$CI->db->where(array('id' => $country));
		$query = $CI->db->get('countries');

		if ($query->num_rows() === 1)
		{
			$validation['country'] = TRUE;

			foreach ($query->result() as $country);
			$states_a = unserialize($country->states);

			$validation['state'] = in_array($state, $states_a);
		}
		else
		{
			$validation['country'] = $validation['state'] = FALSE;
		}
	}

	public function ip_address($ip)
	{
		//TODO multiaccounting
	}

	public function username($username)
	{
		return $this->_validate_username($username);
	}

	public function email($email)
	{
		return $this->_validate_email($email);
	}
}


/* End of file Validate.php */
/* Location: ./megapublik/libraries/Validate.php */