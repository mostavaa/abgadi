<?php
/**
 * researchtype short summary.
 *
 * researchtype description.
 *
 * @version 1.0
 * @researchtype mostafa
 */
class researchtype
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
    
    public function findresearchtype($researchtype){
        $researchtypes = array();
        $res = $this->CI->researchtypemodel->findresearchtype($researchtype);
        if ($res){
            $i=0;
            foreach($res as $row){
                $researchtypes[$i] = new researchtype($this->CI);
                $researchtypes[$i]->id=$row->id ; 
                $researchtypes[$i]->name=$row->name ;  
                $i++;
            }
        }
        return $researchtypes;
    }

    public function insert(){
        $obj= array(
            "name"=>$this->name
            );
        
        return $this->CI->researchtypemodel->insert($obj);
    }
}