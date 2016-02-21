<?php

/**
 * research short summary.
 *
 * research description.
 *
 * @version 1.0
 * @author mostafa
 */
class research
{
    public $CI ;
    
    public $id ,  $englishHeadingName , $arabicHeadingName , $arabicDescription , $englishDescription , $keyWords , $researchNumber , $publishDate , 
    $publishCountry , $researchType , $specialization , $accurateSpecialization , $pagesCount , $pagesFrom , $pagesTo , $researchFileName , $enterdTime , $lastModifiedDate,$originalFileName,
    
    $createdBy ,$publisher , $authorResearches;
    
    public $loadpublisher , $loadresearchType , $loadspecialization  , $loadaccurateSpecialization; 
    public  $mainAuthor,
    $firstAuthor ,
    $secondAuthor,
    $thirdAuthor,
    $fourthAuthor,
    $fifthAuthor ,
    $sixthAuthor ,
    $seventhAuthor,
    $eighthAuthor ,
    $ninthAuthor ,
    $tenthAuthor ;
    
    
    private $validation ;
    public $errors ;
    public function __construct($ci){
        $this->CI= $ci;
        $this->validation = new validation();
        $this->errors = array();
        $this->publisher = new publisher($ci);
        $this->mainAuthor = new author($ci);
        $this->firstAuthor = $this->secondAuthor = $this->thirdAuthor = $this->fourthAuthor = $this->fifthAuthor
        = $this->sixthAuthor = $this->seventhAuthor = $this->eighthAuthor = $this->ninthAuthor = $this->tenthAuthor = null;
        $this->loadpublisher = $this->loadaccurateSpecialization = $this->loadspecialization = $this->loadresearchType = false;
        $this->originalFileName = $this->researchFileName = "";
    }
    
