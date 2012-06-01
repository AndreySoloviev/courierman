<?

class Agreement_model extends CI_Model {

    function agreement_model() {
	//
    }  
    
    function get_last_agreements($count = 25)
    {
    	$this->db->limit($count);
    	$this->db->order_by("number", "desc"); 
    	$query = $this->db->get('agreements');
    	return $query->result();   	
    }
    
    function get_appositions_count($agreement_id)
    {
    	$query = $this->db->get_where('appositions', array('agreement_id' => $agreement_id));    	
    	return $query->num_rows(); 	
    }
    
    function get_agreemnts_list($company_id)
    {
    	$query = $this->db->get_where('agreements', array('company_id' => $company_id));    	
    	return $query->result();   	
    }
    
    function get_appositions_list($agreement_id)
    {
    	$query = $this->db->get_where('appositions', array('agreement_id' => $agreement_id));    	
    	return $query->result();   	
    }
    
    
   
    function get_agreement_data($agreement_id)
    {
    	$query = $this->db->get_where('agreements', array('id' => $agreement_id));
    	return $query->row(); 
    }
    
    function get_apposition_data($apposition_id)
    {
    	$query = $this->db->get_where('appositions', array('id' => $apposition_id));
    	return $query->row(); 
    }
    
    
    function update_agreement($number, $company_id, $date_sign, $is_sent, $is_returned, $id)
    {
    	$data = array(
               'number' => $number,
               'company_id' => $company_id,
               'date_sign' => $date_sign,
               'is_sent' => $is_sent,
               'is_returned' => $is_returned          
            );
        $this->db->where('id', $id);
		$this->db->update('agreements', $data); 		
    }

	function add_agreement($number, $company_id, $date_sign, $is_sent, $is_returned)
	{
    	$data = array(
               'number' => $number,
               'company_id' => $company_id,
               'date_sign' => $date_sign,
               'is_sent' => $is_sent,
               'is_returned' => $is_returned          
            );
		$this->db->insert('agreements', $data); 			
	}
    
    function get_agreement_appositions($agreement_id)
    {
    	$query = $this->db->get_where('appositions', array('agreement_id' => $agreement_id));
    	return $query->result(); 	
    }
    
    
    function update_apposition($number, $agreement_id, $type, $sign_date, $invoice_date, $payment_date, $statement_date, $user_id, $is_statement_returned, $is_statement_signed, $id)
    {
    	$data = array(
               'agreement_id' => $agreement_id,
               'number' => $number,
               'type' => $type,
               'sign_date' => $sign_date,
               'invoice_date' => $invoice_date,
               'payment_date' => $payment_date,
               'statement_date' => $statement_date,
               'user_id' => $user_id,
               'is_statement_returned' => $is_statement_returned,
               'is_statement_signed' => $is_statement_signed
                         
            );
        $this->db->where('id', $id);
		$this->db->update('appositions', $data); 		
    }
    
    
    function add_apposition($number, $agreement_id, $type, $sign_date, $invoice_date, $payment_date, $statement_date, $user_id, $is_statement_returned, $is_statement_signed)
    {
    	$data = array(
               'agreement_id' => $agreement_id,
               'number' => $number,
               'type' => $type,
               'sign_date' => $sign_date,
               'invoice_date' => $invoice_date,
               'payment_date' => $payment_date,
               'statement_date' => $statement_date,
               'user_id' => $user_id,
               'is_statement_returned' => $is_statement_returned,
               'is_statement_signed' => $is_statement_signed                         
            );

		$this->db->insert('appositions', $data); 		
    }
    
    
	function get_unpayed_agreements_count($agreement_id)
	{
		// Возвращаем кол-во неоплаченных приложений
		$query = $this->db->query("Select * from appositions where 
									agreement_id = '$agreement_id' and
									payment_date < sign_date");
		return $query->num_rows();
	}
	
	function get_unclosed_appositions_count($agreement_id)
	{
		// Возвращем кол-во приложений без закрывающих
		$query = $this->db->query("Select * from appositions where 
									agreement_id = '$agreement_id' and
									statement_date < NOW() and
									is_statement_signed = '0'");
		return $query->num_rows();
	}
	
	function get_unreturned_appositions_count($agreement_id)
	{
		// Возвращем кол-во приложений без закрывающих
		$query = $this->db->query("Select * from appositions where 
									agreement_id = '$agreement_id' and
									statement_date < NOW() and
									is_statement_signed = '1' and
									is_statement_returned = '0'");
		return $query->num_rows();
	}
    
    
    
    
    
    
    
    
    
    
    
    
    function get_companys_list()
    {
    	$this->db->order_by("name"); 
    	$this->db->select('name, id');
    	$query = $this->db->get('companys');
    	return $query->result(); 
    }
    
   
    
    public function get_company_name($company_id)
    {
    	$query = $this->db->get_where('companys', array('id' => $company_id));
    	$data = $query->row(); 
    	return $data->name;	
    }
    
    public function get_company_phone($company_id)
    {
    	$query = $this->db->get_where('companys', array('id' => $company_id));
    	$data = $query->row(); 
    	return $data->phone;	
    }

    public function get_company_address($company_id)
    {
    	$query = $this->db->get_where('companys', array('id' => $company_id));
    	$data = $query->row(); 
    	return $data->address;	
    }
        
    function get_person_data($person_id)
    {
    	$query = $this->db->get_where('persons', array('id' => $person_id));
    	return $query->row(); 
    }
    
    public function get_person_fio($user_id)
    {
	    $query = $this->db->get_where('persons', array('id' => $user_id));
    	$data = $query->row();
    	return $data->surname."&nbsp;".$data ->name;    
    }
    
    public function get_person_phone($user_id)
    {
	    $query = $this->db->get_where('persons', array('id' => $user_id));
    	$data = $query->row();
    	return $data->phone;    
    }
    
    function update_company($name,$phone,$address,$id)
    {
    	$data = array(
               'name' => $name,
               'phone' => $phone,
               'address' => $address           
            );
        $this->db->where('id', $id);
		$this->db->update('companys', $data); 		
    }

	function add_company($name,$phone,$address)
	{
		   $data = array(
               'name' => $name,
               'phone' => $phone,
               'address' => $address  
            
            );
		$this->db->insert('companys', $data); 			
	}

	function get_persons_from_company($company_id)
	{
		$this->db->order_by("surname"); 
		$query = $this->db->get_where('persons', array('company_id' => $company_id));
    	return $query->result(); 
	}
	
	public function update_person($company_id,$name,$surname,$position,$email,$phone,$person_id)
	{
		$data = array(
               'company_id' => $company_id,
               'name' => $name,
               'surname' => $surname,
               'position' => $position,
               'email' => $email,
               'phone' => $phone          
            );
        $this->db->where('id', $person_id);
		$this->db->update('persons', $data);	
	}
	
	public function add_person($company_id,$name,$surname,$position,$email,$phone)
	{
		$data = array(
               'company_id' => $company_id,
               'name' => $name,
               'surname' => $surname,
               'position' => $position,
               'email' => $email,
               'phone' => $phone          
            );
		$this->db->insert('persons', $data);	
	}
	
	
}

?>