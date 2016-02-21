<?php
class authorresearchmodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
    public function delete($authResearch){
        $this->db->where($authResearch); 
        $this->db->delete('authorReseach'); 
    }
    
    public function insert( $object ){
        $this->db->insert("authorReseach", $object);
    }
    
    public function findauthorresearch($authorresearch = array()){
        $query_string = "select *
			from authorReseach";
        if (!empty($authorresearch)){
            $query_string.=" where";
            foreach($authorresearch as $key=>$value){
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