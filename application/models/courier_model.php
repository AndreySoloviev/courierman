<?

class Courier_model extends CI_Model {

    function courier_model() {
	//
    }
    
    function get_documents($date_from, $date_to)
    {
    	$query = $this->db->query("select * from documents where date_to_go >= '$date_from' and date_to_go <= '$date_to' order by date_to_go");
    	if ($query)
    	{
    		return $query->result();
    	}

    }
    
    function get_one_document($doc_id)
    {
    	$query = $this->db->query("select * from documents where id = '$doc_id'");
    	return $query->row();
    }
    
    function update_document($owner_id, $date, $company_id, $person_id, $notes, $backcall_id, $document_id)
    {
    	$date  = $this->useful->date_to_mysql($date);
    	
    	$data = array(
               'date_to_go' => $date,
               'company_id' => $company_id,
               'person_id' => $person_id,
               'notes' => $notes,
               'backcall_id' => $backcall_id          
            );
            
        $this->db->where('id', $document_id);
		$this->db->update('documents', $data); 		
		
    }
    
    function add_document($owner_id, $date, $company_id, $person_id, $notes, $backcall_id)
    {

    	$date  = $this->useful->date_to_mysql($date);

    	$data = array(
               'owner_id' => $owner_id,
               'date_to_go' => $date,
               'company_id' => $company_id,
               'person_id' => $person_id,
               'notes' => $notes,
               'backcall_id' => $backcall_id          
            );

		$this->db->insert('documents', $data); 		
		
    }
    
    function delete_document($id)
    {
    	$query = $this->db->query("delete from documents where id = '$id'");
		if ($query)
		{
			return true;
		}
    }
}

?>