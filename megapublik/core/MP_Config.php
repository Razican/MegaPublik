<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MP_Config Class
 *
 * @subpackage	Libraries
 * @author		Jérôme Jaglale
 * @category	Libraries
 * @link		http://maestric.com/en/doc/php/codeigniter_i18n
 */

class MP_Config extends CI_Config {

	function site_url($uri = '')
	{	
		if (is_array($uri))
		{
			$uri = implode('/', $uri);
		}
		
		if (function_exists('get_instance'))		
		{
			$CI =& get_instance();
			$uri = $CI->lang->localized($uri);			
		}

		return parent::site_url($uri);
	}
		
}

/* End of file MP_Config.php */
/* Location: ./application/core/MP_Config.php */