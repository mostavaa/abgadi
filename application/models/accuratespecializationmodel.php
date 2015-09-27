<?php
class accuratespecializationmodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}

    public function delete( $id ){
        $this->db->where('id', $id );
        $this->db->delete('accurateSpecialization'); 
    }
    public function update($obj , $id){

        
        $this->db->where('id', $id);
        $this->db->update('accurateSpecialization', $obj);
        
    }
    public function insert( $obj ){
        $this->db->insert("accurateSpecialization", $obj);
        return $this->db->insert_id();
    }
    
    public function findaccurateSpecialization($accurateSpecialization = array()){
        $query_string = "select *
			from accurateSpecialization";
        if (!empty($accurateSpecialization)){
            $query_string.=" where";
            foreach($accurateSpecialization as $key=>$value){
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
    
    
    public function select(){
        $query = $this->db->query("select *
				from user");
		$result = $query->result();
        
		if ($query->num_rows()>=1){
            return $result;	
		}
		return FALSE;
    }


    

    

    public function applicant_mail_confirm($applicant_id){
    	$data = array(
			'mail_confirm' => 1
	);
        
        $this->db->where('applicant_id', $applicant_id);
        $this->db->update('applicant', $data);
        
    }

    
    
    
    
    public function getCareerExperience($career){
        $query_string = "select *
			from career_experience";
        if (!empty($career)){
            $query_string.=" where";
            foreach($career as $key=>$value){
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
    public function UpdateCareerExperience( $career,$where ){

        foreach($where as $key=>$value)
            $this->db->where($key,$value);
        
        $this->db->update('career_experience', $career);
    }
    

}