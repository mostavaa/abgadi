<?php

/**
 * this file for permissions of main pages
 *
 * @version 1.0
 * @author mostafa
 */
class permissions
{
    private static $perms = array(
        "visitor"=>array(
            "homecontroller/index" , 
            "homecontroller/search" , 
            "usercontroller/login",
            "usercontroller/loginview",
            "usercontroller/isuserexist",
            ),
        "user"=>array(
                    "homecontroller/index" , 
            "homecontroller/search" , 
            "homecontroller/content",
            "homecontroller/backup",
            "homecontroller/backuppapers",
            "homecontroller/bulkaddpapers",
            "homecontroller/getInstituteAuthors",
            "homecontroller/displaydata",
            "homecontroller/addAuthor",
            "homecontroller/addPublisher",
            "homecontroller/addInstitute",
            "homecontroller/addsientificDegree",
            "homecontroller/addaccurateSpecialization",
            "homecontroller/addspecialization",
            "homecontroller/addnewJob",
            "homecontroller/addresearchType",
            "homecontroller/getInstitutePublishers",
            "homecontroller/uploadpaperview",
            "homecontroller/upload",
            "homecontroller/doUpload",
            "homecontroller/editpaper",
            "usercontroller/registerview",
            "usercontroller/logout",
            //"usercontroller/login",
            //"usercontroller/register",
            "usercontroller/isuserexist",
            //"usercontroller/loginview",
            "homecontroller/manipulateone",
            "homecontroller/data",
            "homecontroller/allauthors",
            "homecontroller/allpublishers",
            "homecontroller/allinstitutes"
            
        )
        );
    
    public static function Authorized($action , $CI){
        
        $user = new user($CI);
        
        $user = $user->getLoggedUser();
        if ($user){
            $type = "user";    
            
        }else{
            $type = "visitor";
        }
        if (!in_array($action, permissions::$perms[$type])){
            redirect(base_url("index.php/homecontroller/notPermitted"));
            return false;
        }else{
            return true;            
        }
        return false;
    }
}
