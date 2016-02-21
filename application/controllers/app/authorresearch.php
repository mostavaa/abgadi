<?php

/**
 * authorresearch short summary.
 *
 * authorresearch description.
 *
 * @version 1.0
 * @authorresearch mostafa
 */
class authorresearch
{
    public $CI ;
    
    public  $id, $authorNumber , $authorInstitute,$authorScientificDegree , $authorJob , $authorSpecification , $authorAccureteSpecification 
        
    ,  $research  , $author;
    
    public $loadauthor  , $loadresearch ;
    
    private $validation ; 
    public $errors ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->validation = new validation();
        $this->errors = array();
        $this->author = new author($ci);
        $this->research = new research($ci);
        $this->loadauthor = $this->loadresearch = false;
    }
    
    public function findauthorresearch($authorresearch){
        $authorresearchs = array();
        $res = $this->CI->authorresearchmodel->findauthorresearch($authorresearch);
        if ($res){
            $i=0;
            foreach($res as $row){
                $authorresearchs[$i] = new authorresearch($this->CI);
                $authorresearchs[$i]->id=$row->id ; 
                $authorresearchs[$i]->authorNumber=$row->authorNumber ; 
                $authorresearchs[$i]->authorInstitute=$row->authorInstitute ; 
                $authorresearchs[$i]->authorScientificDegree=$row->authorScientificDegree ; 
                $authorresearchs[$i]->authorJob=$row->authorJob ; 
                $authorresearchs[$i]->authorSpecification=$row->authorSpecification ; 
                $authorresearchs[$i]->authorAccureteSpecification=$row->authorAccureteSpecification ; 
          
                if ($this->loadauthor){
                    $author = new author($this->CI);
                    
                    $res  = $author->findauthor(array("id"=>$row->authorId));
                    $authorresearchs[$i]->author = $res[0];
                }
                
                
                if($this->loadresearch){
                    $research = new research($this->CI);
                    $research->loadpublisher=true;
                    
                    $res= $research->findResearch(array("id"=>$row->researchId));
                    $authorresearchs[$i]->research  = $res[0];
                }
                
                $i++;
            }
        }
        return $authorresearchs;
    }
    
    public function delete($authResearch){
        $this->CI->authorresearchmodel->delete($authResearch);
    }
    public function insert(){
        
        $auth = 0;
        if($this->author && !empty($this->author)){
            $auth = $this->author->id;
        }
        
        $research = 0;
        if($this->research && !empty($this->research)){
            $research = $this->research->id;
        }
        
        $authjob = 0;
        if ($this->author->job && !empty($this->author->job)){
            $authjob = $this->author->job->name;
        }
        
        
        
        $authcurrentScientificDegree = 0;
        if ($this->author->currentScientificDegree && !empty($this->author->currentScientificDegree)){
            $authcurrentScientificDegree = $this->author->currentScientificDegree->name;
        }
        
        $authinstitute = 0;
        if ($this->author->institute && !empty($this->author->institute)){
            $authinstitute = $this->author->institute->instituteName;
        }
        
        $authspecialization = 0;
        if ($this->author->specialization && !empty($this->author->specialization)){
            $authspecialization = $this->author->specialization->name;
        }
        
        $authaccurateSpecialization = 0;
        if ($this->author->accurateSpecialization && !empty($this->author->accurateSpecialization)){
            $authaccurateSpecialization = $this->author->accurateSpecialization->name;
        }
        
        
        $authorResearch= array(
            "researchId"=>$research,
            "authorId"=>$auth , 
            "authorNumber"=>$this->authorNumber,
            "authorInstitute"=>$authinstitute, 
            "authorScientificDegree"=>$authcurrentScientificDegree , 
            "authorJob"=>$authjob, 
            "authorSpecification"=>$authspecialization,
            "authorAccureteSpecification"=>$authaccurateSpecialization
            );
        $this->CI->authorresearchmodel->insert($authorResearch);
    }
    
}