    public function toArray(){
            
        $researchPublisher = "";
        if ($this->loadpublisher){
            if(is_object($this->publisher)){
                $researchPublisher = $this->publisher->publisherName;                
            }            
        }

        $researchType= "";
        if ($this->loadresearchType){
            if(is_object($this->researchType)){
                $researchType = $this->researchType->name;                
            }            
        }
        
        $specialization= "";
        if ($this->loadspecialization){
            if(is_object($this->specialization)){
                $specialization = $this->specialization->name;                
            }
        }
        
        $accurateSpecialization= "";
        if ($this->loadaccurateSpecialization){
            if(is_object($this->accurateSpecialization)){
                $accurateSpecialization = $this->accurateSpecialization->name;                
            }            
        }    
        $arr = array(
            "id"=>$this->id,
            "englishHeadingName"=>$this->englishHeadingName,
            "arabicHeadingName"=>$this->arabicHeadingName,
            "arabicDescription"=>$this->arabicDescription,
            "englishDescription"=>$this->englishDescription,
            "keyWords"=>$this->keyWords,
            "researchNumber"=>$this->researchNumber,
            "publishDate"=>$this->publishDate,
            "publishCountry"=>$this->publishCountry,
            "pagesCount"=>$this->pagesCount,
            "pagesFrom"=>$this->pagesFrom,
            "pagesTo"=>$this->pagesTo,
            "researchFileName"=>$this->researchFileName,
            "enterdTime"=>$this->enterdTime,
            "originalFileName"=>$this->originalFileName,
            
            "publisher"=>$researchPublisher,
            
            "researchType"=>$researchType,
            "specialization"=>$specialization,
            "accurateSpecialization"=>$accurateSpecialization,
            );

        return $arr;
    }
    //load form data
    private function loadData(){
        $this->arabicHeadingName = $this->CI->input->post("arabicHeading");

        $this->englishHeadingName = $this->CI->input->post("englishHeading");
        
        
        $this->arabicDescription =$this->CI->input->post("arabicDescription");
        $this->englishDescription = $this->CI->input->post("englishDescription");
        $this->keyWords =  $this->validation->careAboutNewLine( $this->CI->input->post("keyword"));
        
        $keyword = str_replace("*" ,"" ,$this->keyWords );        
        $keyword = str_replace("br" ,"*" ,$keyword);
        $keyword = str_replace("<" ,"" ,$keyword );
        $keyword = str_replace(">" ,"" ,$keyword );
        $keyword = str_replace("/" ,"" ,$keyword );
        $keyword = str_replace("  " ," " ,$keyword );
        $this->keyWords =$keyword;
        
        $this->researchNumber  = $this->CI->input->post("researchNumber");
        $this->publishDate = $this->CI->input->post("publishDate");
        $this->publishCountry = $this->CI->input->post("publishCountry");

        
        $this->pagesCount = $this->CI->input->post("pagesCount");
        $this->pagesTo = $this->CI->input->post("pagesTo");
        $this->pagesFrom = $this->CI->input->post("pagesFrom");
        

        

        $researchType = $this->CI->input->post("researchType");        
        $obj = new researchtype($this->CI);
        $res = $obj->findresearchtype(array("id"=>$researchType));
        if ($res && !empty($res)){
            $this->researchType = $res[0];
        }
        

        $specialization = $this->CI->input->post("specialization");        
        $obj = new specialization($this->CI);
        $res = $obj->findspecialization(array("id"=>$specialization));
        if ($res && !empty($res)){
            $this->specialization = $res[0];
        }
        
        
        $accurateSpecialization = $this->CI->input->post("accurateSpecialization");        
        $obj = new accurateSpecialization($this->CI);
        $res = $obj->findaccurateSpecialization(array("id"=>$accurateSpecialization));
        if ($res && !empty($res)){
            $this->accurateSpecialization = $res[0];
        }
        
        
        
        $publisher = $this->CI->input->post("publisher");        
        $pub = new publisher($this->CI);
        $res = $pub->findPublisher(array("id"=>$publisher));
        if ($res && !empty($res)){
            $this->publisher = $res[0];
        }
        
        
        $mainAuthorName = $this->CI->input->post("mainAuthorName");
        $auth = new author($this->CI);
        $auth->loadaccurateSpecialization =
    $auth->loadcurrentScientificDegree =
    $auth->loadinstitute =
    $auth->loadjob = 
    $auth->loadspecialization = true;
        $res = $auth->findauthor(array("id"=>$mainAuthorName));
        if ($res && !empty($res)){
            $this->mainAuthor = $res[0];
        }
        
        $firstAuthorName = $this->CI->input->post("firstAuthorName");
        if (!$this->isEmpty($firstAuthorName)){
            $res = $auth->findauthor(array("id"=>$firstAuthorName));
            if ($res && !empty($res)){
                $this->firstAuthor = $res[0];
            }
        }

                
        $secondAuthorName = $this->CI->input->post("secondAuthorName");
        
        if (!$this->isEmpty($secondAuthorName)){
            $res = $auth->findauthor(array("id"=>$secondAuthorName));
            if ($res && !empty($res)){
                $this->secondAuthor = $res[0];
            }
        }

        
        $thirdAuthorName = $this->CI->input->post("thirdAuthorName");
        
        if (!$this->isEmpty($thirdAuthorName)){
            $res = $auth->findauthor(array("id"=>$thirdAuthorName));
            if ($res && !empty($res)){
                $this->thirdAuthor = $res[0];
            }
        }

        
        $fourthAuthorName = $this->CI->input->post("fourthAuthorName");
        
        if (!$this->isEmpty($fourthAuthorName)){
            $res = $auth->findauthor(array("id"=>$fourthAuthorName));
            if ($res && !empty($res)){
                $this->fourthAuthor = $res[0];
            }
        }

        
        $fifthAuthorName = $this->CI->input->post("fifthAuthorName");
        
        if (!$this->isEmpty($fifthAuthorName)){
            $res = $auth->findauthor(array("id"=>$fifthAuthorName));
            if ($res && !empty($res)){
                $this->fifthAuthor = $res[0];
            }
        }

        
        $sixthAuthorName = $this->CI->input->post("sixthAuthorName");
        
        if (!$this->isEmpty($sixthAuthorName)){
            $res = $auth->findauthor(array("id"=>$sixthAuthorName));
            if ($res && !empty($res)){
                $this->sixthAuthor = $res[0];
            }
        }

        
        $seventhAuthorName = $this->CI->input->post("seventhAuthorName");
        
        if (!$this->isEmpty($seventhAuthorName)){
            $res = $auth->findauthor(array("id"=>$seventhAuthorName));
            if ($res && !empty($res)){
                $this->seventhAuthor = $res[0];
            }
        }

        
        $eighthAuthorName = $this->CI->input->post("eighthAuthorName");
        
        if (!$this->isEmpty($eighthAuthorName)){
            $res = $auth->findauthor(array("id"=>$eighthAuthorName));
            if ($res && !empty($res)){
                $this->eighthAuthor = $res[0];
            }
        }

        
        $ninthAuthorName = $this->CI->input->post("ninthAuthorName");
        
        if (!$this->isEmpty($ninthAuthorName)){
            $res = $auth->findauthor(array("id"=>$ninthAuthorName));
            if ($res && !empty($res)){
                $this->ninthAuthor = $res[0];
            }
        }

        
        $tenthAuthorName = $this->CI->input->post("tenthAuthorName");
        
        if (!$this->isEmpty($tenthAuthorName)){
            $res = $auth->findauthor(array("id"=>$tenthAuthorName));
            if ($res && !empty($res)){
                $this->tenthAuthor = $res[0];
            }
        }

        if($this->mode!="edit"){
            $this->enterdTime = time();            
            $usero = new user($this->CI);
            $user = $usero->getLoggedUser();
            if ($user){
                $this->createdBy = $user ;
            }else{
                $this->createdBy = new user($this->CI);
            }
        }
    }
    

    
    
