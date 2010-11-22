<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function avatar($user)
{
	$avatar		= array(
		'src' => 'images/avatars/'.$user->avatar.'.png',
		'alt' => 'Avatar - '.$user->username,
		'title' => 'Avatar - '.$user->username
	);
	return $avatar;
}

function exp_percent($user)
{
	global $CFG;
	if ($user->level == 1)
	{
		$percentage		= round($user->experience*100/$CFG->item('first_level'), 2);
	}
	else
	{
		
		$level_min_exp	= $CFG->item('first_level')*pow($CFG->item('exp_multiplier'),($user->level-2));
		$next_min_exp	= $CFG->item('first_level')*pow($CFG->item('exp_multiplier'),($user->level-1));
		$exp_level		= $user->experience-$level_min_exp;
		$percentage		= round($exp_level*100/($next_min_exp-$level_min_exp), 2);
	}

	return $percentage;
}

function l18n($lang)
{
	if(($lang === 'es') OR ($lang === 'fr'))
	{
		$l18n->dec	= ',';
		$l18n->thou	= ' ';
	}
	else if($lang === 'eu')
	{
		$l18n->dec	= ',';
		$l18n->thou	= '.';
	}
	else
	{
		$l18n->dec	= '.';
		$l18n->thou	= ',';
	}
	
	return $l18n;
}

function country_money($user, $country)
{
	$country_currency	= $country->currency;
	$country_money		= $user->$country_currency;
	
	return $country_money;
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

/* End of file overal_helper.php */
/* Location: ./application/helpers/overal_helper.php */