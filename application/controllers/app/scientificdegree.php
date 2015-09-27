<?php
/**
 * scientificdegree short summary.
 *
 * scientificdegree description.
 *
 * @version 1.0
 * @scientificdegree mostafa
 */
class scientificdegree
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
    
    public function findscientificdegree($scientificdegree){
        $scientificdegrees = array();
        $res = $this->CI->scientificdegreemodel->findscientificdegree($scientificdegree);
        if ($res){
            $i=0;
            foreach($res as $row){
                $scientificdegrees[$i] = new scientificdegree($this->CI);
                $scientificdegrees[$i]->id=$row->id ; 
                $scientificdegrees[$i]->name=$row->name ;  
                $i++;
            }
        }
        return $scientificdegrees;
    }

    public function insert(){
        $obj= array(
            "name"=>$this->name
            );
        
        return $this->CI->scientificdegreemodel->insert($obj);
    }
    public function update(){
        $obj= array(
    "name"=>$this->name
    );
        $this->CI->scientificdegreemodel->update($obj , $this->id);
    }
    public function delete(){
        $this->CI->scientificdegreemodel->delete($this->id);
    }
}