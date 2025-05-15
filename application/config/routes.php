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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'IndexCntrl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//routing
//register
$route['lupa'] = 'IndexCntrl/lupa';
$route['register'] = 'IndexCntrl/register';
//auth
$route['logout'] = 'IndexCntrl/logoutProcess';
$route['login'] = 'IndexCntrl/login';

$route['pendaftaran'] = 'pelamarCntrl/pendaftaran';
$route['hal_asesor'] = 'pelamarCntrl/hal_asesor';
$route['bahan_verifikasi'] = 'pelamarCntrl/bahan_verifikasi';
$route['identitas'] = 'pelamarCntrl/identitas';
$route['formasi'] = 'pelamarCntrl/formasi';
$route['pengalaman_kerja'] = 'pelamarCntrl/pengalaman_kerja';
$route['lampiran'] = 'pelamarCntrl/lampiran';
$route['resume'] = 'pelamarCntrl/resume';
$route['panduan'] = 'pelamarCntrl/panduan';
$route['pelamar'] = 'pelamarCntrl/index';
$route['pelamartahaptiga'] = 'pelamarCntrl/downloaddaftarpesertalolosdua';
$route['pelamartahapempat'] = 'pelamarCntrl/downloaddaftarpesertalolostiga';
$route['pelamarlolosonline'] = 'pelamarCntrl/action';

$route['dashboard'] = 'DashCntrl/index';
$route['user'] = 'UserCntrl/index';
$route['profil'] = 'UserCntrl/profil';
