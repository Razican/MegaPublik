<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State {

	function language()
	{		
		$CI			=& get_instance();

		$language	= $CI->session->userdata('language');
		if(($language != $CI->lang->lang()) && ($CI->lang->lang() != ''))
		{
			$CI->session->set_userdata('language', $CI->lang->lang());			
		}
		else if(($CI->lang->lang() == '') && ($language == ''))
		{
			$CI->session->set_userdata('language', $CI->lang->default_lang());			
			header("Location: " . $CI->config->site_url($CI->lang->default_lang().$CI->uri->uri_string()), TRUE, 302);
		}
		else if ($CI->lang->lang() == '')
		{			
			header("Location: " . $CI->config->site_url($language.$CI->uri->uri_string()), TRUE, 302);
		}
	}
}