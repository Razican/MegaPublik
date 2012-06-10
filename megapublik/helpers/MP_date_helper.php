<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Get "now" time
 *
 * Returns time() based on the timezone parameter or on the "timezone"
 * setting
 *
 * @param	string
 * @return	int
 */
function now($timezone = NULL)
{
	$CI			=& get_instance();

	if (is_null($timezone))
	{
		$timezone	= $CI->config->item('timezone');
	}

	$time			= time();
	if(strtolower($timezone) != 'local')
	{
		$local		= new DateTime(NULL, new DateTimeZone(date_default_timezone_get()));
		$now		= new DateTime(NULL, new DateTimeZone($timezone));
		$lcl_offset	= $local->getOffset();
		$tz_offset	= $now->getOffset();
		$offset		= $tz_offset - $lcl_offset;
		$time		= $time + $offset;
	}

	return $time;
}


/* End of file MP_date_helper.php */
/* Location: ./megapublik/helpers/MP_date_helper.php */