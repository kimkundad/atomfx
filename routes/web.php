<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/', 'HomeController@index')->name('index');

Route::get('/เกี่ยวกับเรา', 'HomeController@about')->name('about');
Route::get('/ติดต่อเรา', 'HomeController@contact')->name('contact');

Route::get('/นโยบายความเป็นส่วนตัว', 'HomeController@privacy')->name('privacy');
Route::get('/ข้อตกลงและเงื่อนไข', 'HomeController@terms')->name('terms');

Route::get('/บทความ', 'HomeController@blog')->name('blog');
Route::get('/blog_detail/{id}', 'HomeController@blog_post');

Route::post('/api/add_contact', 'HomeController@add_contact')->name('add_contact');

Route::get('/ราคาแพ็กเกจ', 'HomeController@package');
Route::get('/แจ้งการชำระเงิน', 'HomeController@user_pay');

Route::get('/แจ้งการชำระเงิน', 'HomeController@user_pay');
Route::get('/confirm_payment_success', 'HomeController@confirm_payment_success');


Route::post('/post_confirm_payment', 'HomeController@post_confirm_payment')->name('post_confirm_payment');

Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {

    Route::get('/my_dashboard', 'ProfileController@my_dashboard');

    Route::get('/add_my_package/{id}', 'ProfileController@add_my_package');
    Route::post('/submit_package', 'ProfileController@submit_package');
    Route::get('api/del_my_package/{id}', 'ProfileController@del_my_package');

    Route::get('/edit_my_package/{id}', 'ProfileController@edit_my_package');
    Route::post('/submit_edit_package', 'ProfileController@submit_edit_package');
    

});

Route::group(['middleware' => ['UserRole:manager|employee']], function() {

    Route::resource('admin/category', 'CategoryController');
    Route::get('api/del_category/{id}', 'CategoryController@del_category')->name('del_category');

    Route::get('admin/payment', 'PaymentsController@index')->name('index');
    Route::post('api/pay_status', 'PaymentsController@pay_status')->name('pay_status');
    Route::get('api/del_pay/{id}', 'PaymentsController@del_pay')->name('del_pay');


    Route::resource('admin/order', 'OrderController');
    Route::get('api/del_order/{id}', 'OrderController@del_order')->name('del_order');
    Route::get('api/user_search', 'OrderController@user_search')->name('user_search');



    Route::get('admin/dashboard', 'DashboardController@index');
    Route::get('admin/docs', 'DashboardController@docs');
    Route::post('api/post_docs', 'DashboardController@post_docs')->name('post_docs');
    Route::get('admin/pics', 'DashboardController@pics');
    Route::post('api/post_pics', 'DashboardController@post_pics')->name('post_pics');

    Route::resource('admin/blog', 'BlogController');
    Route::post('api/blog_status', 'BlogController@blog_status')->name('blog_status');

    Route::resource('admin/package', 'PackageController');
    Route::resource('admin/broker', 'BrokerController');

    Route::get('api/del_broker/{id}', 'BrokerController@del_broker')->name('del_broker');
    Route::post('api/broker_status', 'BrokerController@broker_status')->name('broker_status');
    
    Route::get('api/del_package/{id}', 'PackageController@del_package')->name('del_package');

    Route::post('/api/upload_img', 'BlogController@upload_img')->name('home');
    Route::get('api/del_blog/{id}', 'BlogController@del_blog')->name('del_blog');

    Route::get('admin/index_b', 'BlogController@blog_index');
    

    Route::resource('admin/slide_show', 'SlideController');
    Route::post('api/slide_status', 'SlideController@slide_status')->name('slide_status');
    Route::get('api/del_slide/{id}', 'SlideController@del_slide')->name('del_slide');

    Route::resource('admin/service', 'ServiceController');
    Route::post('api/service_status', 'ServiceController@service_status')->name('service_status');
    Route::get('api/del_service/{id}', 'ServiceController@del_service')->name('del_service');

    Route::get('admin/setting', 'SettingController@setting')->name('setting');
    Route::post('api/post_setting', 'SettingController@post_setting')->name('post_setting');

});
