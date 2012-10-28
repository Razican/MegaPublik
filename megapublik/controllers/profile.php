<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function user($id = NULL)
	{
		if (is_null($id))
		{
			if($this->session->userdata('logged_in'))
			{
				$id	= $this->session->userdata('user_id');
			}
			else
			{
				redirect('/');
			}
		}

	//	if($this->session->userdata('logged_in'))
	//	{
	//		$this->user->load_data();
	//	}

	//	$this->user->load_data($id, FALSE);

		//Now we have to send all to the output.
	}
}


/* End of file profile.php */
/* Location: ./megapublik/controllers/profile.php */