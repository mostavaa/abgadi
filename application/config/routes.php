<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['product/(:num)/(:num)'] = 'homecontroller/product_lookup_by_id/$1/$2';
//http://localhost/abgadi/abgadi.com/abgadi.com/index.php/product/5/2
//$route['product/(:any) = 'homecontroller/product_lookup_by_id/$1';
//http://localhost/abgadi/abgadi.com/abgadi.com/index.php/product/mostava
/*
  $route['products']['put'] = 'product/insert';// must be put request

$route['products/([a-zA-Z]+)/edit/(\d+)'] = function ($product_type, $id)
       {
               return 'catalog/product_edit/' . strtolower($product_type) . '/' . $id;
       };
       */
       $route['home'] = "homecontroller";       
       $route['search'] = "homecontroller/submitsearch";       
       $route['register123'] = "usercontroller/registerview";       
       $route['login'] = "usercontroller/loginview";       
       $route['userlogin'] = "usercontroller/login";       
       $route['userregister'] = "usercontroller/register";       
       $route['logout'] = "usercontroller/logout";       
       $route['download'] = "homecontroller/downloadResearch";       
       
       $route['institutes'] = "homecontroller/allinstitues";
       $route['nopermission'] = "homecontroller/notPermitted"; 
       
       $route['admin/addsientificdegree'] = "homecontroller/addsientificdegree";       
       $route['admin/addaccuratespecialization'] = "homecontroller/addaccuratespecialization";       
       $route['admin/addspecialization'] = "homecontroller/addspecialization";       
       $route['admin/addnewjob'] = "homecontroller/addnewjob";       
       $route['admin/addresearchtype'] = "homecontroller/addresearchtype";       
       $route['admin/addinstitute'] = "homecontroller/addinstitute";       
       $route['admin/addauthor'] = "homecontroller/addauthor";       
       $route['admin/addpublisher'] = "homecontroller/addpublisher";       
       $route['admin/getinstituteauthors'] = "homecontroller/getinstituteauthors";       
       $route['admin/getinstitutepublishers'] = "homecontroller/getinstitutepublishers";       
       $route['admin/editonetable'] = "homecontroller/editonetable";       
       $route['admin/deleteontable'] = "homecontroller/deleteontable";       
       $route['admin/addonetable'] = "homecontroller/addonetable";       
       
       
       
       
       
       
       
       
       
       
       
       
       $route['add'] = "homecontroller/addtolibrary";       
       $route['admin/manage'] = "homecontroller/content";       
       $route['admin/bulk'] = "homecontroller/bulkaddpapers";       
       $route['admin/edit'] = "homecontroller/manipulateone";       
       $route['admin/upload'] = "homecontroller/uploadpaperview";
       $route['admin/replace'] = "homecontroller/replacesinglefile";
       $route['admin/dobulk'] = "homecontroller/dobulkupload";
       $route['admin/loadbulkfiles'] = "homecontroller/bulkloadfiles";
       $route['admin/cancel'] = "homecontroller/cancelcsv";
       $route['admin/uploadcsv'] = "homecontroller/uploadcsv";
       $route['admin/backuppapers'] = "homecontroller/backuppapers";
       $route['admin/deletepaper/(:num)'] = "homecontroller/deletepaper/$1";
       $route['admin/findresearchbyid'] = "homecontroller/getResearchById";
       
       $route['admin/formupload'] = "homecontroller/upload";
       $route['admin/editpaper/(:num)'] = "homecontroller/editpaper/$1";
       
       $route['admin/backup'] = "homecontroller/backup";
       $route['admin/data'] = "homecontroller/data";       
       $route['admin/authors'] = "homecontroller/allauthors";       
       $route['admin/publishers'] = "homecontroller/allpublishers";
       
       $route['admin/data/researches'] = "homecontroller/displaydata";
       $route['admin/data/researches/date'] = "homecontroller/displaydatapublishdate";
       $route['admin/data/researches/name'] = "homecontroller/displaydataresearch";
       $route['admin/data/researches/publisher'] = "homecontroller/displaydatapublisher";
       $route['admin/data/researches/author'] = "homecontroller/displaydataauthor";
       
       $route['admin/data/researches/(:num)'] = "homecontroller/displaydata/$1";
       $route['admin/data/researches/date/(:num)'] = "homecontroller/displaydatapublishdate/$1";
       $route['admin/data/researches/name/(:num)'] = "homecontroller/displaydataresearch/$1";
       $route['admin/data/researches/publisher/(:num)'] = "homecontroller/displaydatapublisher/$1";
       $route['admin/data/researches/author/(:num)'] = "homecontroller/displaydataauthor/$1";
       
       
       $route['researches'] = "homecontroller/listallresearches";
       $route['research/(:num)'] = "homecontroller/listoneresearch/$1";
       $route['institute/(:num)'] = "homecontroller/listoneinst/$1";
       $route['publisher/(:num)'] = "homecontroller/listonepub/$1";
       $route['author/(:num)'] = "homecontroller/listoneauth/$1";
$route['default_controller'] = "homecontroller";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */