<?php
class jobmodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
    public function delete( $id ){
        $this->db->where('id', $id );
        $this->db->delete('job'); 
    }

    public function update($obj , $id){

        
        $this->db->where('id', $id);
        $this->db->update('job', $obj);
        
    }
    public function insert( $obj ){
        $this->db->insert("job", $obj);
        return $this->db->insert_id();
    }
    
    public function findjob($job = array()){
        $query_string = "select *
			from job";
        if (!empty($job)){
            $query_string.=" where";
            foreach($job as $key=>$value){
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