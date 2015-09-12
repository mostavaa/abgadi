<?php

/**
 * institute short summary.
 *
 * institute description.
 *
 * @version 1.0
 * @author mostafa
 */
class institute
{
    public $CI ;
    
    public  $id, $instituteName 
    ,$publishers , $authors;
    
    private $validation ; 
    public $errors ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->validation = new validation();
        $this->errors = array();
    }
    
    public function findInstitute($institute){
        $institutes = array();
        $res = $this->CI->institutemodel->findInstitute($institute);
        if ($res){
            $i=0;
            foreach($res as $row){
                $institutes[$i] = new institute($this->CI);
                $institutes[$i]->id=$row->id ; 
                $institutes[$i]->instituteName=$row->instituteName ; 
                $i++;
            }
        }
        return $institutes;
    }
    
    public function insert(){
        $inst = array(
            "instituteName"=>$this->instituteName);
        return $this->CI->institutemodel->insert($inst);
    }
}
