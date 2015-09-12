<?php

/**
 * tools short summary.
 *
 * tools description.
 *
 * @version 1.0
 * @author mostafa
 */
class tools
{
    
    //public $CI ;
    public function __construct(){
        //$this->CI= $ci;
    }
    public static function encrypt($pure_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return base64_encode( $encrypted_string);
    }

    /**
     * Returns decrypted original string
     */
    public static function decrypt($encrypted_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = base64_decode($encrypted_string);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, ($encrypted_string), MCRYPT_MODE_ECB, $iv);
        return utf8_decode($decrypted_string);
    }
    
    
    public static function generateRandomNumber($length = 7) {
		$characters = '0123456789';
		$charactersLength = strlen ( $characters );
		$randomString = '';
		for($i = 0; $i < $length; $i ++) {
			$randomString .= $characters [rand ( 0, $charactersLength - 1 )];
		}
		return $randomString;
	}
    
    public static function generateRandomWord($length = 7) {
		$characters = 'abcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen ( $characters );
		$randomString = '';
		for($i = 0; $i < $length; $i ++) {
			$randomString .= $characters [rand ( 0, $charactersLength - 1 )];
		}
		return $randomString;
	}
    
    public static function sendMail($from , $fromName , $To , $subject,$msg , $controlInstance ){
        $controlInstance->email->from ( $from, $fromName );
        $controlInstance->email->to ( "" . $To );
        $controlInstance->email->subject ( $subject );
        $controlInstance->email->message ( $msg);
        
        if( !$controlInstance->email->send ()){
            return false;
        }
        return true;
    }
    

}
