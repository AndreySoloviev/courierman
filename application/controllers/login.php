<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Login extends Base_controller {

	public function index()
	{
		header("Location: /courier/");		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */