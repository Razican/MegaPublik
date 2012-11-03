<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MP_Loader Class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Loader
 * @link		http://www.razican.com/
 */

class MP_Loader extends CI_Loader {

	function view($view, $vars = array(), $return = FALSE)
	{
		$CI		=& get_instance();

		$skin	= $CI->config->item('skin');
		$skin	= (isset($skin)) && ( ! empty($skin)) ? $skin.'/' : '';

		return $this->_ci_load(array('_ci_view' => $skin.$view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));

	}

	function entity($entity)
	{
		return include_once(APPPATH.'entities/'.ucfirst($entity).'.php');
	}
}


/* End of file MP_Loader.php */
/* Location: ./megapublik/core/MP_Loader.php */