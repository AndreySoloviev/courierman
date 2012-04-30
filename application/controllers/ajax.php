<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('./application/controllers/base_controller.php');

class Ajax extends Base_controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("company_model");
        $this->load->model("user_model");
        $this->load->model("courier_model");
    }
	
	public function index()
	{		
		die();
	}
	
	function persons_select($company_id) {
        $company_id = intval($company_id);
        
        $persons = $this->company_model->get_persons_from_company($company_id);
        echo "<select name=person_id  class='form_company_sel' id='person_sel'>";
        echo "<option value=\"\">Ресепшн</option>\n";
        foreach ($persons as $person) {
            echo "<option value='$person->id'>$person->surname $person->name</option>\n";
        }
        echo "</select>";
    }
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */