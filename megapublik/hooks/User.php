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
	$CI			=& get_instance();
	if( ! $CI->input->is_cli_request())
	{
		log_message('debug', 'User loading initialised.');

		$CI->user->load_data();
	}
}

function save_user()
{
	$CI			=& get_instance();
	if( !  $CI->input->is_cli_request())
	{
		log_message('debug', 'User saving initialised.');

		$CI->user->save_data();
	}
}


/* End of file User.php */
/* Location: ./megapublik/hooks/User.php */
