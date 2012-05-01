<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Booking extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("booking_model");
    }
	
	public function index()
	{		
		$this->load->view("header.php");
		$this->load->view("menu.php");		
		
		$data["bookings"] = $this->booking_model->get_last_bookings(25);
		$this->load->view("/bookings/booking_list", $data);
		
		$this->load->view("footer");
	}
	
	public function edit_form($booking_id = 0)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		
		if ($booking_id == 0)
		{
			$data["booking"] = null;
		}
		else
		{
			$data["booking"] = $this->booking_model->get_booking_data($user_id);
		}
		$this->load->view("bookings/booking_edit_form.php", $data);
		$this->load->view("footer");		
	}
	
	public function save_user()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$email = $this->input->post('email');
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
			$this->user_model->add_user($name,$surname,$email,$password,$flags);
		}
		else
		{
			$this->user_model->update_user($name,$surname,$email,$password,$flags,$id);
		}
		
		header('Location: /users/');

	}
		
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */