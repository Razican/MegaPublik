<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function avatar($avatar, $username)
{
	$avatar		= array(
		'src' => 'images/avatars/'.$avatar.'.png',
		'alt' => 'Avatar - '.$username,
		'title' => 'Avatar - '.$username
	);
	return img($avatar);
}

function percent($number, $place, $space)
{
	if($place === 'a')
	{
		$percent = $space ? $number.' %' : $number.'%';
		return $percent;
	}
	else if($place === 'b')
	{
		$percent = $space ? '% '.$number : '%'.$number;
		return $percent;
	}
	else
	{
		log_message('error', 'function percent() has received bad arguments.');
	}
}

function experience($level)
{
	$array = array();

	if ($level != 1)
	{
		$array['min'] = config_item('first_level')*pow(config_item('exp_multiplier'), $level-2);
		$array['max'] = config_item('first_level')*pow(config_item('exp_multiplier'), $level-1)-1;
	}
	else
	{
		$array['min'] = 0;
		$array['max'] = config_item('first_level')-1;
	}

	return $array;
}

function l18n($lang)
{
	$CI =& get_instance();
	require_once(APPPATH.'language/'.$CI->config->item('language').'/config.php');
	if( ! isset($lang_cfg)) show_error('ERROR! language not configured correctly!');

 	return $lang_cfg;
}

function money($money, $currency)
{
	$money		= isset($money[$currency]) ? $money[$currency] : 0;

	return $money;
}

function color($percentage)
{
	if($percentage <20)
	{
		$color	= 'red';
	}
	else if($percentage <50)
	{
		$color	= 'orange';
	}
	else if($percentage <80)
	{
		$color	= 'yellow';
	}
	else
	{
		$color	= 'green';
	}

	return $color;
}

function loading($alt, $size = 'big')
{
	if($size === 'big')
	{
		$src		=	'images/loading.gif';
	}
	else if ($size === 'mini')
	{
		$src		=	'images/mini_loading.gif';
	}
	else
	{
		log_message('error', 'function loading() has received bad arguments.');
	}
	$img	= array(
		'src'		=> $src,
		'alt'		=> $alt
	);

	return $img;
}

function load_script($script)
{
	return '<script charset="UTF-8" type="text/javascript" src="'.site_url('js/'.$script.'.min.js').'"></script>';
}

/**
 * Count online users
 *
 * @return	integer
 */
function online_users()
{
	$CI		=& get_instance();
	return $CI->server->online_users();
}

function current_day()
{
	$CI =& get_instance();
	return floor((now($CI->user->timezone)-config_item('start_time'))/86400);
}


/* End of file overal_helper.php */
/* Location: ./megapublik/helpers/overal_helper.php */