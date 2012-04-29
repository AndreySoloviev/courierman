<?

class Courier_model extends CI_Model {

    function courier_model() {
	//
    }
    
    function get_documents($date_from, $date_to)
    {
    	$query = $this->db->query("select * from documents where date >= '$date_from' and date <= '$date_to' order by date");
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
}

?>