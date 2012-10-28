<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User hook
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

	//$CI->user->load_data();
}

function save_user()
{
	log_message('debug', 'User saving initialised.');
	$CI			=& get_instance();

	//$CI->user->save_data();
}


/* End of file User.php */
/* Location: ./megapublik/hooks/User.php */