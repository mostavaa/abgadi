<?php
class validation {
	/**
	 * validate if input is english or arabic alpha 
	 * @param mixed $input 
	 * @return mixed
	 */
	public function isAlpha($input , $min , $max , $special=""  ) {
        //$special = "\s\-";
		if (preg_match("~^[a-z{$special}\p{Arabic}]{{$min},{$max}}$~iu", $input)) {
			return true;
		}
		return false;
	}
    
    public function isAlphaNumeric($input , $min , $max , $special=""  ) {
        //$special = "\s\-";
		if (preg_match("~^[a-z{$special}\p{Arabic}\d]{{$min},{$max}}$~iu", $input)) {
			return true;
		}
		return false;
    }
   
    
    public function isInteger($str)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+$/', $str);
	}
    
    
    
    public function isNumeric($str)
	{
		return (bool)preg_match( '/^[\-+]?[0-9]*\.?[0-9]+$/', $str);

	}

	
    
    public function validateHtmlDate($date){
        if (  !empty($date)){
            $test_arr = explode ( '-',  $this->controlInstance->input->post ( 'deadline' ) );
            if (count ( $test_arr ) == 3) {
                if (checkdate ( $test_arr [1], $test_arr [2], $test_arr [0] )) {
                    $date =  $this->controlInstance->input->post ( 'deadline' );
                } else {
                    // problem with dates ...
                    
                    return false;
                }
            } else {

                return false;
            }

            return true;
        }
        return "date not valid";
        
    }   
    
    public function minMax($input , $min , $max){
        if (strlen($input)<$min || strlen($input)>$max)
            return false;
        return true;
    }
    
    

	public function isEmail($input ){
		
		if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
		
	}
	

    public function isSetVal($input){
        if (!isset($input))
            return false;
        if (empty($input) || $input=="" || $input==null)
            return false;
        return true;
    }
    /**
     * trim extra spaces
     * @param mixed $text 
     * @return mixed
     */
    public function initialPrepare($text){
        $text = trim ( $text );
        return $text;
    }

    /**
     * remove special characters 
     * @param mixed $val 
     * @param mixed $except 
     * @return mixed
     */
    public function removeSpecialChars($val , $except=""){
        //$except = "\s@._-";
        return preg_replace("~[^\p{Xan}{$except}]++~u", '', $val);
    }
    /**
     * don't ignore <br> , this may be helpful for textarea input
     * @param mixed $val 
     * @return mixed
     */
    public function careAboutNewLine($val){
        return  nl2br($val);
    }
    /**
     * output html as a plain text except for <br> tag , this may be helpful for textarea output
     * @param mixed $val 
     * @return mixed
     */
    public function displayHtmlAsTextExceptNewLine($val){
        $val = str_replace("<br>" , "$....$" , $val);
        $val = str_replace("<br />" , "$....$" , $val);
        $val = str_replace("<br/>" , "$....$" , $val);
        $val = str_replace("<br >" , "$....$" , $val);
        $val = htmlspecialchars ( $val );
        $val = str_replace("$....$" , "<br>" , $val);
        return $val;
    }
    /**
     * output html as a plain text
     * @param mixed $val 
     * @return mixed
     */
    public function displayHtmlAsText($val){
        $val = htmlspecialchars ( $val );
        return $val;
    }
    /**
     * prepare input for database , add slashes 
     * @param mixed $value 
     * @return mixed
     */
    public function escape_value( $value ) {
        
		$magic_quotes_active = get_magic_quotes_gpc();
		$real_escape_string_exists = function_exists( "mysql_real_escape_string" );
        
		if( $real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
    
    /**
     * check if input is valid to be user name or not with min and max value 
     * @param mixed $input 
     * @param mixed $min 
     * @param mixed $max 
     * @return mixed
     */
    /*
	public function isUserName($input , $min , $max){
    if (preg_match("/^\w{{$min},{$max}}$/", $input))
    return  true;
    return false;
	}
	
     */
    
    /*
    public function isAlpha($str , $special="")
	{
    //$special = " _";
    return ( ! preg_match("/^([a-z{$special}])+$/i", $str)) ? FALSE : TRUE;
	}
     */
    
    /*
    public function isAlphaNumeric($str)
	{
    return ( ! preg_match("/^([a-z0-9 _])+$/i", $str)) ? FALSE : TRUE;
	}
     */    
    
    /*
    public function isArabicAlphaNumbic($str){
    return ( ! preg_match("^[\d\p{Arabic}]*\p{Arabic}[\d\p{Arabic}]*$", $str)) ? FALSE : TRUE;
    
    
    }
     */
	
}


?>