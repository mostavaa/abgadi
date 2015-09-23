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
                redirect(base_url("index.php/homecontroller/bulkaddpapers"));
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
        $status/*uploaded : ok or error*/ , $error/*the error of upload*/,
        $isNew , 
        $action/*approve,delete*/;
   
    public $research ;
    //helpers 
    public $validation ;
    public $CI;
   function __construct(){
       $this->CI = &get_instance();
       $this->research = new research($this->CI);
       $this->validation = new validation();
   }

   #region setter
   
   public function setResearchData($row , &$report){
       $researchFileName = $row[0];
       $this->setOriginalFileName($researchFileName,$report);
       
       

       $this->research->arabicHeadingName = $row[1];
       $this->research->englishHeadingName = $row[2];
       $this->research->arabicDescription = $row[3];
       $this->research->englishDescription = $row[4];
       $this->research->keyWords = $row[5];
       
       
       $specialization=  $row[6];
       $this->setSpecialization($specialization,$report);

       $accurateSpecialization=  $row[7];
       $this->setAccurateSpecialization($accurateSpecialization,$report);

       $this->research->pagesCount = $row[8];
       $this->research->pagesFrom = $row[8];
       $this->research->pagesTo = $row[8];
       $this->research->researchNumber = $row[8];
       $this->research->publishDate = $row[8];
       $this->research->publishCountry = $row[8];
       
       $researchType=  $row[14];
       $this->setResearchType($researchType,$report);
       
       
       $publishername=  $row[15];
       $this->setPublisher($publishername,$report);
       
       
       $mainAuthorname=  $row[16];
       $this->research->mainAuthor =  $this->setAuthor($mainAuthorname,$report);
       $author1=  $row[17];
       $this->research->firstAuthor =  $this->setAuthor($author1,$report); 
       $author2=  $row[18];
       $this->research->secondAuthor =  $this->setAuthor($author2,$report); 
       $author3=  $row[19];                    
       $this->research->thirdAuthor =  $this->setAuthor($author3,$report);
       $author4=  $row[20];                    
       $this->research->fourthAuthor =  $this->setAuthor($author4,$report);   
       $author5=  $row[21];
       $this->research->fifthAuthor =  $this->setAuthor($author5,$report);   
       $author6=  $row[22];
       $this->research->sixthAuthor =  $this->setAuthor($author6,$report);  
       $author7=  $row[23];
       $this->research->seventhAuthor =  $this->setAuthor($author7,$report);  
       $author8=  $row[24];
       $this->research->eighthAuthor =  $this->setAuthor($author8,$report); 
       $author9=  $row[25];
       $this->research->ninthAuthor =  $this->setAuthor($author9,$report);  
       $author10=  $row[26];
       $this->research->tenthAuthor =  $this->setAuthor($author10,$report);

   }
   
   public function setOriginalFileName($researchFileName , &$report){
       if(!empty($researchFileName) && $researchFileName!="" && $researchFileName!=null){
           $researchFileName = $this->validation->initialPrepare($researchFileName);
           $this->research->originalFileName = $researchFileName;
           if(!in_array($researchFileName , $report->newFiles) && !in_array($researchFileName , $report->oldFiles)){
               $res = $this->research->fileExists();
               if($res){
                   $this->research->researchFileName = $res->researchFileName;
                   $this->isNew = false;
                   $report->numberOfOldFiles++;
                   $report->oldFiles[] = $researchFileName;
               }else{
                   $this->isNew = true;
                   $report->numberOfNewFiles++;
                   $report->newFiles[]=$researchFileName;
               }   
           }
      
       }
   }
   public function setSpecialization($specialization , &$report){
       
       $specialization = $this->validation->initialPrepare($specialization);
       if(!empty($specialization) && $specialization!="" && $specialization!=null){
           $this->research->specialization = $specialization;
           if(!in_array($specialization , $report->newSpecializations) && !in_array($specialization , $report->oldSpecializations)){
               $spec = new specialization($this->CI);
               $specs = $spec->findspecialization(array("name"=>$specialization));
               if($specs && !empty($specs) && count($specs)>0){
                   $report->numberOfOldSpecializations++;
                   $report->oldSpecializations[]=$specialization;
               }else{
                   $report->numberOfNewSpecializations++;
                   $report->newSpecializations[]=$specialization;
               }
           }               
       }
   }
   public function setAccurateSpecialization($accurateSpecialization , &$report){
       $accurateSpecialization = $this->validation->initialPrepare($accurateSpecialization);
       if(!empty($accurateSpecialization) && $accurateSpecialization!="" && $accurateSpecialization!=null){
           $this->research->accurateSpecialization = $accurateSpecialization;
           if(!in_array($accurateSpecialization , $report->oldAccurateSpecializations) && !in_array($accurateSpecialization , $report->newAccurateSpecializations)){
               $accSpec = new accurateSpecialization($this->CI);
               $accSpecs =  $accSpec->findaccurateSpecialization(array("name"=>$accurateSpecialization));
               if($accSpecs && !empty($accSpecs) && count($accSpecs)>0){
                   $report->numberOfOldAccurateSpecializations++;
                   $report->oldAccurateSpecializations[]=$accurateSpecialization;
               }else{
                   $report->numberOfNewAccurateSpecializations++;
                   $report->newAccurateSpecializations[]=$accurateSpecialization;
               }
           }           

       }
   }
   
   public function setResearchType($researchType , &$report){
       $researchType = $this->validation->initialPrepare($researchType);
       if(!empty($researchType) && $researchType!="" && $researchType!=null){
           $this->research->researchType = $researchType;
           if(!in_array($researchType , $report->newResearchTypes) && !in_array($researchType , $report->oldResearchTypes)){
               $resType = new researchtype($this->CI);
               $resTypes =  $resType->findresearchtype(array("name"=>$researchType));
               if($resTypes && !empty($resTypes) && count($resTypes)>0){
                   $report->numberOfOldResearchTypes++;
                   $report->oldResearchTypes[]=$researchType;
               }else{
                   $report->numberOfNewResearchTypes++;
                   $report->newResearchTypes[]=$researchType;
               }            
           }           
       }
   }
   
   
   public function setPublisher($Publisher , &$report){
       $Publisher = $this->validation->initialPrepare($Publisher);
       if(!empty($Publisher) && $Publisher!="" && $Publisher!=null){
           $this->research->publisher = $Publisher;

           if(!in_array($Publisher , $report->newPublishers) && !in_array($Publisher , $report->oldPublishers)){
               $pub = new publisher($this->CI);
               $pubs =  $pub->findPublisher(array("publisherName"=>$Publisher));
               if($pubs && !empty($pubs) && count($pubs)>0){
                   $report->numberOfOldPublishers++;
                   $report->oldPublishers[]=$Publisher;
               }else{
                   $report->numberOfNewPublishers++;
                   $report->newPublishers[]=$Publisher;
               }          
           }           
       }
   }
   
   public function setAuthor($author , &$report){
       $author = $this->validation->initialPrepare($author);
       if(!empty($author) && $author!="" && $author!=null){
           if(!in_array($author , $report->newAuthors) && !in_array($author , $report->oldAuthors)){
               $obj = new author($this->CI);
               $objs =  $obj->findauthor(array("name"=>$author));
               if($objs && !empty($objs) && count($objs)>0){
                   $report->numberOfOldAuthors++;
                   $report->oldAuthors[]=$author;   
               }else{
                   $report->numberOfNewAuthors++;
                   $report->newAuthors[]=$author;
               }
           }
       }
       return $author;
   }
   #endregion
}
