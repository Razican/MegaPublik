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

	function __construct()
	{
		parent::__construct();
	}

	function site_url($uri = '')
	{	
		if (is_array($uri))
		{
			$uri = implode('/', $uri);
		}

		if (class_exists('CI_Controller'))
		{
			$uri = get_instance()->lang->localized($uri);			
		}

		return parent::site_url($uri);
	}
	function sess_lang()
	{	
		if (class_exists('CI_Controller'))
		{
			$language	= get_instance()->session->userdata('language');
			log_message('info', 'sess_lang() dice: '.$language);
			if($language != '')
			{
				return $language;
			}
		}
	}
}


/* End of file MP_Config.php */
/* Location: ./application/core/MP_Config.php */