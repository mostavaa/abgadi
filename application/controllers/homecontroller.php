<?php
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
        
        if($this->doUpload("./pdfs" ,$newName)){
            $paper->originalFileName =  $_FILES["file"]['name'];
            $paper->researchFileName = $newName.".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            
            if (!$paper->uploadResearch()){
                $valid = false;
            }
            
        }else{
            $valid = false;
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

    
}    