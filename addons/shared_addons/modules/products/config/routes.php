<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
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
| 	www.your-site.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://www.codeigniter.com/user_guide/general/routing.html
*/

// front-end
// $route['epg(/:num)?']					= 'epg/index$1';
// $route['epg/view_channels(/:num)?']		= 'epg/view_channels/index$1';
// $route['epg/view_shows(/:num)?']		= 'epg/view_shows/index$1';

// back-end
$route['products/admin/packages(/:any)?']		= 'admin_packages$1';
$route['admin/products/packages(/:any)?']		= 'admin_packages$1';