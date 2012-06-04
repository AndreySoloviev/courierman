<?

class Booking_model extends CI_Model {

    function booking_model() {
	//
    }
    
    function get_last_bookings($count)
    {
    	return null;
    }
    
    
    //////////
       
    function update_user($name,$surname,$email,$password,$flags,$id)
    {
    	$data = array(
               'name' => $name,
               'surname' => $surname,
               'email' => $email,
               'password' => $password,
               'flags' => $flags
            
            );
        $this->db->where('id', $id);
		$this->db->update('booking', $data); 		
    }

	function add_book($data)
	{
		$this->db->insert('booking', $data); 			
	}

}

?>