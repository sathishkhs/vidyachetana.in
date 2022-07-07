<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = "index";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

include_once("database.php");

$con = mysqli_connect($db['default']['hostname'], $db['default']['username'],$db['default']['password'], $db['default']['database'] ) or die("Some error occurred during connection " . mysqli_error($con));

$query_pages = mysqli_query($con, "SELECT page_slug from pages where status_ind=1");
while($result_page = mysqli_fetch_assoc($query_pages)){
  // print_r($result_page);
  if(!empty($result_page['page_slug'])){
          
          $route[$result_page['page_slug']] = "pages/index/".$result_page['page_slug'];
        } else {
                $route[$result_page['page_id']] = "pages/index/".$result_page['page_id'];
        }
}



// $seva_pages =  mysqli_query($con, "SELECT page_slug from sevas_page where status_ind=1");
// while($result_page = mysqli_fetch_assoc($seva_pages)){
//         // print_r($result_page);
//         if(!empty($result_page['page_slug'])){
//                 $route[$result_page['page_slug']] = "seva_page/index/".$result_page['page_slug'];
//         } else {
//                 $route[$result_page['doctors_id']] = "seva_page/index/".$result_page['doctors_id'];
//         }
// }

// Donation pages 
$route['donate'] = 'campaigns/index/sponsor-for-education';
$route['sponsor-a-child'] = 'campaigns/index/sponsor-a-child';
$route['sponsor-for-education'] = 'campaigns/index/sponsor-for-education';
$route['each-1-educate-1'] = 'campaigns/index/each-1-educate-1';
$route['mothers-day'] = 'campaigns/index/mothers-day';
$route['campaign'] = 'campaigns/campaign';
$route['faq'] = 'campaigns/index/faq';


// Pages and Custom pages
$route['about-vidya-chetana'] = "custom_page/index/about-vidya-chetana";

$route['contact-us'] = "custom_page/index/contact-us";
$route['gallery'] = "custom_page/index/gallery";


$route['our-team'] = 'custom_page/index/our-team';
$route['official-documents'] = 'custom_page/index/official-documents';
$route['financial-transparency'] = 'custom_page/index/financial-transparency';
$route['our-stories'] = 'custom_page/index/our-stories';
$route['csr-partnership'] = 'custom_page/index/csr-partnership';
$route['online-application'] = 'custom_page/index/online-application';

// Benificiaries Stories
$route['sahana'] = 'custom_page/index/sahana';
$route['pooja'] = 'custom_page/index/pooja';
$route['yatish'] = 'custom_page/index/yatish';
$route['harshith'] = 'custom_page/index/harshith';


