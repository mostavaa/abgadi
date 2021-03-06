<?php
/**
 * specialization short summary.
 *
 * specialization description.
 *
 * @version 1.0
 * @specialization mostafa
 */
class specialization
{
    public $CI ;
    
    public  $id, $name ;
    
    private $validation ; 
    public $errors ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->validation = new validation();
        $this->errors = array();
    }
    
    public function findspecialization($specialization){
        $specializations = array();
        $res = $this->CI->specializationmodel->findspecialization($specialization);
        if ($res){
            $i=0;
            foreach($res as $row){
                $specializations[$i] = new specialization($this->CI);
                $specializations[$i]->id=$row->id ; 
                $specializations[$i]->name=$row->name ;  
                $i++;
            }
        }
        return $specializations;
    }

    public function insert(){
        $obj= array(
            "name"=>$this->name
            );
        
        return $this->CI->specializationmodel->insert($obj);
    }
}