<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Levels programmer
|--------------------------------------------------------------------------
|
| first_level		--> The amount of experience needed for first level.
| exp_multiplier	--> The multiplier to define next levels.
|
*/

$config['first_level']		= 10;
$config['exp_multiplier']	= 2;

/*
|--------------------------------------------------------------------------
| Starting time
|--------------------------------------------------------------------------
|
| the moment MegaPublik started
|
*/

$config['start_time']		= 1257807600; //mktime(0, 0, 0, 11, 10, 2009)

/*
|--------------------------------------------------------------------------
| Game Version
|--------------------------------------------------------------------------
|
| This is the default version of the game. It will appearin the admin pages
| and will be used mainly for tracking.
|
*/

$config['version']			= 'Pre-Alpha 3 (pre-release)';

/*
|--------------------------------------------------------------------------
| Security
|--------------------------------------------------------------------------
|
| Here we define the security measures needed for the users:
| 'pass_len' -> minimum number of characters a password must have
|
*/

$config['pass_len']			= 6;


/* End of file megapublik.php */
/* Location: ./megapublik/config/megapublik.php */