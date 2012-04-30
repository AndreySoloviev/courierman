<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Companys extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("company_model");
    }
	
	public function index()
	{		
		$this->load->view("header.php");
		$this->load->view("menu.php");		
		
		$data["companys"] = $this->company_model->get_all_companys();
		$this->load->view("company_list", $data);
		
		$this->load->view("footer");
	}
	
	public function edit_form($company_id = 0)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		if ($company_id == 0)
		{
			$data["company"] = null;
		}
		else
		{
			$data["company"] = $this->company_model->get_company_data($company_id);
		}
		$this->load->view("company_edit_form.php", $data);
		$this->load->view("footer");		
	}
	
	public function save_company()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		
		if (!$id)
		{
			$this->company_model->add_company($name,$phone,$address);
		}
		else
		{
			$this->company_model->update_company($name,$phone,$address,$id);
		}
		
		header('Location: /companys/');

	}
		
	public function show_company($company_id)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		
		$data["company"] = $this->company_model->get_company_data($company_id);
		$data["persons"] = $this->company_model->get_persons_from_company($company_id);
		
		$this->load->view("company_info.php", $data);
		$this->load->view("footer");	
	}

	public function edit_person_form($company_id, $person_id = 0)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		
		$data["company"] = $this->company_model->get_company_data($company_id);
		
		if ($person_id == 0)
		{
			$data["person"] = null;
		}
		else
		{
			$data["person"] = $this->company_model->get_person_data($person_id);
		}
		$this->load->view("company_edit_person_form.php", $data);
		$this->load->view("footer");		
	}
	
	public function save_person()
	{
		$company_id = $this->input->post('company_id');
		$person_id = $this->input->post('person_id');
		
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$position = $this->input->post('position');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		
		if (!$person_id)
		{
			$this->company_model->add_person($company_id,$name,$surname,$position,$email,$phone);
		}
		else
		{
			$this->company_model->update_person($company_id,$name,$surname,$position,$email,$phone,$person_id);
		}
		
		header("Location: /companys/show_company/$company_id");

	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */