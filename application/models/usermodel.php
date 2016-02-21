<?php
class usermodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
    public function insertUser($user){
        $this->db->insert("user", $user);
    }
    
    
    public function findUser($user = array()){
        $query_string = "select *
			from user";
        if (!empty($user)){
            $query_string.=" where";
            foreach($user as $key=>$value){
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
    public function isUserExist($username){
        $query = $this->db->query("select *
				from user where userName= '{$username}'");
		 $query->result();
        
		if ($query->num_rows()>=1){
            return true;	
		}
		return false;
    }
    

}