<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User loading hook
 *
 * @subpackage	Hooks
 * @author		Razican
 * @category	Hooks
 * @link		http://www.razican.com/
 */

function load_user()
{
	log_message('debug', 'User loading initialised.');
	$CI			=& get_instance();

	$CI->user->load_data();
}


/* End of file User.php */
/* Location: ./megapublik/hooks/User.php */