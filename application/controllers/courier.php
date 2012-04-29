<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Courier extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("courier_model");
    }
	
	public function index()
	{		
		header("Location: /courier/documents/this_week");
	}
	
	public function documents($type)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");		
		
		switch ($type)
		{
			case "this_week" :
				$data["documents"] = $this->courier_model->get_documents(strtotime("this Monday"), strtotime("this Sunday"));
				break;
		}
		
		$this->load->view("documents_list", $data);
		
		$this->load->view("footer");
	}
	
	public function edit_document($doc_id = 0)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
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
	
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */