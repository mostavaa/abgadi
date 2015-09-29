<?php
header("Content-Type: text/html; charset=utf-8");

include_once("core.php");
class homecontroller extends CI_Controller {
    private $old_fileName  ; 
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
        $this->load->view('home/index');
    } 
    
    public function search() {
        if (!permissions::Authorized("homecontroller/search" , $this)){
            return ;
        }
        $this->load->view('home/search');
        
    }
    public function content(){
        if (!permissions::Authorized("homecontroller/content" , $this)){
            return ;
        }
        $this->load->view('home/content');        
    }
    public function bulkaddpapers(){
        if (!permissions::Authorized("homecontroller/bulkaddpapers" , $this)){
            return ;
        }
        $this->load->view('home/bulkaddpapers');        
    }
    public function displaydata($page=1){
        if (!permissions::Authorized("homecontroller/displaydata" , $this)){
            return ;
        }
        
        
        $research = new research($this);
        
        $data["page"]=$page;
        $perpage = 10;
        $totalCount =$research->getCountofResearchs();
        $research->pagination = new Pagination($page , $perpage , $totalCount);
        $data["totalPages"]= $research->pagination->total_pages();
        $research->loadpublisher = true;
        $researchs =  $research->getAllResearchesOrderdByEnterTimeDesc();
        $data["researchs"] = $researchs;
        $this->load->view('home/displaydata' , $data);
    }
    
    public function displaydatapublishdate($page=1){
        if (!permissions::Authorized("homecontroller/displaydata" , $this)){
            return ;
        }
        
        
        $research = new research($this);
        
        $data["page"]=$page;
        $perpage = 10;
        $totalCount =$research->getCountofResearchs();
        $research->pagination = new Pagination($page , $perpage , $totalCount);
        $data["totalPages"]= $research->pagination->total_pages();
        $research->loadpublisher = true;
        $researchs =  $research->getAllResearchesOrderdByPublishDateDesc();
        $data["researchs"] = $researchs;
        $this->load->view('home/displaydata' , $data);
    }
    
    public function displaydataresearch($page=1){
        if (!permissions::Authorized("homecontroller/displaydata" , $this)){
            return ;
        }
        
        
        $research = new research($this);
        
        $data["page"]=$page;
        $perpage = 10;
        $totalCount =$research->getCountofResearchs();
        $research->pagination = new Pagination($page , $perpage , $totalCount);
        $data["totalPages"]= $research->pagination->total_pages();
        $research->loadpublisher = true;
        $researchs =  $research->getAllResearchesOrderdByResearchDesc();
        $data["researchs"] = $researchs;
        $this->load->view('home/displaydata' , $data);
    }
    
    
    
    
    
    
    public function displaydatapublisher($page=1){
        if (!permissions::Authorized("homecontroller/displaydata" , $this)){
            return ;
        }
        
        
        $research = new research($this);
        
        $data["page"]=$page;
        $perpage = 10;
        $totalCount =$research->getCountofResearchs();
        $research->pagination = new Pagination($page , $perpage , $totalCount);
        $data["totalPages"]= $research->pagination->total_pages();
        $research->loadpublisher = true;
        $researchs =  $research->getAllResearchesOrderdByPublisherDesc();
        $data["researchs"] = $researchs;
        $this->load->view('home/displaydata' , $data);
    }
    
    public function displaydataauthor($page=1){
        if (!permissions::Authorized("homecontroller/displaydata" , $this)){
            return ;
        }
        
        
        $research = new research($this);
        
        $data["page"]=$page;
        $perpage = 10;
        $totalCount =$research->getCountofResearchs();
        $research->pagination = new Pagination($page , $perpage , $totalCount);
        $data["totalPages"]= $research->pagination->total_pages();
        $research->loadpublisher = true;
        $researchs =  $research->getAllResearchesOrderdByAuthorDesc();
        $data["researchs"] = $researchs;
        $this->load->view('home/displaydata' , $data);
    }
    

    
    
    
    
    private function generateRandomName(){
        //get new file name
        while(true){
            $newName = tools::generateRandomWord(8);
            $research = array("researchFileName"=>$newName);
            
            $research  = $this->researchmodel->findResearch($research);
            if(!$research){
                break;
            }
        }
        
        return $newName;
        
        
    }
    function doUpload($path="./pdfs" , $fileName = "1")
    {
        if (!permissions::Authorized("homecontroller/doUpload" , $this)){
            return false;
        }
        $config = array();
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|doc|docx';
        $config ['max_size'] = '4096';
        $config['file_name'] = $fileName;

        $config['overwrite']     = TRUE;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload("file"))
        {
            $errors = $this->upload->display_errors();
            
            // echo "<pre>";
            
            // print_r($errors);
            // echo "</pre>";
            
        }
        else
        {
            
            
            return true;
            // Code After Files Upload Success GOES HERE
            //echo "<pre>";
            //print_r($this->upload->data());
            //echo "</pre>";
            //fwrite($file, $this->upload->data()['file_name']."\n"); 
            //rename($this->upload->data()['full_path'], $i.$this->upload->data()['file_ext']);
            
        }


        return false;
    }
    private function set_upload_options()
    {   
        //  upload an image options
        $config = array();
        $config['upload_path'] = "./images/home/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config ['max_size'] = '2048';
        $config['overwrite']     = TRUE;


        return $config;
    }
    
    
    public function uploadpaperview(){
        
        if (!permissions::Authorized("homecontroller/uploadpaperview" , $this)){
            return ;
        }
        $publisher = new publisher($this);
        $author = new author($this);
        $accurateSpecialization = new accurateSpecialization($this);
        $specializaton = new specialization($this);
        $researchtype = new researchtype($this);
        $institute = new institute($this);
        $job = new job($this);
        $sc = new scientificdegree($this);
        
        $data["publishers"]= $publisher->findPublisher(array());
        $data["authors"] = $author->findauthor(array());
        $data["specializatons"] = $specializaton->findspecialization(array());
        
        $data["researchtypes"] = $researchtype->findresearchtype(array());
        
        $data["accurateSpecializations"] = $accurateSpecialization->findaccurateSpecialization(array());

        $data["institutes"] = $institute->findInstitute(array());
        $data["jobs"] = $job->findjob(array());
        $data["scs"] = $sc->findscientificdegree(array());
        
        $this->load->view('home/uploadpaper' , $data);
        
    }
    public function upload(){
        if (!permissions::Authorized("homecontroller/upload" , $this)){
            return ;
        }
        $paper = new research($this);
        $newName =$this->generateRandomName();
        $valid = true;
        if(isset($_FILES["file"]['name']) && !empty($_FILES["file"]['name'])){
            if($this->doUpload("./pdfs" ,$newName)){
                $paper->originalFileName =  $_FILES["file"]['name'];
                $paper->researchFileName = $newName.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                
                if (!$paper->uploadResearch()){
                    $valid = false;
                }
                
            }else{
                $valid = false;
            }
        }else{
            if (!$paper->uploadResearch()){
                $valid = false;
            }
        }
        
        
        if(!$valid){
            
            $data["arabicHeading"] = $this->input->post("arabicHeading");
            $data["englishHeading"] = $this->input->post("englishHeading");
            $data["arabicDescription"] = $this->input->post("arabicDescription");
            $data["englishDescription"] = $this->input->post("englishDescription");
            $data["keyword"] = $this->input->post("keyword");
            $data["researchNumber"] = $this->input->post("researchNumber");
            $data["publishDate"] = $this->input->post("publishDate");
            $data["publishCountry"] = $this->input->post("publishCountry");
            $data["researchType"] = $this->input->post("researchType");
            $data["specialization"] = $this->input->post("specialization");
            $data["accurateSpecialization"] = $this->input->post("accurateSpecialization");
            $data["pagesCount"] = $this->input->post("pagesCount");
            $data["pagesFrom"] = $this->input->post("pagesFrom");
            $data["pagesTo"] = $this->input->post("pagesTo");
            $data["publisher"] = $this->input->post("publisher");
            $data["mainAuthorName"] = $this->input->post("mainAuthorName");
            $data["firstAuthorName"] = $this->input->post("firstAuthorName");
            $data["secondAuthorName"] = $this->input->post("secondAuthorName");
            $data["thirdAuthorName"] = $this->input->post("thirdAuthorName");
            $data["fourthAuthorName"] = $this->input->post("fourthAuthorName");
            $data["fifthAuthorName"] = $this->input->post("fifthAuthorName");
            $data["sixthAuthorName"] = $this->input->post("sixthAuthorName");
            $data["seventhAuthorName"] = $this->input->post("seventhAuthorName");
            $data["eighthAuthorName"] = $this->input->post("eighthAuthorName");
            $data["ninthAuthorName"] = $this->input->post("ninthAuthorName");
            $data["tenthAuthorName"] = $this->input->post("tenthAuthorName");
            
            $paper->errors["file"][] = $this->upload->display_errors();
            $data["errors"] = $paper->errors;
            
            
            $publisher = new publisher($this);
            $author = new author($this);
            $accurateSpecialization = new accurateSpecialization($this);
            $specializaton = new specialization($this);
            $researchtype = new researchtype($this);
            $institute = new institute($this);
            $job = new job($this);
            $sc = new scientificdegree($this);
            
            $data["publishers"]= $publisher->findPublisher(array());
            $data["authors"] = $author->findauthor(array());
            $data["specializatons"] = $specializaton->findspecialization(array());
            $data["researchtypes"] = $researchtype->findresearchtype(array());
            $data["accurateSpecializations"] = $accurateSpecialization->findaccurateSpecialization(array());
            $data["institutes"] = $institute->findInstitute(array());
            $data["jobs"] = $job->findjob(array());
            $data["scs"] = $sc->findscientificdegree(array());
            $this->load->view('home/uploadpaper' , $data);
        }else{
            $this->session->set_flashdata("success" , "true");
            redirect(base_url("index.php/homecontroller/uploadpaperview"));
        }
        
    }
    public function getInstituteAuthors(){
        if (!permissions::Authorized("homecontroller/getInstituteAuthors" , $this)){
            return ;
        }
        $id = $this->input->post("id");
        $id = intval($id);
        if ($id != "" && $id!=null && !empty($id)){
            $author = new author($this);
            $authors =  $author->findauthor(array("instituteId"=>$id));
            if ($authors && !empty($authors)){
                //echo json_encode ($authors);
                foreach($authors as $auth){
                    echo $auth->id.",".$auth->name."&";
                }
            }
        }
    }
    public function notPermitted(){
        $this->load->view("home/notpermitted");
    }

    
    
    //fine
    public function addAuthor(){
        if (!permissions::Authorized("homecontroller/addAuthor" , $this)){
            return ;
        }
        $job = $this->input->post("newJob");
        $specification = $this->input->post("newAuthSpecialization") ;
        $accurateSpecification =$this->input->post("newAuthAccurateSpecialization")  ;
        $scientificdegree =$this->input->post("sientificDegree") ;
        
        $obj = new job($this);
        $jobs = $obj->findjob(array("id"=>$job));
        $job = $jobs[0];
        $obj = new specialization($this);
        $specifications = $obj->findspecialization(array("id"=>$specification));
        $specification = $specifications[0];
        $obj = new accurateSpecialization($this);
        $accurateSpecifications = $obj->findaccurateSpecialization(array("id"=>$accurateSpecification));
        $accurateSpecification = $accurateSpecifications[0];
        $obj = new scientificdegree($this);
        $scientificdegrees = $obj->findscientificdegree(array("id"=>$scientificdegree));
        $scientificdegree = $scientificdegrees[0];
        
        $name =$this->input->post("newAuthName");
        $jobAddress =$this->input->post("AuthJobAddress") ;
        $jobPhone = $this->input->post("AuthJobPhone");
        $mobile =$this->input->post("AuthMobile") ;
        $mail =$this->input->post("AuthMail");
        
        
        $id=$this->input->post("id");
        $id= intval($id);
        
        $obj = new institute($this);
        $institutes = $obj->findInstitute(array("id"=>$id));
        $institute = $institutes[0];
        if($id!="" && $id!=null && !empty($id) ){
            if ($name!="" && $name!=null && !empty($name)){
                if ($job!="" && $job!=null && !empty($job)){
                    if ($scientificdegree!="" && $scientificdegree!=null && !empty($scientificdegree)){
                        
                        $auth = new author($this);
                        $auth->name = $name;
                        $auth->job = $job;
                        $auth->specialization = $specification ; 
                        $auth->accurateSpecialization = $accurateSpecification;
                        $auth->currentScientificDegree = $scientificdegree;
                        $auth->jobAddress = $jobAddress;
                        $auth->jobPhone = $jobPhone;
                        $auth->mobileNumber = $mobile;
                        $auth->mail = $mail;
                        $auth->institute = $institute;
                        
                        $id = $auth->insert();
                        echo "success,".$id;
                    }
                }
            }
        }
    }

    public function addresearchType(){
        if (!permissions::Authorized("homecontroller/addresearchType" , $this)){
            return ;
        }
        $val = $this->input->post("val");
        if ($val!="" && $val!=null && !empty($val)){
            $inst = new researchtype($this);
            $inst->name = $val;
            $id = $inst->insert();
            echo "success,".$id;
        }
    }
    
    public function addnewJob(){
        if (!permissions::Authorized("homecontroller/addnewJob" , $this)){
            return ;
        }
        $val = $this->input->post("val");
        if ($val!="" && $val!=null && !empty($val)){
            $inst = new job($this);
            $inst->name = $val;
            $id = $inst->insert();
            echo "success,".$id;
        }
    }
    
    public function addspecialization(){
        if (!permissions::Authorized("homecontroller/addspecialization" , $this)){
            return ;
        }
        $val = $this->input->post("val");
        if ($val!="" && $val!=null && !empty($val)){
            $inst = new specialization($this);
            $inst->name = $val;
            $id = $inst->insert();
            echo "success,".$id;
        }
    }
    public function addaccurateSpecialization(){
        if (!permissions::Authorized("homecontroller/addaccurateSpecialization" , $this)){
            return ;
        }
        $val = $this->input->post("val");
        if ($val!="" && $val!=null && !empty($val)){
            $inst = new accurateSpecialization($this);
            $inst->name = $val;
            $id = $inst->insert();
            echo "success,".$id;
        }
    }
    public function addsientificDegree(){
        if (!permissions::Authorized("homecontroller/addsientificDegree" , $this)){
            return ;
        }
        $val = $this->input->post("val");
        if ($val!="" && $val!=null && !empty($val)){
            $inst = new scientificdegree($this);
            $inst->name = $val;
            $id = $inst->insert();
            echo "success,".$id;
        }
    }
    
    //fine
    public function addPublisher(){
        if (!permissions::Authorized("homecontroller/addPublisher" , $this)){
            return ;
        }
        $val = $this->input->post("val");
        $id=$this->input->post("id");
        $id= intval($id);
        $obj = new institute($this);
        $institutes = $obj->findInstitute(array("id"=>$id));
        $institute = $institutes[0];
        if ($val!="" && $val!=null && !empty($val)){
            if($id!="" && $id!=null && !empty($id) ){
                $pub = new publisher($this);
                $pub->publisherName = $val;
                $pub->institute =$institute;
                $id = $pub->insert();
                echo "success,".$id;            
            }

        }
    }
    
    //fine
    public function addInstitute(){
        if (!permissions::Authorized("homecontroller/addInstitute" , $this)){
            return ;
        }
        $val = $this->input->post("val");
        if ($val!="" && $val!=null && !empty($val)){
            $inst = new institute($this);
            $inst->instituteName = $val;
            $id = $inst->insert();
            echo "success,".$id;
        }
    }
    //fine
    
    public function getInstitutePublishers(){
        if (!permissions::Authorized("homecontroller/getInstitutePublishers" , $this)){
            return ;
        }
        $id = $this->input->post("id");
        $id = intval($id);
        if ($id != "" && $id!=null && !empty($id)){
            $publisher = new publisher($this);
            $publishers =  $publisher->findPublisher(array("instituteId"=>$id));
            if ($publishers && !empty($publishers)){
                //echo json_encode ($publishers);
                foreach($publishers as $pub){
                    echo $pub->id.",".$pub->publisherName."&";
                }
            }
        }
    }
    
    public function getResearchById(){
        $id = $this->input->post("id");
        $id = intval($id);
        $research = new research($this);
        $research->loadaccurateSpecialization = $research->loadspecialization = $research->loadresearchType =true;
        $researchs = $research->findResearch(array("id"=>$id));
        $research = $researchs[0];
        $research->loadaccurateSpecialization = $research->loadspecialization = $research->loadresearchType =true;
        $researchArr = $research->toArray();
        
        $research->getResearchAuthors();
        
        $authArr = array();
        foreach($research->authorResearches as $authResearch){
            
            $author = $authResearch->author ;
            $authArr[] = $author->name;
            
        }  
        $researchArr["authors"]=$authArr;
        //print_r($researchArr);
        //echo json_encode($researchArr,JSON_UNESCAPED_UNICODE);
        echo $this->raw_json_encode($researchArr);
    }
    function raw_json_encode($input) {

        return preg_replace_callback(
            '/\\\\u([0-9a-zA-Z]{4})/',
            function ($matches) {
                return mb_convert_encoding(pack('H*',$matches[1]),'UTF-8','UTF-16');
            },
            json_encode($input)
        );

    }
    
    public function dobulkupload(){
        
        $mycsv = $this->session->userdata('mycsv');
        if(isset($mycsv) && !empty($mycsv)){
            $mycsv = unserialize($mycsv);
            foreach($mycsv->files as $file){
                
                
                $resType = new researchtype($this);
                $file->research->researchType = $resType->findResearchTypeByName($file->research->researchType , "create");
                
                $pub = new publisher($this);
                $file->research->publisher =  $pub->findPublisherByName( $file->research->publisher, "create");
                
                $spec = new specialization($this);
                $file->research->specialization = $spec->findSpecByName($file->research->specialization , "create");
                
                $accSpec = new accurateSpecialization($this);
                $file->research->accurateSpecialization = $accSpec->findAccurateSpecByName($file->research->accurateSpecialization , "create");
                
                $auth = new author($this);
                $file->research->mainAuthor = $auth->findAuthorByName($file->research->mainAuthor , "create");
                
                $file->research->firstAuthor  =   $auth->findAuthorByName($file->research->firstAuthor , "create");            
                $file->research->secondAuthor  =   $auth->findAuthorByName($file->research->secondAuthor , "create");            
                $file->research->thirdAuthor  =   $auth->findAuthorByName($file->research->thirdAuthor , "create");            
                $file->research->fourthAuthor  =   $auth->findAuthorByName($file->research->fourthAuthor , "create");            
                $file->research->fifthAuthor  =   $auth->findAuthorByName($file->research->fifthAuthor , "create");            
                $file->research->sixthAuthor  =   $auth->findAuthorByName($file->research->sixthAuthor , "create");            
                $file->research->seventhAuthor  =   $auth->findAuthorByName($file->research->seventhAuthor , "create");            
                $file->research->eighthAuthor  =   $auth->findAuthorByName($file->research->eighthAuthor , "create");            
                $file->research->ninthAuthor  =   $auth->findAuthorByName($file->research->ninthAuthor , "create");            
                $file->research->tenthAuthor  =   $auth->findAuthorByName($file->research->tenthAuthor , "create");            

                if($file->isNew){
                    $valid  = $file->research->uploadResearch(true);
                    //move file to main folder
                    rename("./tmp/".$file->research->researchFileName, './pdfs/'.$file->research->researchFileName);
                }else{
                    //old file
                    $file->research->mode = "update";
                    $valid=$file->research->uploadResearch(true);
                }

            }
            
            $this->session->set_userdata("mycsv" , array());
            $this->session->set_flashdata("success" , "success");
            redirect(base_url("index.php/homecontroller/bulkaddpapers"));
        }
    }
    
    public function bulkloadfiles(){
        $fileUpload = new FileUpload($this);
        $fileUpload->path="./tmp/";
        $fileUpload->doMultipleUpload("file");
    }
    
    private function isUTF8File($filepath){
        if (mb_check_encoding(file_get_contents($filepath), 'UTF-8')){
            return true;
        }
        return false;
    }
    public function cancelcsv(){
        $this->deleteAllFilesinDir("./tmp/*");
        $mycsv = $this->session->userdata('mycsv');
        if(isset($mycsv) && !empty($mycsv)){
            $mycsv = unserialize($mycsv);
            unlink("./csvs/".$mycsv->csvName);
            $this->session->set_userdata("mycsv" , array());   
        }
        redirect(base_url("index.php/homecontroller/bulkaddpapers"));
    }
    private function deleteAllFilesinDir($path){
        $files = glob($path); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }
    }
    public function uploadcsv(){

        $config = array();
        $config['upload_path'] = "./csvs/";
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '4096';

        $this->upload->initialize($config);
        if (!$this->upload->do_upload("file"))
        {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata("errors" , $errors);
            redirect(base_url("index.php/homecontroller/bulkaddpapers"));
        }
        else
        {
            
            
            $uploadData = $this->upload->data();
            $filename = $uploadData["file_name"];

            if (!$this->isUTF8File("./csvs/".$filename)) {
                $this->session->set_flashdata("errors" , "Please Make Sure That File Encoding in UTF-8");
                unlink("./csvs/".$filename);
                redirect(base_url("index.php/homecontroller/bulkaddpapers")); 
            }
            
            $csv =  $this->readCsv("./csvs/".$filename);
            //echo "<pre>";
            //print_r($csv);
            //echo "</pre>";
            
            // array of array
            
            $report = new reportEntry();
            $myCsv = new myCSV();
            $myCsv->didUploadCsv = true;
            $myCsv->csvName = $filename;
            $myCsv->files = array();
            $i=0;
            foreach($csv as $row){
                if( !empty($row))
                {
                    if($i==0)//for header
                    {
                        $i++;
                        continue;
                    }
                    $newresearch = new myFile();
                    $valid = $newresearch->research->setResearchData($row , $report);
                    $newresearch->isNew = $newresearch->research->isNew;
                    if(!$valid){
                        $newresearch->status="error";
                        $newresearch->validationStatus = false;                        
                    }
                    $myCsv->files[] = $newresearch;
                }               
            }
            
            $myCsv->reportEntry = $report;
            /*
            ini_set('xdebug.var_display_max_depth', 10);
            ini_set('xdebug.var_display_max_children', 256);
            ini_set('xdebug.var_display_max_data', 1024);
            echo "<pre>";
            var_dump($myCsv);
            echo "</pre>";
            die();
             */
            //$this->session->set_flashdata("myCsv" , $myCsv);
            $serialized =  serialize($myCsv);
            $this->session->set_userdata("mycsv" , $serialized);
            redirect(base_url("index.php/homecontroller/bulkaddpapers"));
        }
    }
    
    public function replacesinglefile(){
        $oldfilename= $this->input->post("oldfile");
        $mycsv = $this->session->userdata('mycsv');
        if(isset($mycsv) && !empty($mycsv)){
            $mycsv = unserialize($mycsv);
        }


        $myfile = &$mycsv->findFileByName($oldfilename);
        if($myfile){
            if($myfile->research->originalFileName== $_FILES['file']['name']){
                
                $config = array();
                $config['upload_path'] = "./tmp/";
                $config['allowed_types'] = 'pdf|doc|docx';
                $config ['max_size'] = '4096';
                
                $newName =$this->generateRandomName();
                $config['file_name'] = $newName;
                $myfile->research->researchFileName = $newName.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                
                $this->upload->initialize($config);
                if (!$this->upload->do_upload("file"))
                {
                    $errors = $this->upload->display_errors();
                    $status="error";
                    $myfile->status = $status;
                    $myfile->error = $errors;
                }else{
                    $myfile->status = "ok";
                }
                $serialized =  serialize($mycsv);
                $this->session->set_userdata("mycsv" , $serialized);
                redirect(base_url("index.php/homecontroller/bulkaddpapers"));
            }
        }
        redirect(base_url("index.php/homecontroller/bulkaddpapers"));
        
    }
    
    private function readCsv($filepath){
        $file = fopen($filepath,"r");
        
        $csv = array();
        //echo "<pre>";
        while(! feof($file))
        {
            //print_r(fgetcsv($file));
            $csv[]= fgetcsv($file);
        }
        /*
        $lines = file("./csvs/".$filename);
        foreach($lines as $line){
        $csv[]= explode("," ,$line);
        }
         */ 
        //echo "</pre>";
        fclose($file);
        return $csv;
        

    }
    
    #region db manipulation
    
    public function manipulateone(){
        if (!permissions::Authorized("homecontroller/manipulateone" , $this)){
            return ;
        }
        $specialization = new specialization($this);
        $accSpecialization = new accurateSpecialization($this);
        $secientificDegree = new scientificdegree($this);
        $reserchType = new researchtype($this);
        $institute = new institute($this);
        $job = new job($this);
        
        $data["specializations"] = $specialization->findspecialization(array());
        $data["accSpecializations"] = $accSpecialization->findaccurateSpecialization(array());
        $data["scientificDegrees"] = $secientificDegree->findscientificdegree(array());
        $data["researchTypes"] = $reserchType->findresearchtype(array());
        $data["institutes"] = $institute->findInstitute(array());
        $data["jobs"] = $job->findjob(array());
        
        $author = new author($this);
        $author->loadaccurateSpecialization = $author->loadcurrentScientificDegree
        = $author->loadinstitute = $author->loadjob = $author->loadspecialization = true;
        $data["authors"] = $author->findauthor(array());
        
        $publisher = new publisher($this);
        $publisher->loadinstitute = true;
        $data["publishers"] = $publisher->findPublisher(array());
        
        $this->load->view("manipulate/manipulateone" , $data);
    }
    
    private $tables = array("specialization", "accSpecialization", "scientificDegree", "researchType", "institute", "job" , "publisher" , "author");
    public function editonetable(){
        $table = $this->input->post("table");
        $inputId = $this->input->post("inputId");
        $inputId = intval($inputId);
        $inputText = $this->input->post("inputText"); 
        $instituteId = $this->input->post("instituteId");
        if(isset($table) && !empty($table) && $table!="" && in_array($table , $this->tables)){
            if (isset($inputId) && !empty($inputId) && $inputId!="" && is_int($inputId) ){
                if (isset($inputText) && !empty($inputText) && $inputText!=""){
                    // logic goes here
                    if($table=="specialization"){
                        $specialization = new specialization($this);
                        $specialization->id = $inputId ; 
                        $specialization->name = $inputText;
                        $specialization->update();
                        echo "success";
                    }else if ($table=="accSpecialization"){
                        $accsSpecialization = new accurateSpecialization($this);
                        $accsSpecialization->id = $inputId ; 
                        $accsSpecialization->name = $inputText;
                        $accsSpecialization->update();
                        echo "success";
                    }else if ($table=="scientificDegree"){
                        $secientificDegree = new scientificdegree($this);
                        $secientificDegree->id = $inputId ; 
                        $secientificDegree->name = $inputText;
                        $secientificDegree->update();
                        echo "success";
                    }else if ($table=="researchType"){
                        $reserchType = new researchtype($this);
                        $reserchType->id = $inputId ; 
                        $reserchType->name = $inputText;
                        $reserchType->update();
                        echo "success";
                    }else if ($table=="institute"){
                        $institute = new institute($this);
                        $institute->id = $inputId ; 
                        $institute->instituteName = $inputText;
                        $institute->update();
                        echo "success";
                    }else if ($table=="job"){
                        $job = new job($this);
                        $job->id = $inputId ; 
                        $job->name = $inputText;
                        $job->update();
                        echo "success";
                    }else if ($table=="publisher"){
                        $publisher = new publisher($this);
                        $publisher->id = $inputId ; 
                        $publisher->publisherName = $inputText;
                        $publisher->instituteId = $instituteId;
                        $publisher->update();
                        echo "success";
                    }else if ($table=="author"){
                        $job = $this->input->post("job");
                        $specification = $this->input->post("specialization") ;
                        $accurateSpecification =$this->input->post("accurateSpecialization")  ;
                        $scientificdegree =$this->input->post("currentScientificDegree") ;
                        $institute=$this->input->post("instituteId");
                        $jobAddress =$this->input->post("jobAddress") ;
                        $jobPhone = $this->input->post("jobPhone");
                        $mobile =$this->input->post("mobileNumber") ;
                        $mail =$this->input->post("mail");
                        
                        
                        $obj = new job($this);
                        $jobs = $obj->findjob(array("id"=>$job));
                        $job=0;
                        if(isset($jobs) && !empty($jobs)){
                            $job = $jobs[0];
                        }
                        
                        $obj = new specialization($this);
                        $specifications = $obj->findspecialization(array("id"=>$specification));
                        $specification=0;
                        if(isset($specifications) && !empty($specifications)){
                            $specification = $specifications[0];
                        }
                        
                        $obj = new accurateSpecialization($this);
                        $accurateSpecifications = $obj->findaccurateSpecialization(array("id"=>$accurateSpecification));
                        $accurateSpecification = 0;
                        if(isset($accurateSpecifications) && !empty($accurateSpecifications)){
                            $accurateSpecification = $accurateSpecifications[0];
                        }
                        
                        $obj = new scientificdegree($this);
                        $scientificdegrees = $obj->findscientificdegree(array("id"=>$scientificdegree));
                        $scientificdegree=0;
                        if(isset($scientificdegrees) && !empty($scientificdegrees)){
                            $scientificdegree = $scientificdegrees[0];
                        }

                        $institute= intval($institute);
                        
                        $obj = new institute($this);
                        $institutes = $obj->findInstitute(array("id"=>$institute));
                        $institute=0;
                        if(isset($institutes) && !empty($institutes)){
                            $institute = $institutes[0];
                        }
                        $auth = new author($this);
                        $auth->id = $inputId ;
                        $auth->name = $inputText;
                        $auth->job = $job;
                        $auth->specialization = $specification ; 
                        $auth->accurateSpecialization = $accurateSpecification;
                        $auth->currentScientificDegree = $scientificdegree;
                        $auth->jobAddress = $jobAddress;
                        $auth->jobPhone = $jobPhone;
                        $auth->mobileNumber = $mobile;
                        $auth->mail = $mail;
                        $auth->institute = $institute;
                        $auth->update();
                        echo "success";
                    }else{
                        echo "error";
                    }
                    
                }else{
                    echo "Please enter value";
                }
            }else{
                echo "Error Loading Scripts , please reload page or use a new browser";
            } 
        }else{
            echo "error";
        }
    }
    
    public function addonetable(){
        $table = $this->input->post("table");
        $inputText = $this->input->post("inputText");       
        $instituteId = $this->input->post("instituteId");

        if(isset($table) && !empty($table) && $table!="" && in_array($table , $this->tables)){
            if (isset($inputText) && !empty($inputText) && $inputText!=""){
                // logic goes here
                
                if($table=="specialization"){
                    $specialization = new specialization($this);
                    $specialization->name = $inputText;
                    $specialization->insert();
                    echo "success";
                }else if ($table=="accSpecialization"){
                    $accsSpecialization = new accurateSpecialization($this);
                    $accsSpecialization->name = $inputText;
                    $accsSpecialization->insert();
                    echo "success";
                }else if ($table=="scientificDegree"){
                    $secientificDegree = new scientificdegree($this);
                    $secientificDegree->name = $inputText;
                    $secientificDegree->insert();
                    echo "success";
                }else if ($table=="researchType"){
                    $reserchType = new researchtype($this);
                    $reserchType->name = $inputText;
                    $reserchType->insert();
                    echo "success";
                }else if ($table=="institute"){
                    $institute = new institute($this);
                    $institute->instituteName = $inputText;
                    $institute->insert();
                    echo "success";
                }else if ($table=="job"){
                    $job = new job($this);
                    $job->name = $inputText;
                    $job->insert();
                    echo "success";
                }else if ($table=="publisher"){
                    $publisher = new publisher($this);
                    $publisher->publisherName = $inputText;
                    
                    $instituteId = intval($instituteId);
                    $obj = new institute($this);
                    $institutes = $obj->findInstitute(array("id"=>$instituteId));
                    $institute=0;
                    if(isset($institutes) && !empty($institutes)){
                        $institute = $institutes[0];                        
                    }
                    $publisher->institute =$institute;
                    $publisher->insert();
                    echo "success";
                }else if ($table=="author"){
                    $job = $this->input->post("job");
                    $specification = $this->input->post("specialization") ;
                    $accurateSpecification =$this->input->post("accurateSpecialization")  ;
                    $scientificdegree =$this->input->post("currentScientificDegree") ;
                    $institute=$this->input->post("instituteId");
                    $jobAddress =$this->input->post("jobAddress") ;
                    $jobPhone = $this->input->post("jobPhone");
                    $mobile =$this->input->post("mobileNumber") ;
                    $mail =$this->input->post("mail");
                    
                    
                    $obj = new job($this);
                    $jobs = $obj->findjob(array("id"=>$job));
                    $job=0;
                    if(isset($jobs) && !empty($jobs)){
                        $job = $jobs[0];
                    }
                    
                    $obj = new specialization($this);
                    $specifications = $obj->findspecialization(array("id"=>$specification));
                    $specification=0;
                    if(isset($specifications) && !empty($specifications)){
                        $specification = $specifications[0];
                    }
                    
                    $obj = new accurateSpecialization($this);
                    $accurateSpecifications = $obj->findaccurateSpecialization(array("id"=>$accurateSpecification));
                    $accurateSpecification = 0;
                    if(isset($accurateSpecifications) && !empty($accurateSpecifications)){
                        $accurateSpecification = $accurateSpecifications[0];
                    }
                    
                    $obj = new scientificdegree($this);
                    $scientificdegrees = $obj->findscientificdegree(array("id"=>$scientificdegree));
                    $scientificdegree=0;
                    if(isset($scientificdegrees) && !empty($scientificdegrees)){
                        $scientificdegree = $scientificdegrees[0];
                    }

                    $institute= intval($institute);
                    
                    $obj = new institute($this);
                    $institutes = $obj->findInstitute(array("id"=>$institute));
                    $institute=0;
                    if(isset($institutes) && !empty($institutes)){
                        $institute = $institutes[0];
                    }
                    $auth = new author($this);
                    $auth->name = $inputText;
                    $auth->job = $job;
                    $auth->specialization = $specification ; 
                    $auth->accurateSpecialization = $accurateSpecification;
                    $auth->currentScientificDegree = $scientificdegree;
                    $auth->jobAddress = $jobAddress;
                    $auth->jobPhone = $jobPhone;
                    $auth->mobileNumber = $mobile;
                    $auth->mail = $mail;
                    $auth->institute = $institute;
                    $auth->insert();
                    echo "success";
                }else{
                    echo "error";
                }
            }else{
                echo "Please enter value";
            }
            
        }else{
            echo "error";
        }
    }
    public function deleteontable(){
        $table = $this->input->post("table");
        $inputId = $this->input->post("inputId");
        $inputId = intval($inputId);       
        if(isset($table) && !empty($table) && $table!="" && in_array($table , $this->tables)){
            if (isset($inputId) && !empty($inputId) && $inputId!="" && is_int($inputId) ){
                
                // logic goes here
                if($table=="specialization"){
                    $specialization = new specialization($this);
                    $specialization->id = $inputId ; 
                    $specialization->delete();
                    echo "success";
                }else if ($table=="accSpecialization"){
                    $accsSpecialization = new accurateSpecialization($this);
                    $accsSpecialization->id = $inputId ; 
                    $accsSpecialization->delete();
                    echo "success";
                }else if ($table=="scientificDegree"){
                    $secientificDegree = new scientificdegree($this);
                    $secientificDegree->id = $inputId ; 
                    $secientificDegree->delete();
                    echo "success";
                }else if ($table=="researchType"){
                    $reserchType = new researchtype($this);
                    $reserchType->id = $inputId ; 
                    $reserchType->delete();
                    echo "success";
                }else if ($table=="institute"){
                    $institute = new institute($this);
                    $institute->id = $inputId ; 
                    $institute->delete();
                    echo "success";
                }else if ($table=="job"){
                    $job = new job($this);
                    $job->id = $inputId ; 
                    $job->delete();
                    echo "success";
                }else if ($table=="publisher"){
                    $publisher= new publisher($this);
                    $publisher->id = $inputId ; 
                    $publisher->delete();
                    echo "success";
                }else if ($table=="author"){
                    $author= new author($this);
                    $author->id = $inputId ; 
                    $author->delete();
                    echo "success";
                }else{
                    echo "error";
                }
            }else{
                echo "Error Loading Scripts , please reload page or use a new browser";
            } 
        }else{
            echo "error";
        }
    }
    
    #endregion
    
}

class reportEntry{
    public
    
    $numberOfNewFiles , $numberOfOldFiles ,
    $newFiles = array() , $oldFiles = array(),
    
    $numberOfNewAuthors , $numberOfOldAuthors , 
    $newAuthors = array() , $oldAuthors = array()
    
    ,$numberOfNewPublishers , $numberOfOldPublishers , 
    $newPublishers = array() , $oldPublishers = array()
    
    ,$numberOfNewSpecializations , $numberOfOldSpecializations , 
    $newSpecializations = array() , $oldSpecializations = array()
    
    ,$numberOfNewAccurateSpecializations , $numberOfOldAccurateSpecializations , 
    $newAccurateSpecializations = array() , $oldAccurateSpecializations = array()
    
    ,$numberOfNewResearchTypes , $numberOfOldResearchTypes , 
    $newResearchTypes = array() , $oldResearchTypes = array()
    ;
    
    function __construct(){
        $this->numberOfNewAccurateSpecializations = $this->numberOfOldAuthors = $this->numberOfNewFiles
        =$this->numberOfNewPublishers = $this->numberOfOldPublishers = $this->numberOfNewResearchTypes 
        = $this->numberOfNewSpecializations = $this->numberOfOldResearchTypes = $this->numberOfOldSpecializations 
        =$this->numberOfOldAccurateSpecializations = $this->numberOfNewAuthors = $this->numberOfOldFiles =0;
        
    }
}

