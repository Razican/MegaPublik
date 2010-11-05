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

function experience($user)
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

/* End of file overal_helper.php */
/* Location: ./application/helpers/overal_helper.php */