    private function isEmpty($var){        
        if (isset($var)){
            if(!empty($var)){
                if($var != "-2222" && $var!=null && $var!="")
                    return false;
            }
        }
        return true;
    }
    
    
    private function validateRequired(){
        
        $valid = true;
        if($this->isEmpty($this->arabicHeadingName)){
            $this->errors["arabicHeading"][] = "required";
            $valid = false;
        } 
        

        if( $this->isEmpty($this->keyWords)){
            $this->errors["keyword"][] = "required";
            $valid = false;
            
        }
        if( $this->isEmpty($this->publishDate)){
            $this->errors["publishDate"][] = "required";
            $valid = false;
        }

        
        if( $this->isEmpty($this->publishCountry)){
            
            $this->errors["publishCountry"][] = "required";
            $valid = false;
        }
        
        if( $this->isEmpty($this->researchType)){
            
            $this->errors["researchType"][] = "required";
            $valid = false;
        }
        if( $this->isEmpty($this->pagesCount)){
            
            $this->errors["pagesCount"][] = "required";
            $valid = false;
        }
        if( $this->isEmpty($this->publisher)){
            
            $this->errors["publisher"][] = "required";
            $valid = false;
        }
        if( $this->isEmpty($this->mainAuthor)){
            
            $this->errors["mainAuthorName"][] = "required";
            $valid = false;
        }
        
        
        
        return $valid;
    }
    private function isValid(){
        
        $valid = true;
        if (!$this->validateRequired()){
            $valid = false;
        }
        
        if($this->mode=="insert"){
            if ($this->fileExists()){
                $valid = false;
            }        
        }

        return $valid;
    }
    public function fileExists(){
        $res = $this->findResearch(array("originalFileName"=>$this->originalFileName));
        if ($res && !empty($res)){
            $this->errors["file"][] = "you uploaded this file before";
            return $res[0];
        }
        return false;
    }
    
    #region setter
    
