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

$route['edit/(:any)/(:any)'] = 'Admin/form/$1/$2';

//Route untuk  add / edit Landing Page
$route['processTitle'] = 'Admin/processTitle';

//Route untuk  add / edit Galeri Isoku
$route['processGaleri'] = 'Admin/processGaleri';

//Route untuk  add / edit Pelatihan Ecoprint
$route['processPelatihan'] = 'Admin/processPelatihan';

//Route untuk  add / edit Kursus Menjahit
$route['processKursus'] = 'Admin/processKursus';

//Route untuk  add / edit Url Video
$route['processUrlVideo'] = 'Admin/processUrlVideo';