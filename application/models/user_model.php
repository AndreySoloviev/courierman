<?

class User_model extends CI_Model {

    function user_model() {
	//
    }
    
    function authenticate($email, $password)
    {
    	$query = $this->db->get_where('users', array('email' => $email));    	
    	if ($query && $query->num_rows() > 0)
    	{
    		$row = $query->row(); 
    		if ($row->password == $password)
    		{
    			$user_data = array("id" => $row->id, "name" => $row->name, "surname" => $row->surname, "email" => $row->email, "flags" => $row->flags);
    			return $user_data;
    		}
    		else
    		{
    			return false;
    		}
    	}
    	else
    	{
    		return false;
    	}
    }
    
    function get_all_users()
    {
    	$query = $this->db->get('users');
    	return $query->result();   	
    }
    
    
    function get_user_data($user_id)
    {
    	$query = $this->db->get_where('users', array('id' => $user_id));
    	return $query->row(); 
    }
    
    
    public function get_user_fio($user_id)
    {
	    $query = $this->db->get_where('users', array('id' => $user_id));
    	$data = $query->row();
    	return $data->surname." ".$data->name;    
    }
    
    
    function update_user($name,$surname,$email,$phone,$password,$flags,$id)
    {
    	$data = array(
               'name' => $name,
               'surname' => $surname,
               'email' => $email,
               'phone' => $phone,
               'password' => $password,
               'flags' => $flags
            
            );
        $this->db->where('id', $id);
		$this->db->update('users', $data); 		
    }

	function add_user($name,$surname,$email,$phone,$password,$flags)
	{
		   $data = array(
               'name' => $name,
               'surname' => $surname,
               'email' => $email,
               'phone' => $phone,
               'password' => $password,
               'flags' => $flags
            
            );

		$this->db->insert('users', $data); 			
	}

}

?>