    public function setResearchData($row , &$report){
        $researchFileName = $row[0];
        $this->setOriginalFileName($researchFileName,$report);
        
        

        $this->arabicHeadingName = $row[1];
        $this->englishHeadingName = $row[2];
        $this->arabicDescription = $row[3];
        $this->englishDescription = $row[4];
        $this->keyWords = $row[5];
        
        
        $specialization=  $row[6];
        $this->setSpecialization($specialization,$report);

        $accurateSpecialization=  $row[7];
        $this->setAccurateSpecialization($accurateSpecialization,$report);

        $this->pagesCount = $row[8];
        $this->pagesFrom = $row[9];
        $this->pagesTo = $row[10];
        $this->researchNumber = $row[11];
        $this->publishDate = $row[12];
        $this->publishCountry = $row[13];
        
        $researchType=  $row[14];
        $this->setResearchType($researchType,$report);
        
        
        $publishername=  $row[15];
        $this->setPublisher($publishername,$report);
        
        
        $mainAuthorname=  $row[16];
        $this->mainAuthor =  $this->setAuthor($mainAuthorname,$report);
        $author1=  $row[17];
        $this->firstAuthor =  $this->setAuthor($author1,$report); 
        $author2=  $row[18];
        $this->secondAuthor =  $this->setAuthor($author2,$report); 
        $author3=  $row[19];                    
        $this->thirdAuthor =  $this->setAuthor($author3,$report);
        $author4=  $row[20];                    
        $this->fourthAuthor =  $this->setAuthor($author4,$report);   
        $author5=  $row[21];
        $this->fifthAuthor =  $this->setAuthor($author5,$report);   
        $author6=  $row[22];
        $this->sixthAuthor =  $this->setAuthor($author6,$report);  
        $author7=  $row[23];
        $this->seventhAuthor =  $this->setAuthor($author7,$report);  
        $author8=  $row[24];
        $this->eighthAuthor =  $this->setAuthor($author8,$report); 
        $author9=  $row[25];
        $this->ninthAuthor =  $this->setAuthor($author9,$report);  
        $author10=  $row[26];
        $this->tenthAuthor =  $this->setAuthor($author10,$report);
        
        
        if(!$this->isValid()){
            return false;
        }
        return true;
    }
    public $isNew; 
    public function setOriginalFileName($researchFileName , &$report){
        if(!empty($researchFileName) && $researchFileName!="" && $researchFileName!=null){
            $researchFileName = $this->validation->initialPrepare($researchFileName);
            $this->originalFileName = $researchFileName;

            if(!in_array($researchFileName , $report->newFiles) && !in_array($researchFileName , $report->oldFiles)){
                $res = $this->fileExists();
                if($res){
                    $this->mode="update";
                    unset($this->errors['file']);
                    $this->researchFileName = $res->researchFileName;
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
            $this->specialization = $specialization;
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
            $this->accurateSpecialization = $accurateSpecialization;
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
            $this->researchType = $researchType;
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
            $this->publisher = $Publisher;

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
    
    public $mode = "insert";
    public function uploadResearch($bulk=false ){

        if(!$bulk){
            $this->loadData();
        }
        
        if (!$this->isValid()){
            return false; 
        }
        if($this->mode=="insert"){
            $id =  $this->insertPaper();    
            $this->id=$id;            
        }else if ($this->mode=="update" || $this->mode=="edit"){
            $this->updataResearch();
            $this->deleteResearchAuthors();   
        }


        $authorresearch = new authorresearch($this->CI);
        $authorresearch->research = $this;
        $authorresearch->author = $this->mainAuthor;

        $authorresearch->authorNumber = 0;
        $authorresearch->insert();
        
        if($this->firstAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->firstAuthor;
            $authorresearch->authorNumber = 1;
            $authorresearch->insert();
        }
        if($this->secondAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->secondAuthor;
            $authorresearch->authorNumber = 2;
            $authorresearch->insert();
        }
        if($this->thirdAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->thirdAuthor;
            $authorresearch->authorNumber = 3;
            $authorresearch->insert();
        }
        if($this->fourthAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->fourthAuthor;
            $authorresearch->authorNumber = 4;
            $authorresearch->insert();
            
        }
        if($this->fifthAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->fifthAuthor;
            $authorresearch->authorNumber = 5;
            $authorresearch->insert();
        }
        if($this->sixthAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->sixthAuthor;
            $authorresearch->authorNumber = 6;
            $authorresearch->insert();
        }
        
        
        if($this->seventhAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->seventhAuthor;
            $authorresearch->authorNumber = 7;
            $authorresearch->insert();
        }
        
        if($this->eighthAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->eighthAuthor;
            $authorresearch->authorNumber = 8;
            $authorresearch->insert();
        }
        
        if($this->ninthAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->ninthAuthor;
            $authorresearch->authorNumber = 9;
            $authorresearch->insert();
        }
        if($this->tenthAuthor!=null){
            
            $authorresearch = new authorresearch($this->CI);
            $authorresearch->research = $this;
            $authorresearch->author = $this->tenthAuthor;
            $authorresearch->authorNumber = 10;
            $authorresearch->insert();

        }
        
        if($this->mode=="insert"){
            if($this->originalFileName!="")
                $this->writeToFile();
        }
        return true;
        //$this->pub = $this->CI->input->post("publisherInstitute");
        
        
    }
          
public function deleteResearchAuthors(){
    
    $authorresearch = new authorresearch($this->CI);
    $authorresearch->research = $this;
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>0));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>1));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>2));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>3));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>4));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>5));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>6));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>7));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>8));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>9));            
    $authorresearch->delete(array("researchId"=>$authorresearch->research->id ,"authorNumber"=>10));    
}
public function deleteAuthorResearch(){
    $authorresearch = new authorresearch($this->CI);
    $authorresearch->delete(array("researchId"=>$this->id ));            
    
}
public function delete(){
    $this->CI->researchmodel->delete(array("id"=>$this->id ));

}
public function deletePaperFile(){
    $file = fopen("./deleted.txt", "a");
    if($this->researchFileName!="")
    fwrite($file, 'http://www.abgadi.net/pdfs/'.$this->researchFileName."\n"); 
    
    fclose($file);
}
    public function writeToFile(){
        
        
        
        $file = fopen("./uploaded.txt", "a");
        if($this->researchFileName!="")
        fwrite($file, 'http://www.abgadi.net/pdfs/'.$this->researchFileName."\n"); 
        
        fclose($file);
        
        $xml = simplexml_load_file("./sitemap.xml");
        
        $xml->addChild('url')->addChild('loc', 'http://www.abgadi.net/pdfs/'.$this->researchFileName);
        if($this->researchFileName!="")
        file_put_contents('sitemap.xml', $xml->asXML());
        

    }
    public function updataResearch(){
        if($this->mode=="update"){
            $res = $this->findResearch(array("originalFileName"=>$this->originalFileName));            
        }else if ($this->mode=="edit"){
            $res = $this->findResearch(array("id"=>$this->id));  
            
        }
        $auth = $res[0];
        $this->id =$auth->id;
        if ($this->mode=="edit"){
            $this->originalFileName = $auth->originalFileName;
            $this->researchFileName = $auth->researchFileName;
        }
        $specialization = 0;
        if ($this->specialization && !empty($this->specialization)){
            $specialization = $this->specialization->id;
        }
        
        $accurateSpecialization = 0;
        if ($this->accurateSpecialization && !empty($this->accurateSpecialization)){
            $accurateSpecialization = $this->accurateSpecialization->id;
        }
        
        $researchType = 0;
        if ($this->researchType && !empty($this->researchType)){
            $researchType = $this->researchType->id;
        }
        
        $publisher = 0;
        if ($this->publisher && !empty($this->publisher)){
            $publisher = $this->publisher->id;
        }
        
        $paper = array(
            "englishHeadingName"=>$this->englishHeadingName,
            "arabicHeadingName"=>$this->arabicHeadingName,
            "arabicDescription"=>$this->arabicDescription,
            "englishDescription"=>$this->englishDescription,
            "keyWords"=>$this->keyWords,
            "researchNumber"=>$this->researchNumber,
            "publishDate"=>$this->publishDate,
            "publishCountry"=>$this->publishCountry,
            "researchType"=>$researchType,
            "specialization"=>$specialization,
            "accurateSpecialization"=>$accurateSpecialization,
            "pagesCount"=>$this->pagesCount,
            "pagesFrom"=>$this->pagesFrom,
            "pagesTo"=>$this->pagesTo,
            "researchFileName"=>$this->researchFileName,
            "originalFileName"=>$this->originalFileName,
            "publisherId"=>$publisher,
            "lastModifiedDate"=>time()
            );
        
        if ($this->mode=="update"){
            $this->CI->researchmodel->updateResearchByName($paper ,$this->originalFileName);            
        }else if ($this->mode=="edit"){
            $this->CI->researchmodel->updateResearchById($paper ,$this->id);            
        }
    }
    public function changeFilesName(){
        $paper = array(
            "researchFileName"=>$this->researchFileName,
            "originalFileName"=>$this->originalFileName,
            );
        if ($this->mode=="edit"){
            $this->CI->researchmodel->updateResearchById($paper ,$this->id);  
        }
        

        
    }
    public function insertPaper(){
        
        if(isset($this->createdBy) && $this->createdBy && !empty($this->createdBy)){
            $createdBy = (
                        isset($this->createdBy->username)
                        && $this->createdBy->username!="" 
                        && $this->createdBy->username!=null 
                        && !empty($this->createdBy->username)
                        ) ?0:$this->createdBy->id;
        }else{
            $createdBy = 0;
        }
        
        $specialization = 0;
        if ($this->specialization && !empty($this->specialization)){
            $specialization = $this->specialization->id;
        }
        
        $accurateSpecialization = 0;
        if ($this->accurateSpecialization && !empty($this->accurateSpecialization)){
            $accurateSpecialization = $this->accurateSpecialization->id;
        }
        
        $researchType = 0;
        if ($this->researchType && !empty($this->researchType)){
            $researchType = $this->researchType->id;
        }
        $this->enterdTime = time();
        $paper = array(
            "englishHeadingName"=>$this->englishHeadingName,
            "arabicHeadingName"=>$this->arabicHeadingName,
            "arabicDescription"=>$this->arabicDescription,
            "englishDescription"=>$this->englishDescription,
            "keyWords"=>$this->keyWords,
            "researchNumber"=>$this->researchNumber,
            "publishDate"=>$this->publishDate,
            "publishCountry"=>$this->publishCountry,
            "researchType"=>$researchType,
            "specialization"=>$specialization,
            "accurateSpecialization"=>$accurateSpecialization,
            "pagesCount"=>$this->pagesCount,
            "pagesFrom"=>$this->pagesFrom,
            "pagesTo"=>$this->pagesTo,
            "researchFileName"=>$this->researchFileName,
            "originalFileName"=>$this->originalFileName,
            "enterdTime"=>$this->enterdTime,
            "createdBy"=>$createdBy,
            "publisherId"=>$this->publisher->id
            );
        
        return $this->id =  $this->CI->researchmodel->insertResearch($paper);
    }
    

    public function findResearchesByFileNames($researches){
        $researchs = array();
        foreach($researches as $fileName){
            $research = $this->findResearchesByFileName($fileName);
            if($research){
                $researchs[] = $research;
            }
        }
        return $researchs;
    }
    private function findResearchesByFileName($researchFileName){
     $res =   $this->findResearch(array("researchFileName"=>$researchFileName));
     if(isset($res) && !empty($res)){
         return $res[0];
     }
     return null;
    }
    public function findResearch($research){
        $researchs = array();
        $res = $this->CI->researchmodel->findResearch($research);
        if ($res){
            $i=0;
            foreach($res as $row){    
                $researchs[$i] = new research($this->CI);
                $researchs[$i]->id=$row->id ; 
                $researchs[$i]->englishHeadingName=$row->englishHeadingName ;
                $researchs[$i]->arabicHeadingName=$row->arabicHeadingName ;
                $researchs[$i]->arabicDescription=$row->arabicDescription ;
                $researchs[$i]->englishDescription=$row->englishDescription ;
                $researchs[$i]->keyWords=$row->keyWords ;
                $researchs[$i]->researchNumber=$row->researchNumber ;
                $researchs[$i]->publishDate=$row->publishDate ;
                $researchs[$i]->publishCountry=$row->publishCountry ;
                $researchs[$i]->pagesCount=$row->pagesCount ;
                $researchs[$i]->pagesFrom=$row->pagesFrom ;
                $researchs[$i]->pagesTo=$row->pagesTo ;
                $researchs[$i]->researchFileName=$row->researchFileName ;
                $researchs[$i]->originalFileName=$row->originalFileName ;
                
                $researchs[$i]->enterdTime=$row->enterdTime ;
                
                if ($this->loadpublisher){
                    $publisher = new publisher($this->CI);
                    $publishers = $publisher->findPublisher(array("id"=>$row->publisherId));
                    if($publishers && !empty($publishers)){
                        $researchs[$i]->publisher=$publishers[0];                     
                    }
                }
                
                if ($this->loadspecialization){
                    $specialization = new specialization($this->CI);
                    $specializations = $specialization->findspecialization(array("id"=>$row->specialization));
                    if($specializations && !empty($specializations)){
                        $researchs[$i]->specialization=$specializations[0];                     
                    }
                }
                
                if ($this->loadaccurateSpecialization){
                    $accurateSpecialization = new accurateSpecialization($this->CI);
                    $accurateSpecializations = $accurateSpecialization->findaccurateSpecialization(array("id"=>$row->accurateSpecialization));
                    if($accurateSpecializations && !empty($accurateSpecializations)){
                        $researchs[$i]->accurateSpecialization=$accurateSpecializations[0];                     
                    }
                }
                
                if ($this->loadresearchType){
                    $researchType = new researchtype($this->CI);
                    $researchTypes = $researchType->findresearchtype(array("id"=>$row->researchType));
                    if($researchTypes && !empty($researchTypes)){
                        $researchs[$i]->researchType=$researchTypes[0];                     
                    }
                }
                

                
                
                $i++;
            }
        }
        return $researchs;
    }
    public function getCountofResearchs(){
       return $this->CI->researchmodel->getCountofResearchs();
    }
