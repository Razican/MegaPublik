<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User Class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Libraries
 * @link		http://www.razican.com/
 */

class User
{
	public var username	= NULL;
	//all variables left.

    public function data($item, $id = NULL)
    {
		$CI =& get_instance();

		$user_id	= $CI->session->userdata('user_id');
		$id	= is_null($id) ? $user_id : $id;
		if ( ! $id)
		{
			log_message('error', 'function data() in /megapublik/libraries/User.php has not received an id');
			return $id;
		}

		//all data retrieving left.
    }
}


/* End of file User.php */
/* Location: ./megapublik/libraries/User.php */