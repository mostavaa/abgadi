<?php
/**
 * accurateSpecialization short summary.
 *
 * accurateSpecialization description.
 *
 * @version 1.0
 * @accurateSpecialization mostafa
 */
class accurateSpecialization
{
    public $CI ;
    
    public  $id, $name ,$specialization;
    
    private $validation ; 
    public $errors ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->validation = new validation();
        $this->errors = array();
    }
    
    public function findaccurateSpecialization($accurateSpecialization){
        $accurateSpecializations = array();
        $res = $this->CI->accuratespecializationmodel->findaccurateSpecialization($accurateSpecialization);
        if ($res){
            $i=0;
            foreach($res as $row){
                $accurateSpecializations[$i] = new accurateSpecialization($this->CI);
                $accurateSpecializations[$i]->id=$row->id ; 
                $accurateSpecializations[$i]->name=$row->name ;  
                $accurateSpecializations[$i]->specialization=$row->specialization ;  
                $i++;
            }
        }
        return $accurateSpecializations;
    }
    public function findAccurateSpecByName($name , $mode=""){
        if(!isset($name) || $name==null || empty($name)){
            return null; 
        }
        $res = $this->findaccurateSpecialization(array("name"=>$name));
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
        
        $authaccurateSpecialization = 0;
        if ($this->accurateSpecialization && !empty($this->accurateSpecialization)){
            $authaccurateSpecialization = $this->accurateSpecialization->id;
        }
        $obj= array(
            "name"=>$this->name,
            "specialization"=>$authaccurateSpecialization
            );
        
        return $this->CI->accuratespecializationmodel->insert($obj);
    }
}