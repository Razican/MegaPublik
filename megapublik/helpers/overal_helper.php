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

function exp_percent(&$user)
{
	if ($user->level == 1)
	{
		$percentage		= round($user->experience*100/config_item('first_level'), 2);
	}
	else
	{

		$level_min_exp	= config_item('first_level')*pow(config_item('exp_multiplier'),($user->level-2));
		$next_min_exp	= config_item('first_level')*pow(config_item('exp_multiplier'),($user->level-1));
		$exp_level		= $user->experience-$level_min_exp;
		$percentage		= round($exp_level*100/($next_min_exp-$level_min_exp), 2);
	}

	return $percentage;
}

function l18n($lang)
{
	$l18n	= new stdClass;
	switch($lang)
	{
		case 'es':
			$l18n->decimal		= ',';
			$l18n->thousand		= ' ';
			$l18n->percent		= 'a';
			$l18n->percent_spc	= FALSE;
		break;
		case 'eu':
			$l18n->decimal		= ',';
			$l18n->thousand		= '.';
			$l18n->percent		= 'b';
			$l18n->percent_spc	= FALSE;
		break;
		case 'fr':
			$l18n->decimal		= ',';
			$l18n->thousand		= ' ';
			$l18n->percent		= 'a';
			$l18n->percent_spc	= TRUE;
		break;
		default:
			$l18n->decimal		= '.';
			$l18n->thousand		= ',';
			$l18n->percent		= 'a';
			$l18n->percent_spc	= FALSE;
	}

 	return $l18n;
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

function reg_img($type, $alt, $slash = TRUE)
{
	if($type === 'correct')
	{
		$src		=	'images/tick.png';

	}
	else if($type === 'wrong')
	{
		$src		=	'images/cross.png';
	}
	else if($type === 'loading')
	{
		$src		=	'images/mini_loading.gif';
	}
	else
	{
		log_message('error', 'function reg_img() has received bad arguments.');
	}

	if ($slash)
	{
		$img	= array(
			'src'		=> $src,
			'alt'		=> $alt
		);

	}
	else
	{
		$img	= '<img src="'.site_url($src).'" alt="'.$alt.'">';
	}

	return $img;
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
	$CI->load->library('server');

	return $CI->server->online_users();
}

function current_day()
{
	$CI =& get_instance();
	return floor((now($CI->user->timezone)-config_item('start_time'))/86400);
}


/* End of file overal_helper.php */
/* Location: ./megapublik/helpers/overal_helper.php */