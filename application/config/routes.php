<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['login'] = 'login/index';
$route['home'] = 'home/index';
$route['admin'] = 'admin/index';
$route['default_controller'] = 'posts/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;
