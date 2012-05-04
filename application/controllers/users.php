<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Users extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }
	
	public function index()
	{		
		$this->load->view("header.php");
		$this->load->view("menu.php");		
		
		$data["users"] = $this->user_model->get_all_users();
		$this->load->view("users_list", $data);
		
		$this->load->view("footer");
	}
	
	public function edit_form($user_id = 0)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		if ($user_id == 0)
		{
			$data["user"] = null;
		}
		else
		{
			$data["user"] = $this->user_model->get_user_data($user_id);
		}
		$this->load->view("users_edit_form.php", $data);
		$this->load->view("footer");		
	}
	
	public function save_user()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');
		
		$flags = 0 << 0;
			
		if ($this->input->post('is_courier')) $flags |= U_COURIER;
		if ($this->input->post('is_manager')) $flags |= U_MANAGER;
		if ($this->input->post('is_mediaboss')) $flags |= U_MEDIABOSS;
		if ($this->input->post('is_finance')) $flags |= U_FINANCE;
		if ($this->input->post('is_boss')) $flags |= U_BOSS;
		if ($this->input->post('is_banned')) $flags |= U_BANNED;
		
		if (!$id)
		{
			$this->user_model->add_user($name,$surname,$email,$phone,$password,$flags);
		}
		else
		{
			$this->user_model->update_user($name,$surname,$email,$phone,$password,$flags,$id);
		}
		
		header('Location: /users/');

	}
		
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */