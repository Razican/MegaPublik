<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MP_url_helper Helper
 *
 * @subpackage	Libraries
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Jérôme Jaglale
 * @link		http://maestric.com/en/doc/php/codeigniter_i18n
 */
function site_url($uri = '')
{
	if (is_array($uri))
	{
		$uri	= implode('/', $uri);
	}

	if (function_exists('get_instance'))
	{
		$CI		=& get_instance();
		$uri	= $CI->lang->localized($uri);
	}
	return $uri;
}

/* End of file MP_url_helper.php */
/* Location: ./application/helpers/MP_url_helper.php */