#region Sort content page
    public function getAllResearchesOrderdByPublishDateDesc(){
        $researchs = array();
        if($this->pagination->is_valid_page()){
            $offset = $this->pagination->offset();
            $limit = $this->pagination->per_page;
            $res = $this->CI->researchmodel->getAllResearchesOrderdByPublishDateDesc($offset , $limit);
            if ($res){
                $i=0;
                foreach($res as $row){    
                    $researchs[$i] = new research($this->CI);
                    $researchs[$i]->id=$row->id ; 
                    $researchs[$i]->englishHeadingName=$row->englishHeadingName ;
                    $researchs[$i]->arabicHeadingName=$row->arabicHeadingName ;
                    $researchs[$i]->arabicDescription=$row->arabicDescription ;
                    $researchs[$i]->englishDescription=$row->englishDescription ;
                    $researchs[$i]->keyWords=$row->keyWords ;
                    $researchs[$i]->researchNumber=$row->researchNumber ;
                    $researchs[$i]->publishDate=$row->publishDate ;
                    $researchs[$i]->publishCountry=$row->publishCountry ;
                    $researchs[$i]->pagesCount=$row->pagesCount ;
                    $researchs[$i]->pagesFrom=$row->pagesFrom ;
                    $researchs[$i]->pagesTo=$row->pagesTo ;
                    $researchs[$i]->researchFileName=$row->researchFileName ;
                    $researchs[$i]->originalFileName=$row->originalFileName ;
                    
                    $researchs[$i]->enterdTime=$row->enterdTime ;
                    
                    if ($this->loadpublisher){
                        $publisher = new publisher($this->CI);
                        $publishers = $publisher->findPublisher(array("id"=>$row->publisherId));
                        if($publishers && !empty($publishers)){
                            $researchs[$i]->publisher=$publishers[0];                     
                        }
                    }
                    
                    if ($this->loadspecialization){
                        $specialization = new specialization($this->CI);
                        $specializations = $specialization->findspecialization(array("id"=>$row->specialization));
                        if($specializations && !empty($specializations)){
                            $researchs[$i]->specialization=$specializations[0];                     
                        }
                    }
                    
                    if ($this->loadaccurateSpecialization){
                        $accurateSpecialization = new accurateSpecialization($this->CI);
                        $accurateSpecializations = $accurateSpecialization->findaccurateSpecialization(array("id"=>$row->accurateSpecialization));
                        if($accurateSpecializations && !empty($accurateSpecializations)){
                            $researchs[$i]->accurateSpecialization=$accurateSpecializations[0];                     
                        }
                    }
                    
                    if ($this->loadresearchType){
                        $researchType = new researchtype($this->CI);
                        $researchTypes = $researchType->findresearchtype(array("id"=>$row->researchType));
                        if($researchTypes && !empty($researchTypes)){
                            $researchs[$i]->researchType=$researchTypes[0];                     
                        }
                    }
                    
                    $researchs[$i]->getMainAuthor();
                    

                    $i++;
                }
            }
        }
        return $researchs;
    }
    
    public function getAllResearchesOrderdByResearchDesc(){
        $researchs = array();
        if($this->pagination->is_valid_page()){
            $offset = $this->pagination->offset();
            $limit = $this->pagination->per_page;
            $res = $this->CI->researchmodel->getAllResearchesOrderdByResearchDesc($offset , $limit);
            if ($res){
                $i=0;
                foreach($res as $row){    
                    $researchs[$i] = new research($this->CI);
                    $researchs[$i]->id=$row->id ; 
                    $researchs[$i]->englishHeadingName=$row->englishHeadingName ;
                    $researchs[$i]->arabicHeadingName=$row->arabicHeadingName ;
                    $researchs[$i]->arabicDescription=$row->arabicDescription ;
                    $researchs[$i]->englishDescription=$row->englishDescription ;
                    $researchs[$i]->keyWords=$row->keyWords ;
                    $researchs[$i]->researchNumber=$row->researchNumber ;
                    $researchs[$i]->publishDate=$row->publishDate ;
                    $researchs[$i]->publishCountry=$row->publishCountry ;
                    $researchs[$i]->pagesCount=$row->pagesCount ;
                    $researchs[$i]->pagesFrom=$row->pagesFrom ;
                    $researchs[$i]->pagesTo=$row->pagesTo ;
                    $researchs[$i]->researchFileName=$row->researchFileName ;
                    $researchs[$i]->originalFileName=$row->originalFileName ;
                    
                    $researchs[$i]->enterdTime=$row->enterdTime ;
                    
                    if ($this->loadpublisher){
                        $publisher = new publisher($this->CI);
                        $publishers = $publisher->findPublisher(array("id"=>$row->publisherId));
                        if($publishers && !empty($publishers)){
                            $researchs[$i]->publisher=$publishers[0];                     
                        }
                    }
                    
                    if ($this->loadspecialization){
                        $specialization = new specialization($this->CI);
                        $specializations = $specialization->findspecialization(array("id"=>$row->specialization));
                        if($specializations && !empty($specializations)){
                            $researchs[$i]->specialization=$specializations[0];                     
                        }
                    }
                    
                    if ($this->loadaccurateSpecialization){
                        $accurateSpecialization = new accurateSpecialization($this->CI);
                        $accurateSpecializations = $accurateSpecialization->findaccurateSpecialization(array("id"=>$row->accurateSpecialization));
                        if($accurateSpecializations && !empty($accurateSpecializations)){
                            $researchs[$i]->accurateSpecialization=$accurateSpecializations[0];                     
                        }
                    }
                    
                    if ($this->loadresearchType){
                        $researchType = new researchtype($this->CI);
                        $researchTypes = $researchType->findresearchtype(array("id"=>$row->researchType));
                        if($researchTypes && !empty($researchTypes)){
                            $researchs[$i]->researchType=$researchTypes[0];                     
                        }
                    }
                    
                    $researchs[$i]->getMainAuthor();
                    

                    $i++;
                }
            }
        }
        return $researchs;
    }
    public function getAllResearchesOrderdByAuthorDesc(){
        $researchs = array();
        if($this->pagination->is_valid_page()){
            $offset = $this->pagination->offset();
            $limit = $this->pagination->per_page;
            $res = $this->CI->researchmodel->getAllResearchesOrderdByAuthorDesc($offset , $limit);
            if ($res){
                $i=0;
                foreach($res as $row){    
                    $researchs[$i] = new research($this->CI);
                    $researchs[$i]->id=$row->id ; 
                    $researchs[$i]->englishHeadingName=$row->englishHeadingName ;
                    $researchs[$i]->arabicHeadingName=$row->arabicHeadingName ;
                    $researchs[$i]->arabicDescription=$row->arabicDescription ;
                    $researchs[$i]->englishDescription=$row->englishDescription ;
                    $researchs[$i]->keyWords=$row->keyWords ;
                    $researchs[$i]->researchNumber=$row->researchNumber ;
                    $researchs[$i]->publishDate=$row->publishDate ;
                    $researchs[$i]->publishCountry=$row->publishCountry ;
                    $researchs[$i]->pagesCount=$row->pagesCount ;
                    $researchs[$i]->pagesFrom=$row->pagesFrom ;
                    $researchs[$i]->pagesTo=$row->pagesTo ;
                    $researchs[$i]->researchFileName=$row->researchFileName ;
                    $researchs[$i]->originalFileName=$row->originalFileName ;
                    
                    $researchs[$i]->enterdTime=$row->enterdTime ;
                    
                    if ($this->loadpublisher){
                        $publisher = new publisher($this->CI);
                        $publishers = $publisher->findPublisher(array("id"=>$row->publisherId));
                        if($publishers && !empty($publishers)){
                            $researchs[$i]->publisher=$publishers[0];                     
                        }
                    }
                    
                    if ($this->loadspecialization){
                        $specialization = new specialization($this->CI);
                        $specializations = $specialization->findspecialization(array("id"=>$row->specialization));
                        if($specializations && !empty($specializations)){
                            $researchs[$i]->specialization=$specializations[0];                     
                        }
                    }
                    
                    if ($this->loadaccurateSpecialization){
                        $accurateSpecialization = new accurateSpecialization($this->CI);
                        $accurateSpecializations = $accurateSpecialization->findaccurateSpecialization(array("id"=>$row->accurateSpecialization));
                        if($accurateSpecializations && !empty($accurateSpecializations)){
                            $researchs[$i]->accurateSpecialization=$accurateSpecializations[0];                     
                        }
                    }
                    
                    if ($this->loadresearchType){
                        $researchType = new researchtype($this->CI);
                        $researchTypes = $researchType->findresearchtype(array("id"=>$row->researchType));
                        if($researchTypes && !empty($researchTypes)){
                            $researchs[$i]->researchType=$researchTypes[0];                     
                        }
                    }
                    
                    $researchs[$i]->getMainAuthor();
                    

                    $i++;
                }
            }
        }
        return $researchs;

    }
    public function getAllResearchesOrderdByPublisherDesc(){
        $researchs = array();
        if($this->pagination->is_valid_page()){
            $offset = $this->pagination->offset();
            $limit = $this->pagination->per_page;
            $res = $this->CI->researchmodel->getAllResearchesOrderdByPublisherDesc($offset , $limit);
            if ($res){
                $i=0;
                foreach($res as $row){    
                    $researchs[$i] = new research($this->CI);
                    $researchs[$i]->id=$row->id ; 
                    $researchs[$i]->englishHeadingName=$row->englishHeadingName ;
                    $researchs[$i]->arabicHeadingName=$row->arabicHeadingName ;
                    $researchs[$i]->arabicDescription=$row->arabicDescription ;
                    $researchs[$i]->englishDescription=$row->englishDescription ;
                    $researchs[$i]->keyWords=$row->keyWords ;
                    $researchs[$i]->researchNumber=$row->researchNumber ;
                    $researchs[$i]->publishDate=$row->publishDate ;
                    $researchs[$i]->publishCountry=$row->publishCountry ;
                    $researchs[$i]->pagesCount=$row->pagesCount ;
                    $researchs[$i]->pagesFrom=$row->pagesFrom ;
                    $researchs[$i]->pagesTo=$row->pagesTo ;
                    $researchs[$i]->researchFileName=$row->researchFileName ;
                    $researchs[$i]->originalFileName=$row->originalFileName ;
                    
                    $researchs[$i]->enterdTime=$row->enterdTime ;
                    
                    if ($this->loadpublisher){
                        $publisher = new publisher($this->CI);
                        $publishers = $publisher->findPublisher(array("id"=>$row->publisherId));
                        if($publishers && !empty($publishers)){
                            $researchs[$i]->publisher=$publishers[0];                     
                        }
                    }
                    
                    if ($this->loadspecialization){
                        $specialization = new specialization($this->CI);
                        $specializations = $specialization->findspecialization(array("id"=>$row->specialization));
                        if($specializations && !empty($specializations)){
                            $researchs[$i]->specialization=$specializations[0];                     
                        }
                    }
                    
                    if ($this->loadaccurateSpecialization){
                        $accurateSpecialization = new accurateSpecialization($this->CI);
                        $accurateSpecializations = $accurateSpecialization->findaccurateSpecialization(array("id"=>$row->accurateSpecialization));
                        if($accurateSpecializations && !empty($accurateSpecializations)){
                            $researchs[$i]->accurateSpecialization=$accurateSpecializations[0];                     
                        }
                    }
                    
                    if ($this->loadresearchType){
                        $researchType = new researchtype($this->CI);
                        $researchTypes = $researchType->findresearchtype(array("id"=>$row->researchType));
                        if($researchTypes && !empty($researchTypes)){
                            $researchs[$i]->researchType=$researchTypes[0];                     
                        }
                    }
                    
                    $researchs[$i]->getMainAuthor();
                    

                    $i++;
                }
            }
        }
        return $researchs;
    }
    public $pagination;
    public function getAllResearchesOrderdByEnterTimeDesc(){
        
        $researchs = array();
        if($this->pagination->is_valid_page()){
            $offset = $this->pagination->offset();
            $limit = $this->pagination->per_page;
            $res = $this->CI->researchmodel->getAllResearchesOrderdByEnterTimeDesc($offset , $limit);
            if ($res){
                $i=0;
                foreach($res as $row){    
                    $researchs[$i] = new research($this->CI);
                    $researchs[$i]->id=$row->id ; 
                    $researchs[$i]->englishHeadingName=$row->englishHeadingName ;
                    $researchs[$i]->arabicHeadingName=$row->arabicHeadingName ;
                    $researchs[$i]->arabicDescription=$row->arabicDescription ;
                    $researchs[$i]->englishDescription=$row->englishDescription ;
                    $researchs[$i]->keyWords=$row->keyWords ;
                    $researchs[$i]->researchNumber=$row->researchNumber ;
                    $researchs[$i]->publishDate=$row->publishDate ;
                    $researchs[$i]->publishCountry=$row->publishCountry ;
                    $researchs[$i]->pagesCount=$row->pagesCount ;
                    $researchs[$i]->pagesFrom=$row->pagesFrom ;
                    $researchs[$i]->pagesTo=$row->pagesTo ;
                    $researchs[$i]->researchFileName=$row->researchFileName ;
                    $researchs[$i]->originalFileName=$row->originalFileName ;
                    
                    $researchs[$i]->enterdTime=$row->enterdTime ;
                    
                    if ($this->loadpublisher){
                        $publisher = new publisher($this->CI);
                        $publishers = $publisher->findPublisher(array("id"=>$row->publisherId));
                        if($publishers && !empty($publishers)){
                            $researchs[$i]->publisher=$publishers[0];                     
                        }
                    }
                    
                    if ($this->loadspecialization){
                        $specialization = new specialization($this->CI);
                        $specializations = $specialization->findspecialization(array("id"=>$row->specialization));
                        if($specializations && !empty($specializations)){
                            $researchs[$i]->specialization=$specializations[0];                     
                        }
                    }
                    
                    if ($this->loadaccurateSpecialization){
                        $accurateSpecialization = new accurateSpecialization($this->CI);
                        $accurateSpecializations = $accurateSpecialization->findaccurateSpecialization(array("id"=>$row->accurateSpecialization));
                        if($accurateSpecializations && !empty($accurateSpecializations)){
                            $researchs[$i]->accurateSpecialization=$accurateSpecializations[0];                     
                        }
                    }
                    
                    if ($this->loadresearchType){
                        $researchType = new researchtype($this->CI);
                        $researchTypes = $researchType->findresearchtype(array("id"=>$row->researchType));
                        if($researchTypes && !empty($researchTypes)){
                            $researchs[$i]->researchType=$researchTypes[0];                     
                        }
                    }
                    
                    $researchs[$i]->getMainAuthor();
                    

                    $i++;
                }
            }
        }
        return $researchs;
    }
    
    #endregion sort content page
    public function getResearchAuthors(){
        $researchAuth = new authorresearch($this->CI);
        $researchAuth->loadauthor = true;
        $this->authorResearches = $researchAuth->findauthorresearch(array("researchId"=>$this->id));
    }
    public function getMainAuthor(){
        $researchAuth = new authorresearch($this->CI);
        $researchAuth->loadauthor = true;
         $authorResearches = $researchAuth->findauthorresearch(array("researchId"=>$this->id , "authorNumber"=>0));        
         $authorResearch = $authorResearches[0];
         $this->mainAuthor =$authorResearch->author;
    }


}