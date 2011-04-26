<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Timezone hook
 *
 * @subpackage	Hooks
 * @author		Razican
 * @category	Hooks
 * @link		http://www.razican.com/
 */

function timezone()
{
	log_message('debug', 'Timezone hook initialised.');
	$CI			=& get_instance();

	$timezone	= $CI->config->item('timezone');
	$timezone	= (isset($timezone)) && ($timezone != '') ? $timezone : 'UTC';

	if( ! date_default_timezone_set($timezone))
	{
		log_message('error', 'Timezone not supported');
	}
}


/* End of file Timezone.php */
/* Location: ./megapublik/hooks/Timezone.php */