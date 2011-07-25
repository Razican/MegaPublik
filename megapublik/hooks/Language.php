<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Language hook
 *
 * @subpackage	Hooks
 * @author		Razican
 * @category	Hooks
 * @link		http://www.razican.com/
 */

function language()
{
	$CI			=& get_instance();
	if( !  $CI->input->is_cli_request())
	{
		log_message('debug', 'Language hook initialised.');

		$language	= $CI->session->userdata('language');
		if(($language != $CI->lang->lang()) && ($CI->lang->lang() != ''))
		{
		$CI->session->set_userdata('language', $CI->lang->lang());
		}
		else if(($CI->lang->lang() == '') && ($language == ''))
		{
			$CI->session->set_userdata('language', $CI->lang->default_lang());
			log_message('debug', 'Redirect to '.$CI->lang->default_lang().$CI->uri->uri_string());
			redirect($CI->lang->default_lang().$CI->uri->uri_string(), 'location', 302);
		}
		else if ($CI->lang->lang() == '')
		{
			log_message('debug', 'Redirect to '.$language.'/'.$CI->uri->uri_string());
			redirect($language.'/'.$CI->uri->uri_string(), 'location', 302);
		}
	}
}


/* End of file Language.php */
/* Location: ./megapublik/hooks/Language.php */
