<?php
/**
 * job short summary.
 *
 * job description.
 *
 * @version 1.0
 * @job mostafa
 */
class job
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
    
    public function findjob($job){
        $jobs = array();
        $res = $this->CI->jobmodel->findjob($job);
        if ($res){
            $i=0;
            foreach($res as $row){
                $jobs[$i] = new job($this->CI);
                $jobs[$i]->id=$row->id ; 
                $jobs[$i]->name=$row->name ;  
                $i++;
            }
        }
        return $jobs;
    }

    public function insert(){
        $obj= array(
            "name"=>$this->name
            );
        
        return $this->CI->jobmodel->insert($obj);
    }
}