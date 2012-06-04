<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Booking extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("booking_model");
        $this->load->model("company_model");
        $this->load->model("agreement_model");
        $this->load->model("adv_types_model");
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
		
		$data["companys"] = $this->company_model->get_companys_list();
		$data["adv_types"] = $this->adv_types_model->get_adv_types_list();
		$data["users"] = $this->user_model->get_all_users();
		$data["companys_with_agreement"] = $this->company_model->get_companys_list_with_agreements();
		
		$this->load->view("bookings/booking_edit_form.php", $data);
		$this->load->view("footer");		
	}
	
	public function save_data()
	{
		$id = $this->input->post('id');
		
		$data = $this->input->post();
		

		
		if (!$id)
		{
			$this->booking_model->add_book($data);
		}
		else
		{
			unset($data['id']);
			$this->booking_model->update_book($data,$id);
		}
		
		header('Location: /booking/');

	}
		
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */