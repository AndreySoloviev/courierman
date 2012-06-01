<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Ajax extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("company_model");
        $this->load->model("user_model");
        $this->load->model("courier_model");
        $this->load->model("agreement_model");
    }
	
	public function index()
	{		
		die();
	}
	
	function persons_select($company_id) {
        $company_id = intval($company_id);
        
        $persons = $this->company_model->get_persons_from_company($company_id);
        echo "<select name=company_id  class='form_company_sel' id='form_company_sel'>";
        echo "<option value=\"\">Ресепшн</option>\n";
        foreach ($persons as $person) {
            echo "<option value='$person->id'>$person->surname $person->name</option>\n";
        }
        echo "</select>";
    }
      
    function dogovor_select($company_id) {
        $company_id = intval($company_id);
        
        $agreements = $this->agreement_model->get_agreemnts_list($company_id);
        echo "\n<select name=agreement_number  id=agreement_number class=agreement_number  onchange='formAppositionsAjaxValue();'>";
        echo "<option value=\"0\">-- Укажите номер договора --</option>\n";
        foreach ($agreements as $agreement) {
            echo "<option value='$agreement->id'>$agreement->number от ".$this->useful->date_human_from_mysql($agreement->date_sign)."</option>\n";
        }
        echo "</select> ";
    }
    
    function apposition_select($agreement_id) {
        $agreemnt_id = intval($agreement_id);
        
        $aps = $this->agreement_model->get_appositions_list($agreement_id);
        echo "\n<select name=doc_apposition id=doc_apposition class=doc_apposition'>";
        echo "<option value=\"0\">-- Укажите приложение --</option>\n";
        foreach ($aps as $ap) {
            echo "<option value='$ap->id'>$ap->number  (закрываем ".$this->useful->date_human_from_mysql($ap->statement_date).")</option>\n";
        }
        echo "</select> ";
    }  
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */