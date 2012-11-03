<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Server class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Libraries
 * @link		http://www.razican.com/
 */

class Server {

	public function online_users()
	{
		$CI		=& get_instance();

		$CI->db->where('last_online >', now() - config_item('sess_time_to_update'));
		$CI->db->from('users');

		return $CI->db->count_all_results();
	}
}