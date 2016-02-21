<?php
class specializationmodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}

    public function delete( $id ){
        $this->db->where('id', $id );
        $this->db->delete('specialization'); 
    }
    public function update($obj , $id){

        
        $this->db->where('id', $id);
        $this->db->update('specialization', $obj);
        
    }
    
    public function insert( $obj ){
        $this->db->insert("specialization", $obj);
        return $this->db->insert_id();
    }
    
    public function findspecialization($specialization = array()){
        $query_string = "select *
			from specialization";
        if (!empty($specialization)){
            $query_string.=" where";
            foreach($specialization as $key=>$value){
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