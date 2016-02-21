<?php
class publishermodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
    
    public function delete( $id ){
        $this->db->where('id', $id );
        $this->db->delete('publisher'); 
    }

    public function update($obj , $id){

        
        $this->db->where('id', $id);
        $this->db->update('publisher', $obj);
        
    }
    public function insert( $obj ){
        $this->db->insert("publisher", $obj);
        return $this->db->insert_id();
    }
    
    
    public function findPublisher($publisher = array()){
        $query_string = "select *
			from publisher";
        if (!empty($publisher)){
            $query_string.=" where";
            foreach($publisher as $key=>$value){
                $query_string.=" {$key} like '{$value}' and "; 
            }
            $query_string =  substr($query_string, 0, -5);
            
        }
        $query = $this->db->query($query_string);
        $result = $query->result();
        
        if ($query->num_rows()>=1){
            return $result;
        }
        return FALSE;
    }
   
    
}