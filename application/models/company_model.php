<?

class Company_model extends CI_Model {

    function company_model() {
	//
    }
    
   
    
    function get_all_companys()
    {
    	$this->db->order_by("name"); 
    	$query = $this->db->get('companys');
    	return $query->result();   	
    }
    
    function get_companys_list()
    {
    	$this->db->order_by("name"); 
    	$this->db->select('name, id');
    	$query = $this->db->get('companys');
    	return $query->result(); 
    }
    
    function get_companys_list_with_agreements()
    {
    	$query = $this->db->query("
    		select c.id, c.name from companys c, agreements a
    			where
    		c.id = a.company_id 
    			group by c.name 
    			order by c.name");
    			
    	return $query->result(); 
    }
    
    function get_company_data($company_id)
    {
    	$query = $this->db->get_where('companys', array('id' => $company_id));
    	return $query->row(); 
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