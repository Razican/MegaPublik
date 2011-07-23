<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Generates non-breaking space entities based on number supplied
 *
 * @access	public
 * @param	integer
 * @return	string
 */
if ( ! function_exists('nbs'))
{
	function nbs($num = 1)
	{
		return str_repeat("&#160;", $num);
	}
}


/* End of file MP_html_helper.php */
/* Location: ./megapublik/helpers/MP_html_helper.php */
