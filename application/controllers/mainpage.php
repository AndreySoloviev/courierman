<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Mainpage extends Base_controller {

	public function index()
	{		
		$this->load->view("header.php");
		$this->load->view("menu.php");		
	}
	
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */