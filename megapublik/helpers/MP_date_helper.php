<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Get "now" time
 *
 * Returns time() based on the $timezone parameter.
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
			$timezone	= new DateTimeZone($timezone);
			$now		= new DateTime('now', $timezone);
			$offset		= $timezone->getOffset($now);
			$time		= time() + $offset;

			return $time;
		}
	}
}


/* End of file MP_date_helper.php */
/* Location: ./megapublik/helpers/MP_date_helper.php */