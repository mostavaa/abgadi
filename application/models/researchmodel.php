<?php
class researchmodel extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
    public function delete($Research){
        $this->db->where($Research); 
        $this->db->delete('research'); 
    }
    public function updateResearchByName( $data, $name){

        $this->db->where('originalFileName', $name);
        $this->db->update('research', $data);
        
        
    }
    public function updateResearchById( $data, $id){

        $this->db->where('id', $id);
        $this->db->update('research', $data);
        
        
    }
    

    public function getCountofResearchs(){
        return $this->db->count_all_results('research');
    }
    public function insertResearch( $research ){
        $this->db->insert("research", $research);
        return $this->db->insert_id();
    }
    
    public function getAllResearchesOrderdByEnterTimeDesc($offset , $limit){
        $query = $this->db->query("select * from research order by enterdTime desc LIMIT {$offset} , {$limit}");
		$result = $query->result();
        
		if ($query->num_rows()>=1){
            return $result;	
		}
		return FALSE;
    }
    
    

    public function getAllResearchesOrderdByAuthorDesc($offset , $limit){
        $query = $this->db->query("select r.id ,r.englishHeadingName ,r.arabicHeadingName,r.arabicDescription,r.englishDescription,r.keyWords,r.researchNumber,r.publishDate,r.publishCountry,r.researchType,r.specialization,r.accurateSpecialization,r.pagesCount,r.pagesFrom,r.pagesTo,r.researchFileName
        ,r.originalFileName,r.enterdTime,r.createdBy,r.publisherId from research r
        join authorReseach ar on ar.researchId=r.id
        join author a on a.id=ar.authorId
        where ar.authorNumber=0
        order by a.name LIMIT {$offset} , {$limit}");
		$result = $query->result();
        
		if ($query->num_rows()>=1){
            return $result;	
		}
		return FALSE;
    }
    
    public function getAllResearchesOrderdByPublisherDesc($offset , $limit){
        $query = $this->db->query("select r.id ,r.englishHeadingName ,r.arabicHeadingName,r.arabicDescription,r.englishDescription,r.keyWords,r.researchNumber,r.publishDate,r.publishCountry,r.researchType,r.specialization,r.accurateSpecialization,r.pagesCount,r.pagesFrom,r.pagesTo,r.researchFileName
        ,r.originalFileName,r.enterdTime,r.createdBy,r.publisherId from research r
        join publisher p on p.id=r.publisherId
        order by publisherName LIMIT {$offset} , {$limit}");
		$result = $query->result();
        
		if ($query->num_rows()>=1){
            return $result;	
		}
		return FALSE;
    }
    
    public function getAllResearchesOrderdByPublishDateDesc($offset , $limit){
        $query = $this->db->query("select * from research order by publishDate desc LIMIT {$offset} , {$limit}");
		$result = $query->result();
        
		if ($query->num_rows()>=1){
            return $result;	
		}
		return FALSE;
    }
    
    
    public function getAllResearchesOrderdByResearchDesc($offset , $limit){
        $query = $this->db->query("select * from research order by originalFileName LIMIT {$offset} , {$limit}");
		$result = $query->result();
        
		if ($query->num_rows()>=1){
            return $result;	
		}
		return FALSE;
    }
    

    public function findResearch($research = array()){
        $query_string = "select *
			from research";
        if (!empty($research)){
            $query_string.=" where";
            foreach($research as $key=>$value){
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