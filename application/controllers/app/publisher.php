<?php

/**
 * publisher short summary.
 *
 * publisher description.
 *
 * @version 1.0
 * @author mostafa
 */
class publisher
{
    public $CI ;
    
    public  $id, $publisherName 
    , $institute;
    
    public $loadinstitute ; 
    
    private $validation ; 
    public $errors ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->validation = new validation();
        $this->errors = array();
        $this->loadinstitute = false;
    }
    
    public function findPublisher($publisher){
        $publishers = array();
        $res = $this->CI->publishermodel->findPublisher($publisher);
        if ($res){
            $i=0;
            foreach($res as $row){
                $publishers[$i] = new publisher($this->CI);
                $publishers[$i]->id=$row->id ; 
                $publishers[$i]->publisherName=$row->publisherName ;
                
                if($this->loadinstitute){
                    $institute = new institute($this->CI);
                    $institutes = $institute->findInstitute(array("id"=>$row->instituteId));
                    $publishers[$i]->institute=$institutes[0];                     
                }
                $i++;
            }
        }
        return $publishers;
    }
    
    public function findPublisherByName( $name, $mode=""){
        if(!isset($name) || $name==null || empty($name)){
            return null; 
        }
        $res = $this->findPublisher(array("publisherName"=>$name));
        if($res && !empty($res)){
            return $res[0];
        }else{
            if($mode=="create"){
                $this->publisherName = $name;
                $this->id= $this->insert();
                return $this;
            }
        }
        return null;
    }
    
    public function insert(){
        
        $institute = 0;
        if ($this->institute && !empty($this->institute)){
            $institute = $this->institute->id;
        }
        $inst = array(
            "publisherName"=>$this->publisherName,
            "instituteId"=>$institute
            );
        return $this->CI->publishermodel->insert($inst);
    }
}
