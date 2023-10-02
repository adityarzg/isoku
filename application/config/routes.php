<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route Landing Pages
$route['homepage'] = 'Landing';
$route['shop'] = 'Landing/shop';
$route['about'] = 'Landing/about';
$route['contact'] = 'Landing/contact';
// $route['admin'] = 'Landing/forbidden';
// $route['berkaryadenganhati'] = 'Admin';

//Route untuk  add / edit Landing Page
$route['edit/(:any)/(:any)'] = 'Admin/form/$1/$2';
$route['processTitle'] = 'Admin/processTitle';
