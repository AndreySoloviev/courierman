<?

class Adv_types_model extends CI_Model {

    function adv_types_model() {
	//
    }
    
   
    
    function get_all_types()
    {
    	$this->db->order_by("name"); 
    	$query = $this->db->get('adv_types');
    	return $query->result();   	
    }
    

    
    function get_adv_types_list()
    {
    	$this->db->order_by("name"); 
    	$this->db->select('name, id');
    	$query = $this->db->get('adv_types');
    	return $query->result(); 
    }
    
    function get_adv_type_data($adv_type_id)
    {
    	$query = $this->db->get_where('adv_types', array('id' => $adv_type_id));
    	return $query->row(); 
    }
    
       
    function update_type($name,$description,$id)
    {
    	$data = array(
               'name' => $name,
               'description' => $description          
            );
        $this->db->where('id', $id);
		$this->db->update('adv_types', $data); 		
    }

	function add_type($name,$description)
	{
		   $data = array(
               'name' => $name,
               'description' => $description
            
            );
		$this->db->insert('adv_types', $data); 			
	}
	
	
	
	
}

?>