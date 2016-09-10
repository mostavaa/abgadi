<?php

/**
 * FileUpload short summary.
 *
 * FileUpload description.
 *
 * @version 1.0
 * @author mostafa
 */
class FileUpload
{
    
    public $CI ;
    private $validation ;
    public $errors ;
    public $path;
    public $myfiles ;
    public $allowedExtensions ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->errors = array();
        $this->validation = new validation();
        $this->path = "./uploads/";
        $this->myfiles = array();
        $this->allowedExtensions='pdf|doc|docx';
    }
    
    function doMultipleUpload($fieldName="file")
    {
        $config['upload_path'] = $this->path;
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = '4096';
        $this->CI->load->library('upload');
        /*
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        */
        $mycsv = $this->CI->session->userdata('mycsv');
        if(isset($mycsv) && !empty($mycsv)){
            $mycsv = unserialize($mycsv);
        }
        if(!empty($_FILES)){
            

            $files = $_FILES;
            $filesCount = count($files[$fieldName]["name"]);
            if($filesCount>0){
                for ($i = 0; $i < $filesCount; $i++)
                {
                    $oldFFileName =  $files[$fieldName]["name"][$i];
                    $oldFFileName =  $this->validation->initialPrepare($oldFFileName);
                    $myfile = &$mycsv->findFileByName($oldFFileName);
                    if($myfile){
                        if($myfile->isNew){
                            $newFileName = $this->generateRandomName();
                            $config['file_name'] =$newFileName;
                            $this->CI->upload->initialize($config);
                            
                            $_FILES[$fieldName]['name']= $files[$fieldName]['name'][$i];
                            $_FILES[$fieldName]['type']= $files[$fieldName]['type'][$i];
                            $_FILES[$fieldName]['tmp_name']= $files[$fieldName]['tmp_name'][$i];
                            $_FILES[$fieldName]['error']= $files[$fieldName]['error'][$i];
                            $_FILES[$fieldName]['size']= $files[$fieldName]['size'][$i];    
                            if (!$this->CI->upload->do_upload($fieldName))
                            {
                                $errors = $this->CI->upload->display_errors();
                                
                                $myfile->status = "error";
                                $myfile->error = $errors;
                            }
                            else
                            {
                                $myfile->status = "ok";
                                $myfile->research->researchFileName  = $newFileName.".".pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
                            }
                        }
                    }else{                
                        //extra file
                        $mycsv->extraFiles[] = $oldFFileName;
                    }
                }
                /*
                ini_set('xdebug.var_display_max_depth', 10);
                ini_set('xdebug.var_display_max_children', 256);
                ini_set('xdebug.var_display_max_data', 1024);
                echo "<pre>";
                var_dump($mycsv);
                echo "</pre>";
                die();
                 */
                //print_r($this->myfiles);
                $mycsv->didUploadFiles = true;
                $serialized =  serialize($mycsv);
                $this->CI->session->set_userdata("mycsv" , $serialized);
                redirect(base_url("index.php/admin/bulk"));
            }

        }
        echo "No Data Uploaded , please try upload again";
    }
    private function generateRandomName(){
        //get new file name
        while(true){
            $newName = tools::generateRandomWord(8);
            $research = array("researchFileName"=>$newName);
            if(!$this->findResearchByResearchName($research)){
                break;
            }
           
        }
        
        return $newName;  
    }
    private function findResearchByResearchName($research){
        $research  = $this->CI->researchmodel->findResearch($research);
        if($research){
            return true;
        }
        return false;
    }
    
    public function appendToFile($path , $data){
        file_put_contents($path, $data , FILE_APPEND);
    }
    public function writeNewContent($path , $data){
        file_put_contents($path, $data);
    }
    
    public function uploadFile( $filename=""){
        $config = array();
        $config['upload_path'] = $this->path;
        $config['allowed_types'] = $this->allowedExtensions;
        $config ['max_size'] = '4096';
        if($filename!=""){
            $config['file_name'] = $filename;
        }

        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload("file"))
        {
            $this->errors= $this->upload->display_errors(); 
        }
        else
        {
            return true;
        }
        return false;
    }
}

class myFile{
    public
        $status/*uploaded : ok or error*/ , $error/*array of any the error of upload*/,
        $isNew , 
        $action/*approve,delete*/;
    public $validationStatus;
   
    public $research ;
    //helpers 
    public $validation ;
    public $CI;
   function __construct(){
       $this->CI = &get_instance();
       $this->research = new research($this->CI);
       $this->validation = new validation();
       $this->validationStatus=true;
   }


}
