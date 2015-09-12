<?php

/**
 * user short summary.
 *
 * user description.
 *
 * @version 1.0
 * @author mostafa
 */
class user
{
    public $CI ;
    public $id , $username , $mail , $password ; 
    private $validation ; 
    public $errors ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->validation = new validation();
        $this->errors = array();
    }
    
    public static function getLoggedUserStatic(){
    
    }
    
    public function getLoggedUser(){
        
    if (isset($this->CI->session->userdata['username'])){
        if(!empty($this->CI->session->userdata['username'])){
            $res = $this->finduserr(array("username"=>$this->CI->session->userdata['username']));
            if ($res && !empty($res)){
                return $res[0];
            }
        }
    }
    return false;
    }
    public function register(){
        $this->username =  $this->CI->input->post("username");
        $this->mail= $this->CI->input->post("mail");
        $this->password = $this->CI->input->post("password");
        if($this->isValidRegister()){
            if(!$this->isUserExists()){
                $this->insertUser();
                return true;
            }else{
                $this->errors["username"][] = "User Name already exists , choose another one" ;                
            }
        }
        return false;
    }
    
    public function finduserr($userr){
        $userrs = array();
        $res = $this->CI->usermodel->findUser($userr);
        if ($res){
            $i=0;
            foreach($res as $row){
                $userrs[$i] = new user($this->CI);
                $userrs[$i]->id=$row->id ; 
                $userrs[$i]->username=$row->userName ; 
                $userrs[$i]->mail=$row->mail ; 
                $userrs[$i]->password=$row->password ; 

                
                $i++;
            }
        }
        return $userrs;
    }
    public function saveLoginSession(){
        $user = array("username"=>$this->username);
        $this->CI->session->set_userdata ( $user );
    }
    public function login(){
        $this->username =  $this->CI->input->post("username");
        $this->password = $this->CI->input->post("password");
        
        if($this->isValidLogin()){
            
            $user = array("userName"=>$this->username
            ,"password"=>$this->password
            );
            $user = $this->findUser($user);
            if ($user){
                $this->saveLoginSession();
                return true;
            }else{
                $this->errors["username"][] = "username or password may wrong" ;                
            }
        }
        return false;
    }
    public function findUser($user){
        return $this->CI->usermodel->findUser($user);
    }
    private function insertUser(){
        $user = array("userName"=>$this->username
        ,"password"=>$this->password
        ,"mail"=>$this->mail
        ,"registerDate"=>"".time()
        );
        $this->CI->usermodel->insertUser($user);
    }
    private function isUserExists(){
        $res  =  $this->CI->usermodel->isUserExist($this->username);
        return $res?true:false;
    }
    private function isValidLogin(){
        $this->errors=array();
        $this->validateUserName();
        $this->validatePassword();
        
        return $this->isValid();
    }
    private function isValid(){
        if (count($this->errors)>=1){
            return false;
        }
        return true;
    }
    private function validateUserName(){
        $this->username =  $this->validation->initialPrepare($this->username);
        if ($this->validation->isSetVal($this->username)){
            if (!$this->validation->isAlpha($this->username , 1 , 20)){
                $this->errors["username"][]="please enter a valid username with no numbers or special characters, min length :1 , max length :20"; 
            }
        }else{
            $this->errors["username"][] = "please enter user name" ;
        }
    }
    private function validateMail(){
        $this->mail = $this->validation->initialPrepare($this->mail);
        if($this->validation->isSetVal($this->mail)){
            if(!$this->validation->isAlphaNumeric($this->mail , 1 , 30 , "@_\-\.")){
                $this->errors["mail"][]="please enter a valid E-mail with no special characters except .@_-, min length :1 , max length :30"; 
            }else{
                if (!$this->validation->isEmail($this->mail)){
                    $this->errors["mail"][] = "please enter a valid E-mail" ;                            
                }
            }
        }else{
            $this->errors["mail"][] = "please enter E-mail" ;            
        }
    }
    private function validatePassword(){
        $this->password =  $this->validation->initialPrepare($this->password);
        if ($this->validation->isSetVal($this->password)){
            if (!$this->validation->isAlphaNumeric($this->password , 1 , 30)){
                $this->errors["password"][]="please enter a valid password with no special characters, min length :1 , max length :30"; 
            }
        }else{
            $this->errors["password"][] = "please enter password" ;
        }
    }
    private function isValidRegister(){
        $this->errors = array();
       
        $this->validateUserName();
        
        $this->validateMail();
        
        $this->validatePassword();

        
        $confirmPassword = $this->CI->input->post("confirmPassword");
        if($this->password!=$confirmPassword){
            $this->errors["confirmPassword"][] ="Passwords aren't match";
        }
        
        
        return $this->isValid();
    }
}
