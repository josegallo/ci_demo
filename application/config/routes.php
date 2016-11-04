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
$route['default_controller'] = 'home'; //it sent to the 1st page ("the home")

$route['array_example'] = 'home/array_helper';//a url containing array_example in the 1st fragment // will be remapped to the home class and array_helper method
$route['email_example'] = 'home/email_helper';//a url containing email_example in the 1st fragment // will be remapped to the home class and email_helper method
$route['html_example'] = 'home/html_helper';//a url containing html_example in the 1st fragment // will be remapped to the home class and html_helper method
$route['url_example'] = 'home/url_helper';//a url containing url_example in the 1st fragment // will be remapped to the home class and url_helper method
$route['text_example'] = 'home/text_helper';//a url containing text_example in the 1st fragment // will be remapped to the home class and text_helper method
$route['form_example'] = 'home/form_helper';//a url containing form_example in the 1st fragment // will be remapped to the home class and form_helper method
$route['form2_example'] = 'home/form2_helper';//a url containing form2_example in the 1st fragment // will be remapped to the home class and form2_helper method
$route['string_example'] = 'home/string_helper';//a url containing string_example in the 1st fragment // will be remapped to the home class and string_helper method
$route['login'] = 'home/login';
$route['signup'] = 'home/signup';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
