<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Courier extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("courier_model");
        $this->load->model("company_model");
    }
	
	public function index()
	{		
		header("Location: /courier/documents/this_week");
	}
	
	public function documents($type = "this_week")
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");		
		
		switch ($type)
		{
			case "this_week" :
				$data["documents"] = $this->courier_model->get_documents(date("Y-m-d", strtotime("this Monday")), date("Y-m-d", strtotime("this Sunday")));
			break;
		}

		$this->load->view("documents_list", $data);
		
		$this->load->view("footer");
	}
	
	public function edit_document($doc_id = 0)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		
		$data["companys"] = $this->company_model->get_companys_list();
		$data["users"] = $this->user_model->get_all_users();
		
		if ($doc_id == 0)
		{
			$data["doc"] = null;
		}
		else
		{
			$data["doc"] = $this->courier_model->get_one_document($doc_id);
		}	
	
		$this->load->view("documents_edit_form", $data);
		
		$this->load->view("footer");
	}
	
	public function save_document()
	{
		$document_id = $this->input->post('document_id');
	
		$owner_id = $this->input->post('owner_id');				
		$date = $this->input->post('date');
		$company_id = $this->input->post('company_id');
		$person_id = $this->input->post('person_id');
		$notes = $this->input->post('notes');
		$backcall_id = $this->input->post('backcall_id');
		
		if (!$document_id)
		{
			$this->courier_model->add_document($owner_id, $date, $company_id, $person_id, $notes, $backcall_id);
		}
		else
		{
			$this->courier_model->update_document($owner_id, $date, $company_id, $person_id, $notes, $backcall_id, $document_id);
		}
		
		header('Location: /courier/');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */