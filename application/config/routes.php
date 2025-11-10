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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Admin URL 변경 (보안 강화) - 2025.11.10
// 새로운 Admin URL: /secure-admin/ (기존: /adm/)
$route['secure-admin'] = 'adm/auth/login';
$route['secure-admin/index/frame'] = 'adm/index/frame';
$route['secure-admin/top'] = 'adm/index/top';
$route['secure-admin/menu'] = 'adm/index/menu';
$route['secure-admin/auth/login'] = 'adm/auth/login';
$route['secure-admin/auth/login/check'] = 'adm/auth/login/check';
$route['secure-admin/auth/logout'] = 'adm/auth/logout';
$route['secure-admin/member/user'] = 'adm/member/user';
$route['secure-admin/member/user/list'] = 'adm/member/user/list';
$route['secure-admin/(:any)/(:any)/(:any)'] = 'adm/$1/$2/$3';
$route['secure-admin/(:any)/(:any)'] = 'adm/$1/$2';
$route['secure-admin/(:any)'] = 'adm/$1';

// 기존 Admin 경로 차단 (보안)
$route['admin'] = 'welcome/index';
$route['admin/(:any)'] = 'welcome/index';
$route['adm'] = 'welcome/index';
$route['adm/(:any)'] = 'welcome/index';

