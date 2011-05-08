<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Get "now" time
 *
 * Returns time() or its GMT equivalent based on the config file preference
 *
 * @access	public
 * @return	integer
 */
if ( ! function_exists('now'))
{
	function now($timezone = NULL)
	{
		$CI				=& get_instance();

		if (is_null($timezone))
		{
			return time();
		}
		else
		{
			$offset		= get_offset($timezone);
			$time		= time() + $offset;

			return $time;
		}
	}
}

if ( ! function_exists('get_offset'))
{
	function get_offset($timezone)
	{
		date_default_timezone_set($timezone);
		$time			= time();
		echo $time.'<br />';
		date_default_timezone_set('UTC');

		$offset			= $time-time();
		echo $time .'<br />'. time() .'<br />';

		return $offset;
	}
}
/*
 *
 * Si recibimos una timezone, sacamos el time con esa timezone, si no,
 * lo sacamos segúin la variable de configuración.
 * USAR timezone_open(); Actualmente, get_offset no funciona correctamente.
 *
 */


/* End of file MP_date_helper.php */
/* Location: ./megapublik/helpers/MP_date_helper.php */