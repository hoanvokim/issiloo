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
//default controllers
$route['default_controller'] = 'home_controller/index';
$route['demo'] = 'webapp/demo_controller/index';

//webapp pages
$route['home'] = 'webapp/user_home_controller/index';
$route['product_domestic'] = 'webapp/product_controller/domestic';
$route['product_international'] = 'webapp/product_controller/international';
$route['introduce'] = 'webapp/introduce_controller/index';
$route['factory'] = 'webapp/factory_controller/index';
$route['newsandevents'] = 'webapp/news_controller/index';
$route['ourbusiness'] = 'webapp/business_controller/index';
$route['photos'] = 'webapp/photos_controller/index';
$route['photos_offices'] = 'webapp/photos_controller/offices';
$route['photos_factories'] = 'webapp/photos_controller/factories';
$route['career'] = 'webapp/career_controller/index';
$route['contact'] = 'webapp/contact_controller/index';
$route['product'] = 'webapp/product_controller/index';
$route['product/(:num)'] = 'webapp/product_controller/index/$1';
$route['product/findByCategories/(:num)'] = 'webapp/product_controller/findByCategories/$1';
$route['news-details/view/(:num)'] = 'webapp/news_details_controller/view/$1';
//webapp process
$route['switchlanguage'] = 'webapp_process/switch_language_controller/index';

//routing for administration pages
$route['admin'] = 'dm/admin_controller/index';
$route['logout'] = 'dm/admin_controller/logout';
$route['verifylogin'] = 'dm/verifylogin_controller/index';
//category administration
$route['category-manager'] = 'dm/manager_category_controller/index';
$route['create-category'] = 'dm/manager_category_controller/create_new/$1';
$route['create-category/:num'] = 'dm/manager_category_controller/create_new/$1';
$route['category-manager/update/:num'] = 'dm/manager_category_controller/update';
$route['category-manager/delete/:num'] = 'dm/manager_category_controller/delete';
$route['create-category-submit'] = 'dm/manager_category_controller/post_create_new';
$route['update-category-submit'] = 'dm/manager_category_controller/post_update';
$route['delete-category-submit/:num'] = 'dm/manager_category_controller/post_delete';

//gallery administration
$route['gallery-manager'] = 'dm/manager_gallery_controller/index';
$route['create-gallery/offices'] = 'dm/manager_gallery_controller/create_new/OFFICES';
$route['create-gallery/factories'] = 'dm/manager_gallery_controller/create_new/FACTORIES';
$route['gallery-manager/update/:num'] = 'dm/manager_gallery_controller/update';
$route['gallery-manager/delete/:num'] = 'dm/manager_gallery_controller/delete';
$route['create-gallery-submit'] = 'dm/manager_gallery_controller/post_create_new';
$route['update-gallery-submit'] = 'dm/manager_gallery_controller/post_update';
$route['delete-gallery-submit/:num'] = 'dm/manager_gallery_controller/post_delete';

//upload images administration
$route['upload-manager'] = 'dm/manager_images_controller/index';
$route['upload-image'] = 'dm/manager_images_controller/upload';
$route['upload-manager/update/:num'] = 'dm/manager_images_controller/update';
$route['upload-manager/delete/:num'] = 'dm/manager_images_controller/delete';
$route['upload-image-submit'] = 'dm/manager_images_controller/post_upload';
$route['update-image-submit'] = 'dm/manager_images_controller/post_update';
$route['delete-images-submit/:num'] = 'dm/manager_images_controller/post_delete';

//get image
$route['get-image'] = 'dm/manager_images_controller/get_image';

//news administration
$route['news-manager'] = 'dm/manager_news_controller/index';
$route['create-news'] = 'dm/manager_news_controller/create_new/$1';
$route['create-news/:num'] = 'dm/manager_news_controller/create_new/$1';
$route['news-manager/update/:num'] = 'dm/manager_news_controller/update';
$route['news-manager/delete/:num'] = 'dm/manager_news_controller/delete';
$route['create-news-submit'] = 'dm/manager_news_controller/post_create_new';
$route['update-news-submit'] = 'dm/manager_news_controller/post_update';
$route['delete-news-submit/:num'] = 'dm/manager_news_controller/post_delete';

//product administration
$route['product-manager'] = 'dm/manager_product_controller/index';
$route['create-product'] = 'dm/manager_product_controller/create_new/$1';
$route['create-product/:num'] = 'dm/manager_product_controller/create_new/$1';
$route['product-manager/update/:num'] = 'dm/manager_product_controller/update';
$route['product-manager/delete/:num'] = 'dm/manager_product_controller/delete';
$route['create-product-submit'] = 'dm/manager_product_controller/post_create_new';
$route['update-product-submit'] = 'dm/manager_product_controller/post_update';
$route['delete-product-submit/:num'] = 'dm/manager_product_controller/post_delete';

//product administration
$route['tags-manager'] = 'dm/manager_tags_controller/index';
$route['create-tags'] = 'dm/manager_tags_controller/create_new/$1';
$route['create-tags/:num'] = 'dm/manager_tags_controller/create_new/$1';
$route['tags-manager/update/:num'] = 'dm/manager_tags_controller/update';
$route['tags-manager/delete/:num'] = 'dm/manager_tags_controller/delete';
$route['create-tags-submit'] = 'dm/manager_tags_controller/post_create_new';
$route['update-tags-submit'] = 'dm/manager_tags_controller/post_update';
$route['delete-tags-submit/:num'] = 'dm/manager_tags_controller/post_delete';

//sliders administration
$route['sliders-manager'] = 'dm/manager_sliders_controller/index';
$route['create-sliders'] = 'dm/manager_sliders_controller/create_new/$1';
$route['create-sliders/:num'] = 'dm/manager_sliders_controller/create_new/$1';
$route['sliders-manager/update/:num'] = 'dm/manager_sliders_controller/update';
$route['sliders-manager/delete/:num'] = 'dm/manager_sliders_controller/delete';
$route['create-sliders-submit'] = 'dm/manager_sliders_controller/post_create_new';
$route['update-sliders-submit'] = 'dm/manager_sliders_controller/post_update';
$route['delete-sliders-submit/:num'] = 'dm/manager_sliders_controller/post_delete';

//user-manual
$route['huong-dan'] = 'webapp/user_manual_controller/index';
$route['addProduct'] = 'webapp/user_manual_controller/addProduct';
$route['removeProduct'] = 'webapp/user_manual_controller/removeProduct';
$route['updateProduct'] = 'webapp/user_manual_controller/updateProduct';
$route['managementProduct'] = 'webapp/user_manual_controller/managementProduct';
$route['addupdateslider'] = 'webapp/user_manual_controller/addUpdateSlider';
$route['slidermanagement'] = 'webapp/user_manual_controller/sliderManagement';
$route['addupadtetag'] = 'webapp/user_manual_controller/addUpdateTag';
$route['managementtag'] = 'webapp/user_manual_controller/tagManagement';
$route['addupadtenews'] = 'webapp/user_manual_controller/addUpdateNews';
$route['managementnews'] = 'webapp/user_manual_controller/newsManagement';
$route['addupadtecategory'] = 'webapp/user_manual_controller/addUpdateCategory';
$route['managementcategory'] = 'webapp/user_manual_controller/categoryManagement';
$route['addchildcategory'] = 'webapp/user_manual_controller/addChildCategory';
$route['addupadteimages'] = 'webapp/user_manual_controller/addUpdateImages';
$route['managementimages'] = 'webapp/user_manual_controller/imagesManagement';