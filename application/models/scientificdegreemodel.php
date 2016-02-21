<?php
class scientificdegreemodel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
    public function delete( $id ){
        $this->db->where('id', $id );
        $this->db->delete('scientificdegree'); 
    }
    public function update($obj , $id){

        
        $this->db->where('id', $id);
        $this->db->update('scientificdegree', $obj);
        
    }
    public function insert( $obj ){
        $this->db->insert("scientificdegree", $obj);
        return $this->db->insert_id();
    }
    
    public function findscientificdegree($scientificdegree = array()){
        $query_string = "select *
			from scientificdegree";
        if (!empty($scientificdegree)){
            $query_string.=" where";
            foreach($scientificdegree as $key=>$value){
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