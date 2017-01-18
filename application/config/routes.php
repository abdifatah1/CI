<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['posts/all_posts'] = 'posts/all_posts';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['login'] = 'login/index';
$route['home'] = 'home/index';
$route['contact'] = 'contact/index';
$route['search'] = 'search/index';
$route['pages'] = 'pages/index';
$route['admin'] = 'admin/index';
$route['default_controller'] = 'posts/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;
