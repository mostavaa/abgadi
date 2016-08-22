<?php
//if(session_status()==PHP_SESSION_NONE)
	//session_start();
$a = session_id();
if(empty($a)) 
	session_start();
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally
// inadvisable to store DB-related objects in sessions
class SessionClass {
	private $exist ;
	// public $user_id;
	private $session_name;
	private  $session_value;
	function __construct() {
		

	

		//$this->session_name = "user_id";
		//$this->session_value = "";
		/*
		$this->check_session_exist ();
		if ($this->exist) {
			// actions to take right away if user is logged in
		} else {
			// actions to take right away if user is not logged in
		}
		*/
	}
	
	public function set_key($session_key) {
		$this->session_name = $session_key;
	}
	public function set_value($val) {
		$this->session_value = $val;
	}
	public function get_key() {
		return $this->session_name ;
	}
	public function get_value() {
		$a = session_id();
		if(empty($a))
			session_start();
		if ($this->is_exist()){
			$this->session_value = $_SESSION[$this->session_name];
		}
		return $this->session_value ;
	}
	public function is_exist() {
		return $this->exist;
	}
	public function store_session() {
		$a = session_id();
		if(empty($a))
			session_start();
		// database should find user based on username/password
		 $_SESSION [$this->session_name] = $this->session_value;
		$this->exist = true;
	}
	public function empty_session() {
		$a = session_id();
		if(empty($a))
			session_start();
		
		$_SESSION [$this->session_name]="";
		$this->session_value = "";
		$this->exist = false;
	}
	public function check_session_exist() {
		$a = session_id();
		if(empty($a))
			session_start();
		
		if (isset ( $_SESSION [$this->session_name] )) {
			if($_SESSION [$this->session_name] != ""){
				//$_SESSION [$this->session_name] = $this->session_value;
				$this->exist = true;
				//echo $this->session_name;
			}else{
				$this->session_value = "";
				$this->exist = false;				
			}
		} else {
			$this->session_value = "";
			$this->exist = false;
		}
	}
}


//$error_session = new Session();
//$session = new Session ();
?>