<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MP_Lang Class
 *
 * @subpackage	Libraries
 * @author		Jérôme Jaglale
 * @category	Libraries
 * @link		http://maestric.com/en/doc/php/codeigniter_i18n
 */

class MP_Lang extends CI_Lang {

/*
|--------------------------------------------------------------------------
| Configuration
|--------------------------------------------------------------------------
|
| $languages	-> array with all the languaes inplemented
| $special		-> Not localized URIs
|
*/

	var $languages = array(
		'es' => 'spanish',
		'en' => 'english',
		'eu' => 'basque'
	);

	var $special = array ('admin');

	function __construct()
	{

		parent::__construct();

		global $CFG, $URI, $RTR;		

		$segment = $URI->segment(1);

		if (isset($this->languages[$segment]))
		{
			$language	= $this->languages[$segment];
			$CFG->set_item('language', $language);			
		}
		else if($this->is_special($segment))
		{
			return;
		}
		else
		{
			$CFG->set_item('language', $this->languages[$this->default_lang()]);

			header("Location: " . $CFG->site_url($this->lang($CFG->item('language')).$URI->uri_string()), TRUE, 302);
			exit;
		}
	}
	
	function lang()
	{
		global $CFG;		
		$language = $CFG->item('language');
		
		$lang = array_search($language, $this->languages);
		if ($lang)
		{
			return $lang;
		}
		
		return NULL;
	}

	function is_special($uri)
	{
		$exploded = explode('/', $uri);
		if (in_array($exploded[0], $this->special))
		{
			return TRUE;
		}
		if(isset($this->languages[$uri]))
		{
			return TRUE;
		}
		return FALSE;
	}

	function switch_uri($lang)
	{
		$CI =& get_instance();

		$uri = $CI->uri->uri_string();
		if ($uri != "")
		{
			$exploded = explode('/', $uri);
			if($exploded[1] == $this->lang())
			{
				$exploded[1] = $lang;
			}
			$uri = implode('/',$exploded);
		}
		return $uri;
	}

	function has_language($uri)
	{
		$first_segment = NULL;
		
		$exploded = explode('/', $uri);
		if(isset($exploded[0]))
		{
			if($exploded[0] != '')
			{
				$first_segment = $exploded[0];
			}
			else if(isset($exploded[1]) && $exploded[1] != '')
			{
				$first_segment = $exploded[1];
			}
		}
		
		if($first_segment != NULL)
		{
			return isset($this->languages[$first_segment]);
		}
		else
		{
			return FALSE;
		}
	}

	function default_lang()
	{
		global $CFG;

		if(!$CFG->sess_lang())
		{
			$lang		= array_keys ($this->languages);
			$language	= $lang[0];
			log_message('info', 'sess_lang() no dice nada');
		}
		else
		{
			$language		= $CFG->sess_lang();
		}
		
		return $language;
	}

	function localized($uri)
	{
		if($this->has_language($uri)
		|| $this->is_special($uri)
		|| preg_match('/(.+)\.[a-zA-Z0-9]{2,4}$/', $uri))
		{}
		else
		{
			$uri = $this->lang() . '/' . $uri;
		}

		return $uri;
	}
}

/* End of file MP_Language.php */
/* Location: ./application/core/MP_Language.php */