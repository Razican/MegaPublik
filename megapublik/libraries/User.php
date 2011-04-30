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
	public var id;
	public var username;
	private var password;
	public var avatar;
	public var location;
	//some variables left.

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
/**
 * TO DO:
 *
 * -Functions for each controller for adding properties to the object.
 * -Retrieve data from the database and change properties.
 * ...
 */

/* End of file User.php */
/* Location: ./megapublik/libraries/User.php */