<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Agreement extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("company_model");
        $this->load->model("agreement_model");
        $this->load->model("user_model");
    }
	
	public function index()
	{		
		$this->load->view("header.php");
		$this->load->view("menu.php");		
		
		$data["agreements"] = $this->agreement_model->get_last_agreements(25);
		$this->load->view("agreement/agreement_list", $data);
		
		$this->load->view("footer");
	}
	
		
	public function edit_form($agreement_id = 0)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		if ($agreement_id == 0)
		{
			$data["agreement"] = null;
		}
		else
		{
			$data["agreement"] = $this->agreement_model->get_agreement_data($agreement_id);
		}
		$this->load->view("/agreement/agreement_edit_form.php", $data);
		$this->load->view("footer");		
	}
	
	public function save_agreement()
	{
		$id = $this->input->post('id');
		
		$company_id = $this->input->post('company_id');
		$number = $this->input->post('number');
		$date_sign = $this->useful->date_to_mysql($this->input->post('date_sign'));
		
		if ( @$this->input->post('is_sent') ) 
			$is_sent = 1;
		else
			$is_sent = 0;
		
		if ( @$this->input->post('is_returned') ) 
			$is_returned = 1;
		else
			$is_returned = 0;
			
			
			
		if (!$id)
		{
			$this->agreement_model->add_agreement($number, $company_id, $date_sign, $is_sent, $is_returned);
		}
		else
		{
			$this->agreement_model->update_agreement($number, $company_id, $date_sign, $is_sent, $is_returned, $id);
		}
		
		header('Location: /agreement/');

	}
	
	public function agreement_info($agreement_id)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		
		$data["agreement"] = $this->agreement_model->get_agreement_data($agreement_id);
		$data["appositions"] = $this->agreement_model->get_agreement_appositions($agreement_id);
		
		$this->load->view("/agreement/agreement_info.php", $data);
		$this->load->view("footer");	
	}
	
	
	public function edit_apposition_form($agreement_id, $apposition_id = 0)
	{
		$this->load->view("header.php");
		$this->load->view("menu.php");
		
		$data["agreement"] = $this->agreement_model->get_agreement_data($agreement_id);
		$data["users"] = $this->user_model->get_all_users();
		
		if ($apposition_id == 0)
		{
			$data["apposition"] = null;
		}
		else
		{
			$data["apposition"] = $this->agreement_model->get_apposition_data($apposition_id);
		}
		$this->load->view("/agreement/apposition_edit_form.php", $data);
		$this->load->view("footer");		
	}

	public function save_apposition()
	{
		$id = $this->input->post('id');
		
		$number = $this->input->post('number');
		$agreement_id = $this->input->post('agreement_id');
		$type = $this->input->post('type');
		$sign_date = $this->useful->date_to_mysql($this->input->post('sign_date'));
		$invoice_date = $this->useful->date_to_mysql($this->input->post('invoice_date'));
		$payment_date = $this->useful->date_to_mysql($this->input->post('payment_date'));
		$statement_date = $this->useful->date_to_mysql($this->input->post('statement_date'));
		$user_id = $this->input->post('user_id');
		
		if ( @$this->input->post('is_statement_returned') ) 
			$is_statement_returned = 1;
		else
			$is_statement_returned = 0;
		
		if ( @$this->input->post('is_statement_signed') ) 
			$is_statement_signed = 1;
		else
			$is_statement_signed = 0;
			
			
			
		if (!$id)
		{
			$this->agreement_model->add_apposition($number, $agreement_id, $type, $sign_date, $invoice_date, $payment_date, $statement_date, $user_id, $is_statement_returned, $is_statement_signed);
		}
		else
		{
			$this->agreement_model->update_apposition($number, $agreement_id, $type, $sign_date, $invoice_date, $payment_date, $statement_date, $user_id, $is_statement_returned, $is_statement_signed, $id);
		}
		
		header('Location: /agreement/agreement_info/'.$agreement_id.'/');

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