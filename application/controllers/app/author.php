<?php
/**
 * author short summary.
 *
 * author description.
 *
 * @version 1.0
 * @author mostafa
 */
class author
{
    public $CI ;
    
    public  $id, $name ,  $job , $specialization,$accurateSpecialization , $currentScientificDegree , $jobAddress , $jobPhone , $mobileNumber , $mail
    ,  $institute;
    
    public $loadspecialization , $loadaccurateSpecialization , $loadcurrentScientificDegree , $loadjob , $loadinstitute;
    
    private $validation ; 
    public $errors ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->validation = new validation();
        $this->errors = array();
        $this->institute = new institute($ci);
        $this->loadspecialization = $this->loadaccurateSpecialization = $this->loadjob = $this->loadcurrentScientificDegree = $this->loadinstitute =  false;
    }
    
    public function findauthor($author){
        $authors = array();
        $res = $this->CI->authormodel->findauthor($author);
        if ($res){
            $i=0;
            foreach($res as $row){
                $authors[$i] = new author($this->CI);
                $authors[$i]->id=$row->id ; 
                $authors[$i]->name=$row->name ; 
                $authors[$i]->jobAddress=$row->jobAddress ; 
                $authors[$i]->jobPhone=$row->jobPhone ; 
                $authors[$i]->mobileNumber=$row->mobileNumber ; 
                $authors[$i]->mail=$row->mail ; 
                
                if ($this->loadinstitute){
                    $institute = new institute($this->CI);
                    $institutes = $institute->findInstitute(array("id"=>$row->instituteId));
                    if($institutes && !empty($institutes)){
                        $authors[$i]->institute= $institutes[0];
                    }
                }
                
                if ($this->loadjob){
                    $job = new job($this->CI);
                    $jobs = $job->findjob(array("id"=>$row->job));
                    if($jobs && !empty($jobs)){
                        $authors[$i]->job = $jobs[0];                        
                    }
                }
                
                if ($this->loadspecialization){
                    $specialization = new specialization($this->CI);
                    $specializations = $specialization->findspecialization(array("id"=>$row->specialization));
                    if($specializations && !empty($specializations)){
                        $authors[$i]->specialization = $specializations[0];                        
                    }
                }
               
                
                if ($this->loadaccurateSpecialization){
                    $accurateSpecialization = new accurateSpecialization($this->CI);
                    $accurateSpecializations = $accurateSpecialization->findaccurateSpecialization(array("id"=>$row->accurateSpecialization));
                    if($accurateSpecializations && !empty($accurateSpecializations)){
                        $authors[$i]->accurateSpecialization = $accurateSpecializations[0];                        
                    }
                }
                
                if ($this->loadcurrentScientificDegree){
                    $currentScientificDegree = new scientificdegree($this->CI);
                    $currentScientificDegrees = $currentScientificDegree->findscientificdegree(array("id"=>$row->currentScientificDegree));
                    if($currentScientificDegrees && !empty($currentScientificDegrees)){
                        $authors[$i]->currentScientificDegree = $currentScientificDegrees[0];                        
                    }
                }
                
                
                $i++;
            }
        }
        return $authors;
    }
    public function findMyResearches(){
        
        $authResearch = new authorresearch($this->CI);
        $authResearch->loadresearch = true;
       $res= $authResearch->findauthorresearch(array("authorId"=>$this->id));
        
        if($res && !empty($res)){
            $researchs = array();
            foreach ($res as $authRes)
            {
            	$researchs[] = $authRes->research;
            }

            return $researchs;
        }
        return null;
    }
    public function findMyMainResearches(){
        
        $authResearch = new authorresearch($this->CI);
        $authResearch->loadresearch = true;
        $res= $authResearch->findauthorresearch(array("authorId"=>$this->id , "authorNumber"=>0));
        
        if($res && !empty($res)){
            $researchs = array();
            foreach ($res as $authRes)
            {
            	$researchs[] = $authRes->research;
            }

            return $researchs;
        }
        return null;
    }
    public function findAuthorByName($name , $mode=""){
        if(!isset($name) || $name==null || empty($name)){
            return null; 
        }
        $res = $this->findauthor(array("name"=>$name));
        if($res && !empty($res)){
            return $res[0];
        }else{
            if($mode=="create"){
                $this->name  = $name;
                
                $this->id = $this->insert();
                return $this;
            }
        }
        
        return null;
    }

    public function insert(){
        $authjob = 0;
        if ($this->job && !empty($this->job)){
            $authjob = $this->job->id;
        }
        
        $authspecialization = 0;
        if ($this->specialization && !empty($this->specialization)){
            $authspecialization = $this->specialization->id;
        }
        
        $authaccurateSpecialization = 0;
        if ($this->accurateSpecialization && !empty($this->accurateSpecialization)){
            $authaccurateSpecialization = $this->accurateSpecialization->id;
        }
        
        $authcurrentScientificDegree = 0;
        if ($this->currentScientificDegree && !empty($this->currentScientificDegree)){
            $authcurrentScientificDegree = $this->currentScientificDegree->id;
        }
        
        $authinstitute = 0;
        if ($this->institute && !empty($this->institute)){
            $authinstitute = $this->institute->id;
        }
        
        
        $obj= array(
            "name"=>$this->name,
            "job"=>$authjob,
            "specialization"=>$authspecialization,
            "accurateSpecialization"=>$authaccurateSpecialization,
            "currentScientificDegree"=>$authcurrentScientificDegree,
            "jobAddress"=>$this->jobAddress,
            "jobPhone"=>$this->jobPhone,
            "mobileNumber"=>$this->mobileNumber,
            "mail"=>$this->mail,
            "instituteId"=>$authinstitute,
            
            );

        return $this->CI->authormodel->insert($obj);
        
    }
    public function update(){
        $authjob = 0;
        if ($this->job && !empty($this->job)){
            $authjob = $this->job->id;
        }
        
        $authspecialization = 0;
        if ($this->specialization && !empty($this->specialization)){
            $authspecialization = $this->specialization->id;
        }
        
        $authaccurateSpecialization = 0;
        if ($this->accurateSpecialization && !empty($this->accurateSpecialization)){
            $authaccurateSpecialization = $this->accurateSpecialization->id;
        }
        
        $authcurrentScientificDegree = 0;
        if ($this->currentScientificDegree && !empty($this->currentScientificDegree)){
            $authcurrentScientificDegree = $this->currentScientificDegree->id;
        }
        
        $authinstitute = 0;
        if ($this->institute && !empty($this->institute)){
            $authinstitute = $this->institute->id;
        }
        
        
        $obj= array(
            "name"=>$this->name,
            "job"=>$authjob,
            "specialization"=>$authspecialization,
            "accurateSpecialization"=>$authaccurateSpecialization,
            "currentScientificDegree"=>$authcurrentScientificDegree,
            "jobAddress"=>$this->jobAddress,
            "jobPhone"=>$this->jobPhone,
            "mobileNumber"=>$this->mobileNumber,
            "mail"=>$this->mail,
            "instituteId"=>$authinstitute,
            
            );
        $this->CI->authormodel->update($obj , $this->id);
    }
    public function delete(){
        $this->CI->authormodel->delete($this->id);
    }
}
