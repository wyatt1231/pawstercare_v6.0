<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = "login";
$route['404_override'] = 'errors';


/*********** USER DEFINED ROUTES *******************/


$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';

$route['adopterList'] = 'user/adopterList';
$route['adopterHistoryList'] = 'user/adopterHistory';

$route['deniedadopterList'] = 'user/deniedHistory';

$route['reportedadopter'] = 'user/ReportedAdopterList';

$route['logout'] = 'user/logout';

$route['userListing'] = 'user/userListing';
$route['adminapprove'] = "user/adminapprove";
$route['adminblock'] = "user/adminblock";

$route['PetCrueltyList'] = 'user/crueltyListing';
$route['PetCrueltyCompletedList'] = 'user/crueltyCompListing';

$route['Approval'] = 'user/Approval';
$route['adopter'] = 'user/adopterListing';

/*REPORTS*/

$route['reports'] = 'user/reports';
// $route['permonth'] = 'user/permonth';
// $route['lowest'] = 'user/lowest_rated';
// $route['approve_denied_reports'] = 'user/approve_denied_reports';
// $route['bybreed'] = 'user/bybreed';
// $route['byyear'] = 'user/byyear';
// $route['cruelty_report'] = 'user/crueltyreport';
/*REPORTS*/


$route['petlist'] = 'user/petListing';
$route['petlist/(:num)'] = "user/petList/$1";

$route['userListing/(:num)'] = "user/userListing/$1";

$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";

$route['addNewPet'] = "user/addNewPet";

$route['addPet'] = "user/addPet";

$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";


$route['user/adopter_filter'] = "user/adopter_filter";

$route['petCrueltyView'] = "user/editPetCrueltyView";
$route['petCrueltyView'] = "user/editPetCrueltyViews";
$route['petCrueltyView/(:num)'] = "user/editPetCrueltyViews/$1";

$route['petCrueltyAction'] = "user/updateremarks";
$route['petCrueltyAction/(:num)'] = "user/updateremarks/$1";

$route['editPet'] = "user/editPet";
$route['editPets'] = "user/editPets";
$route['editPet/(:num)'] = "user/editPet/$1";

$route['editAdopter'] = "user/editAdopter";
$route['editAdopter'] = "user/editAdopter";
$route['editAdopter/(:num)'] = "user/editOldAdopter/$1";

$route['reporteduser/(:num)'] = "user/reporteduser/$1";


$route['blockadopter'] = "user/blockadopter";

$route['adoptionrequest'] = "user/adoption_requestset";
$route['adoptionrequests'] = "user/adoption_requests";
$route['adoptionrequest/(:num)'] = "user/adoption_requestset/$1";


$route['deniedadoption'] = "user/deniedadoption";
$route['deniedadoption/(:num)'] = "user/deniedadoption/$1";

$route['adoptioninfo'] = "user/adoption_info";
$route['adoptioninfo/(:num)'] = "user/adoption_info/$1";

$route['DeniedAdoptioninfo'] = "user/DeniedAdoption_info";
$route['DeniedAdoptioninfo/(:num)'] = "user/DeniedAdoption_info/$1";


$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";


$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */