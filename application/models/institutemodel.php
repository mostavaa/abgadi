<?php
class institutemodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
    public function delete( $id ){
        $this->db->where('id', $id );
        $this->db->delete('institute'); 
    }
    
    public function update($obj , $id){

        
        $this->db->where('id', $id);
        $this->db->update('institute', $obj);
        
    }
    public function insert( $obj ){
        $this->db->insert("institute", $obj);
        return $this->db->insert_id();
    }

    public function findInstitute($institute = array()){
        $query_string = "select *
			from institute";
        if (!empty($institute)){
            $query_string.=" where";
            foreach($institute as $key=>$value){
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