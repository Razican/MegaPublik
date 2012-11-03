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
	$CI	=& get_instance();
	if ($CI->session->userdata('logged_in'))
	{
		log_message('debug', 'User loading initialised.');
		$CI->load->entity('user');
		$CI->user = new User();
	}
}


/* End of file User.php */
/* Location: ./megapublik/hooks/User.php */