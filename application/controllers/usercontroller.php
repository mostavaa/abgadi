<?php
/**
 * this file for login and register only
 */
header("Content-Type: text/html; charset=utf-8");
include_once("core.php");

class usercontroller extends CI_Controller {
    private $validation ;
	public function __construct() {
		parent::__construct ();
        $this->validation = new validation();
	}
	
    public function registerview(){
        if (!permissions::Authorized("usercontroller/registerview" , $this)){
            return ;
        }
        $this->load->view("user/register");
      
    }
    public function loginview(){
        if (!permissions::Authorized("usercontroller/loginview" , $this)){
            return ;
        }
        $this->load->view("user/login");
        
    }
    public function logout(){
        if (!permissions::Authorized("usercontroller/logout" , $this)){
            return ;
        }
    $user = new user($this);
    $user->username ="";
    $user->saveLoginSession();
    redirect(base_url());
    }
    public function login(){
        if (!permissions::Authorized("usercontroller/login" , $this)){
            return ;
        }
        $user = new user($this);
        if($user->login()){
            redirect(base_url("index.php/homecontroller/content"));
            return;
        }
        $data["username"] = $this->input->post("username");
        $data["password"] = $this->input->post("password");
        $data["errors"]=$user->errors;
        $this->load->view("user/login" , $data);
    }
    public function register(){
        if (!permissions::Authorized("usercontroller/register" , $this)){
            return ;
        }
        $user = new user($this);
        if ($user->register()){
                if($user->login()){
                    redirect(base_url("index.php/homecontroller/content"));
                    return;
                }else{
                    
                }
        }else{
            
        }
        $data["username"] = $this->input->post("username");
        $data["mail"] = $this->input->post("mail");
        $data["password"] = $this->input->post("password");
        $data["confirmPassword"] = $this->input->post("confirmPassword");
        $data["errors"]=$user->errors;
        $this->load->view("user/register" , $data);
    }
       
    public function isuserexist(){
        if (!permissions::Authorized("usercontroller/isuserexist" , $this)){
            return ;
        }
        $username= $this->input->post("username");
        $username=$this->validation->initialPrepare($username);
        
        if ($this->validation->isSetVal($username)){
            if ($this->validation->isAlpha($username , 1 , 20)){
                
                
                $res  =  $this->usermodel->isUserExist($username);
                echo $res?"true":"false";
            }else{
                echo "please enter a valid username with no numbers or special characters, min length :1 , max length :20";
            }
        }else{
            echo "please enter user name";
        }
    }
    
    
}    