class myCSV {
    public $didUploadCsv , $didUploadFiles;
    public $csvName ; 
    public $files ;
    public $reportEntry;
    public $extraFiles ;
    function __construct(){
        $this->files = array();//array of myFile
        $this->reportEntry = new reportEntry();
        $this->extraFiles = array();
        $this->didUploadCsv = $this->didUploadFiles = false;
    }
    
    public function getAllFileNames(){
        $fileNames = array();
        foreach($this->files as $file){
            $fileNames[]= $file->research->originalFileName;
        }
        return $fileNames;
    }
    public function getAllNewFileNames(){
        $fileNames = array();
        foreach($this->files as $file){
            if($file->isNew){
                $fileNames[]= $file->research->originalFileName;                
            }
        }
        return $fileNames;
    }
    
    public function getAllOldFileNames(){
        $fileNames = array();
        foreach($this->files as $file){
            if(!$file->isNew){
                $fileNames[]= $file->research->originalFileName;                
            }
        }
        return $fileNames;
    }
    public function findFileByName($fileName){
        foreach($this->files as $file){
            if ($file->research->originalFileName==$fileName){
                return $file;   
            }
        }
        return false;
    }
    public function areAllNewFilesUploadedOk(){

        foreach($this->files as $file){
            
            if($file->isNew){
                if($file->status!="ok" || $file->validationStatus==false){
                    return false;
                }
            }
        }
        return true;
    }
}

