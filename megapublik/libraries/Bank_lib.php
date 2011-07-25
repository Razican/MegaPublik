<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Bank Class
 *
 * @subpackage	Libraries
 * @author		Razican
 * @category	Libraries
 * @link		http://www.razican.com/
 */

class Bank_lib
{
	public function load_banks()
	{
		$this->bank_list	= array(
								1 => array('avatar' => 'default', 'name' => 'Banco de pruebas', 'cred_int' => 8.23, 'inv_int' => 2.4, 'clients' => 2340)
							);

		$this->bank_amount	= count($this->bank_list);
		return TRUE;
	}
}


/* End of file Bank_lib.php */
/* Location: ./megapublik/libraries/Bank_lib.php */
